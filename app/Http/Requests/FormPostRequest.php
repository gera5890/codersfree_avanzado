<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        if($this->post){
            $post_id = ',' .$this->post->id;
        }else{
            $post_id = ',';
        }

        return [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'slug' => 'required|unique:posts,slug'.$post_id 
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El campo titulo es requerido',
            'body.required' => 'El campo body es requerido',
            'category_id.required' => 'El campo categoria es requerido',
            'slug.required' => 'El campo categoria es requerido',
            'slug.unique' => 'El campo slug no puede repetirse'
        ];
    }
}
