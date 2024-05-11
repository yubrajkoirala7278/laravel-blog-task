<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required','string','max:255'],
            'slug'=>['required','max:255',Rule::unique('posts')->ignore($this->post)],
            'description'=>['required','string'],
            'status'=>['required','integer','max:255'],
            'category'=>['required','integer','max:255'],
            'image' => request()->isMethod('post') ? 'required|image|max:2048' : 'nullable|image|max:2048', 
        ];
    }
}
