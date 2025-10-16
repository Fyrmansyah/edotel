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
            'name' => 'required|string',
            'no_tlp' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'jml_orang' => 'required|integer',
            'jenis_kamar' => 'required|string',
            'extra_kasur' => 'integer|nullable',
            'extra_makan' => 'integer|nullable',
        ];
    }
}
