<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            Rule::unique('projects')->ignore($this->project),
            'description' => 'nullable',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id',
        ];
    }
    public function messages()
    {
        return [

            'title.required' => 'il titolo è obbligatorio!!',
            'title.unique:projects' => 'questo titolo già esiste!!'
        ];
    }
}