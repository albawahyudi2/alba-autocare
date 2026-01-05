<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
        $vehicleId = $this->route('vehicle') ? $this->route('vehicle')->id : null;

        return [
            'nomor_polisi' => ['required', 'string', 'max:255', 'unique:vehicles,nomor_polisi,' . $vehicleId],
            'merk' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'warna' => ['required', 'string', 'max:255'],
            'jenis' => ['required', 'in:mobil,motor,truk'],
        ];
    }

    public function messages(): array
    {
        return [
            'nomor_polisi.required' => 'Nomor polisi wajib diisi',
            'nomor_polisi.unique' => 'Nomor polisi sudah terdaftar',
            'merk.required' => 'Merk wajib diisi',
            'model.required' => 'Model wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
            'tahun.integer' => 'Tahun harus berupa angka',
            'tahun.min' => 'Tahun minimal 1900',
            'tahun.max' => 'Tahun maksimal ' . (date('Y') + 1),
            'warna.required' => 'Warna wajib diisi',
            'jenis.required' => 'Jenis kendaraan wajib diisi',
            'jenis.in' => 'Jenis kendaraan harus salah satu dari: mobil, motor, truk',
        ];
    }
}
