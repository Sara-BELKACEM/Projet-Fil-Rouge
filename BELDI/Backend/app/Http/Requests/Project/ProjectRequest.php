<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize()
{
    return auth()->user()->is_admin;
}

public function rules()
{
    return [
        'category_id'=>'required|exists:categories,id',
        'title'=>'required|string',
        'description'=>'required|string',
        'image'=>'nullable|string'
    ];
}
}
