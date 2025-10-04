<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'name' => 'string|required',
            'no_tlp' => 'string|required',
            'check_in' => 'date|required',
            'check_out' => 'date|required',
            'jml_orang' => 'integer|required',
            'extra_kasur' => 'integer|nullable',
            'extra_makan' => 'integer|nullable',
        ];
    }
}
