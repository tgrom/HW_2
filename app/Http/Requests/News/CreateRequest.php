<?php
declare(strict_types=1);
namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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

            'category_id' => ['required', 'integer', 'exists:news'],
            'status' => ['required', 'string'],
            'title'=>['required', 'min: 5'],
            'author' => ['required', 'string'],
            'img' => ['nullable', 'image', 'mimes:pdf,jpg,jpeg'],
            'description' => ['sometimes', 'string']

        ];
    }
}
