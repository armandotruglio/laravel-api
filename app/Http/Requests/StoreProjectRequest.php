<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            "title" => [ "required", "string", "min:3", "max:255", "unique:projects,title"],
            "description" => [ "required", "string", "min:15"],
            "date" => ["required", "date"],
            "type_id" => ["required", "numeric", "integer", "exists:types,id"],
            "technologies" => ["array"],
            "technologies.*" => ["integer", "numeric", "exists:technologies,id", "min:1"],
            "image" => ["nullable", "image", "max:250"],
        ];
    }
}