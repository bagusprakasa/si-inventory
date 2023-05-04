<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RequestProduk extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'id_satuan' => 'required',
            'id_kategori' => 'required',

        ];
    }
    public function messages(): array
    {
        return [

            'name.required' => 'Nama produk harus diisi.',
            'id_satuan.required' => 'Nama produk harus diisi.',
            'id_kategori.required' => 'Nama produk harus diisi.',
        ];
    }
}
