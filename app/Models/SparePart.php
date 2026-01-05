<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    protected $fillable = [
        'nama',
        'kode_part',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function maintenances()
    {
        return $this->belongsToMany(Maintenance::class, 'maintenance_spare_parts')
            ->withPivot('jumlah', 'harga_satuan', 'subtotal')
            ->withTimestamps();
    }
}
