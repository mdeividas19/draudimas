<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'reg_number'=>'required|regex:/^[A-Z]{3}-\d{3}$/|unique:cars,reg_number,'.$this->car['id'],
            'brand'=>'required|min:2|max:20|string',
            'model'=>'required|min:2|max:30|string',
            'owner_id'=>'required',
            'photos.*'=>'image',
        ];
    }

    public function messages(): array
    {
        return [
            'reg_number'=> __('Field registration number is required, should be unique and in correct format (e.g. ABC-123)'),
            'brand'=> __('Field brand is required, min:2, max:20'),
            'model'=> __('Field model is required, min:2, max:30'),
            'owner_id'=> __('You have to select car owner'),
            'photos.*'=> __('You can only add images'),
        ];
    }
}
