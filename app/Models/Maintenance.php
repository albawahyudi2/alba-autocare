<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'vehicle_id',
        'maintenance_type_id',
        'user_id',
        'tanggal_perawatan',
        'kilometer',
        'biaya_total',
        'catatan',
        'status',
    ];

    protected $casts = [
        'tanggal_perawatan' => 'date',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function maintenanceType()
    {
        return $this->belongsTo(MaintenanceType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spareParts()
    {
        return $this->belongsToMany(SparePart::class, 'maintenance_spare_parts')
            ->withPivot('jumlah', 'harga_satuan', 'subtotal')
            ->withTimestamps();
    }
}
