<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|unique:orders,name',
                'category' => 'required',
                'description' => 'required|max:255|min:10',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array

    {
        return [
            'name.required' => __('messages.name_required'),
            'name.unique' => __('messages.name_uniqe'),
            'category.required' => __('messages.category_required'),
            'description.required' => __('messages.description_required'),
            'description.min' => __('messages.description_min'),
            'description.max' => __('messages.description_max'),
            'description' => __('messages.description'),
        ];
    }
}
