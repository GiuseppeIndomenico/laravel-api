<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use illuminate\Validation\Rule;
use App\Models\Type;
use App\Models\Technology;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(3);


        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }


    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if (!$request->filled('type_id')) {
            // Imposta un valore di default per type_id
            $data['type_id'] = 1; // Imposta l'ID del tipo di progetto di default
        }

        $data['type_id'] = $request->input('type_id');
        $slug = Str::slug($data['title'], '-');
        $data['slug'] = $slug;
        $project = Project::create($data);

        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.show', $project->slug);
    }


    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }


    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['type_id'] = $request->input('type_id');
        $slug = Str::slug($data['title'], '-');
        $data['slug'] = $slug;

        $project->update($data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->sync([]);

        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Project deleted successfully.');
    }
}