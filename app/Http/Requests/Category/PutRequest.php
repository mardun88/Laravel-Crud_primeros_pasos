<?php

namespace App\Http\Requests\Category;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'tittle' => "required|min:1|max:500",
            'slug' => "required|min:1|max:500|unique:categories,slug",
        ];
    }
}
