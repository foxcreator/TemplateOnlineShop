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
          'name.min' => 'Ім\'я та прізвище має бути понад 6 символів',
          'phone' => 'Невірний формат',
          'region.min' => 'Поле "область" має містити понад 2 символи',
          'city.min' => 'Поле "місто" має містити понад 2 символи',
          'novaposhta' => 'Вкажіть відділення нової пошти',
        ];
    }
        //$request->name,
        //$request->phone,
        //$request->region,
        //$request->city,
        //$request->novaposhta,
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
            'region' => ['required', 'string', 'min:2'],
            'city' => ['required', 'string', 'min:2'],
            'novaposhta' => ['required', 'string', 'min:1'],

        ];
    }
}