<?php

namespace App\Http\Requests\Panel;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:60',
            'description' => 'required|max:200',
            'hours' => 'required|numeric|min:1|max:4',
            'url' => 'required|url',
        ];
    }
}
