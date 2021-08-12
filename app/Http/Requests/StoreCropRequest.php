<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCropRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'lowest_temperature' => 'required',
            'highest_temperature' => 'required',
            'lowest_humidity' => 'required',
            'highest_humidity' => 'required',
            'lowest_atmospheric_pressure' => 'required',
            'highest_atmospheric_pressure' => 'required',
        ];
    }
}
