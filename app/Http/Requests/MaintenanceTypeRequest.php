<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'biaya_standar' => ['required', 'numeric', 'min:0'],
            'interval_km' => ['nullable', 'integer', 'min:0'],
            'interval_bulan' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama jenis perawatan wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'biaya_standar.required' => 'Biaya standar wajib diisi',
            'biaya_standar.numeric' => 'Biaya standar harus berupa angka',
            'biaya_standar.min' => 'Biaya standar tidak boleh negatif',
        ];
    }
}
