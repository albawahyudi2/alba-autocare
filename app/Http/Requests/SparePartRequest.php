<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparePartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $sparePartId = $this->route('spare_part') ? $this->route('spare_part')->id : null;

        return [
            'nama' => ['required', 'string', 'max:255'],
            'kode_part' => ['required', 'string', 'max:255', 'unique:spare_parts,kode_part,' . $sparePartId],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama suku cadang wajib diisi',
            'kode_part.required' => 'Kode part wajib diisi',
            'kode_part.unique' => 'Kode part sudah terdaftar',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'harga.min' => 'Harga tidak boleh negatif',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus berupa angka',
            'stok.min' => 'Stok tidak boleh negatif',
        ];
    }
}
