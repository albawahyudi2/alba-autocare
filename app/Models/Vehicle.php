<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'nomor_polisi',
        'merk',
        'model',
        'tahun',
        'warna',
        'jenis',
    ];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
