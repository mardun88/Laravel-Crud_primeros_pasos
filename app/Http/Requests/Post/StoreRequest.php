<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str($this->slug)->slug()
        ]);
    }

    static public function myRules(){
        return[
            'tittle' => "required|min:5|max:500",
            'description' => "required|min:5|max:500",
            'category_id' => "required",
            'slug' => "required|min:5|max:500|unique:posts",
            'content' => "required|min:7",
            'posted' => "required",
        ];
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
        return $this->myRules();
    }
}
