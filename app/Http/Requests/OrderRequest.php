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
                //'name' => 'required|unique:orders,name',
                'name_ar' => 'required|unique:orders,name_ar',
                'name_en' => 'required|unique:orders,name_en',
                'name_fr' => 'required|unique:orders,name_fr',
                'category' => 'required',
                'description_ar' => 'required|max:255|min:10',
                'description_en' => 'required|max:255|min:10',
                'description_fr' => 'required|max:255|min:10',
                'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',

        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array {
        return [
            // custom error messages (on arabic)
            'name_en.required' => __('messages.name_required'),
            'name_en.unique' => __('messages.name_uniqe'),
            'name_fr.required' => __('messages.name_required'),
            'name_fr.unique' => __('messages.name_uniqe'),
            'name_ar.required' => __('messages.name_required'),
            'namear.unique' => __('messages.name_uniqe'),
            'category.required' => __('messages.category_required'),
            'description_ar.required' => __('messages.description_required'),
            'description_ar.min' => __('messages.description_min'),
            'description_ar.max' => __('messages.description_max'),
            'description_ar' => __('messages.description'),
            'description_en.required' => __('messages.description_required'),
            'description_en.min' => __('messages.description_min'),
            'description_en.max' => __('messages.description_max'),
            'description_en' => __('messages.description'),
            'description_fr.required' => __('messages.description_required'),
            'description_fr.min' => __('messages.description_min'),
            'description_fr.max' => __('messages.description_max'),
            'description_fr' => __('messages.description'),
        ];
    }
}
