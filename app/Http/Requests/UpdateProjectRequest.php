<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => [ "required", "string", "min:3", "max:255", Rule::unique("projects")->ignore($this->project)],
            "description" => [ "required", "string", "min:15"],
            "date" => ["required", "date"],
            "type_id" => ["required", "numeric", "integer", "exists:types,id"],
            "technologies" => ["array", "exists:technologies,id"],
            "image" => ["nullable", "image", "max:250"],
        ];
    }
}