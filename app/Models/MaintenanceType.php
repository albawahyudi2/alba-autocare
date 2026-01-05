<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'biaya_standar',
        'interval_km',
        'interval_bulan',
    ];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
