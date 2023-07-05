<?php

namespace App\Http\Requests;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class   CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function messages()
    {
        return [
            'name.required' => 'Введить Ім\'я та прізвище',
            'name.min' => 'Ім\'я та прізвище має бути понад 6 символів',
            'phone' => 'Невірний формат',
            'phone.required' => 'Введить номер телефона',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:6', 'max:50'],
            'phone' => ['required', 'string', 'max:15', new Phone],
        ];
    }
}
