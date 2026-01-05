<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'maintenance_type_id' => ['required', 'exists:maintenance_types,id'],
            'tanggal_perawatan' => ['required', 'date'],
            'kilometer' => ['required', 'integer', 'min:0'],
            'biaya_total' => ['required', 'numeric', 'min:0'],
            'catatan' => ['nullable', 'string'],
            'status' => ['required', 'in:dijadwalkan,sedang_proses,selesai,dibatalkan'],
        ];
    }

    public function messages(): array
    {
        return [
            'vehicle_id.required' => 'Kendaraan wajib dipilih',
            'vehicle_id.exists' => 'Kendaraan tidak valid',
            'maintenance_type_id.required' => 'Jenis perawatan wajib dipilih',
            'maintenance_type_id.exists' => 'Jenis perawatan tidak valid',
            'tanggal_perawatan.required' => 'Tanggal perawatan wajib diisi',
            'tanggal_perawatan.date' => 'Tanggal perawatan tidak valid',
            'kilometer.required' => 'Kilometer wajib diisi',
            'kilometer.integer' => 'Kilometer harus berupa angka',
            'kilometer.min' => 'Kilometer tidak boleh negatif',
            'biaya_total.required' => 'Biaya total wajib diisi',
            'biaya_total.numeric' => 'Biaya total harus berupa angka',
            'status.required' => 'Status wajib dipilih',
        ];
    }
}
