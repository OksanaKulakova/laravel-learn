<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'unique:articles',
            'title' => 'required|min:5|max:100|unique:articles',
            'description' => 'required|max:255',
            'body' => 'required',
            'published_at' => '',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Это поле обязательно для заполнения',
            'min' => 'Минимальное количество симолов :min',
            'max' => 'Максимальное количество символов :max',
            'unique' => 'Такое название уже используется',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'published_at' => $this->has('published_at') ? Carbon::now() : null,
        ]);
    }
}
