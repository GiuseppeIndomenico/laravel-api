<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var string[][] $projects */
        $projects = [
            [
                'title' => 'laravel-many-to-many',
                'description' => 'Descrizione di laravel-many-to-many',

            ],
            [
                'title' => 'laravel-one-to-many',
                'description' => 'Descrizione di laravel-one-to-many',
            ],
            [
                'title' => 'laravel-auth',
                'description' => 'Descrizione di laravel-auth',
            ],
            [
                'title' => 'laravel-dc-comics',
                'description' => 'Descrizione di laravel-dc-comics',
            ],
            [
                'title' => 'laravel-migration-seeder',
                'description' => 'Descrizione di laravel-migration-seeder',
            ],
            [
                'title' => 'laravel-model-controller',
                'description' => 'Descrizione di laravel-model-controller',
            ],
            [
                'title' => 'laravel-comics',
                'description' => 'Descrizione di laravel-comics',
            ],
            [
                'title' => 'laravel-primi-passi',
                'description' => 'Descrizione di laravel-primi-passi',
            ],
            [
                'title' => 'php-oop-2',
                'description' => 'Descrizione di php-oop-2',
            ],
            [
                'title' => 'php-todo-list-json',
                'description' => 'Descrizione di php-todo-list-json',
            ],
            [
                'title' => 'php-oop-1',
                'description' => 'Descrizione di php-oop-1',
            ],
            [
                'title' => 'db-university',
                'description' => 'Descrizione di db-university',
            ],
            [
                'title' => 'db-first',
                'description' => 'Descrizione di db-first',
            ],
            [
                'title' => 'php-strong-password-generator',
                'description' => 'Descrizione di php-strong-password-generator',
            ],
            [
                'title' => 'php-hotel',
                'description' => 'Descrizione di php-hotel',
            ],
            [
                'title' => 'php-badwords',
                'description' => 'Descrizione di php-badwords',
            ],
            [
                'title' => 'proj-html-vuejs',
                'description' => 'Descrizione di proj-html-vuejs',
            ],
            [
                'title' => 'vite-boolflix',
                'description' => 'Descrizione di vite-boolflix',
            ],
            [
                'title' => 'vite-yu-gi-oh',
                'description' => 'Descrizione di vite-yu-gi-oh',
            ],
            [
                'title' => 'vite-comics',
                'description' => 'Descrizione di vite-comics',
            ],
            [
                'title' => 'vite-hello-world',
                'description' => 'Descrizione di vite-hello-world',
            ],
            [
                'title' => 'vue-email-list',
                'description' => 'Descrizione di vue-email-list',
            ],
            [
                'title' => 'vue-boolzapp',
                'description' => 'Descrizione di vue-boolzapp',
            ],
            [
                'title' => 'vue-todolist',
                'description' => 'Descrizione di vue-todolist',
            ],
            [
                'title' => 'vue-slider',
                'description' => 'Descrizione di vue-slider',
            ],
            [
                'title' => 'vue-hello',
                'description' => 'Descrizione di vue-hello',
            ],
            [
                'title' => 'js-array-carousel',
                'description' => 'Descrizione di js-array-carousel',
            ],
            [
                'title' => 'js-es6-icons',
                'description' => 'Descrizione di js-es6-icons',
            ],
            [
                'title' => 'js-our-team',
                'description' => 'Descrizione di js-our-team',
            ],
            [
                'title' => 'js-simon',
                'description' => 'Descrizione di js-simon',
            ],
        ];


        foreach ($projects as $projectData) {
            $slug = Str::slug($projectData['title'], '-');
            $projectData['slug'] = $slug;
            Project::create($projectData);
        }
    }
}