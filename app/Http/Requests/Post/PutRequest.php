<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->tittle)
        ]);
    }

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

        // dd($this->route('post'));
        return[
            'tittle' => "required|min:5|max:500",
            'description' => "required|min:5|max:500",
            'category_id' => "required",
            'slug' => "required|min:5|max:500|unique:posts,slug,".$this->route("post")->id,
            'content' => "required|min:7",
            'posted' => "required",
            'image' => 'mimes:jpg,jpeg,png|max:10240'
        ];
    }
}
