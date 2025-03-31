<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name'=>'required|min:2|max:20|string',
            'surname'=>'required|min:2|max:20|string',
            'phone'=>'required|numeric',
            'email'=>'required|email',
            'address'=>'required|min:2|max:50|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name'=> __('Field name is required, min:2, max:20'),
            'surname'=> __('Field surname is required, min:2, max:20'),
            'phone'=> __('Field phone is required and should be in correct format'),
            'email'=> __('Field email is required and should be in correct format'),
            'address'=> __('Field address is required, min:2, max:50'),
        ];
    }
}
