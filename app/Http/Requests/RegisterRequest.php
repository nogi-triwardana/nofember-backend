<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\RegisterException;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'city' => 'required|string',
            'phone' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email yang diinput harus format email',
            'email.unique' => 'Email anda sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'city.required' => 'Kota wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new RegisterException($validator);
    }

}
