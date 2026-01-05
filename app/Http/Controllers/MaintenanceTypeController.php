<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceType;
use App\Http\Requests\MaintenanceTypeRequest;
use Illuminate\Http\Request;

class MaintenanceTypeController extends Controller
{
    public function index()
    {
        $maintenanceTypes = MaintenanceType::latest()->paginate(10);
        return view('maintenance-types.index', compact('maintenanceTypes'));
    }

    public function create()
    {
        return view('maintenance-types.create');
    }

    public function store(MaintenanceTypeRequest $request)
    {
        MaintenanceType::create($request->validated());
        return redirect()->route('maintenance-types.index')->with('success', 'Jenis perawatan berhasil ditambahkan');
    }

    public function show(MaintenanceType $maintenanceType)
    {
        return view('maintenance-types.show', compact('maintenanceType'));
    }

    public function edit(MaintenanceType $maintenanceType)
    {
        return view('maintenance-types.edit', compact('maintenanceType'));
    }

    public function update(MaintenanceTypeRequest $request, MaintenanceType $maintenanceType)
    {
        $maintenanceType->update($request->validated());
        return redirect()->route('maintenance-types.index')->with('success', 'Jenis perawatan berhasil diperbarui');
    }

    public function destroy(MaintenanceType $maintenanceType)
    {
        $maintenanceType->delete();
        return redirect()->route('maintenance-types.index')->with('success', 'Jenis perawatan berhasil dihapus');
    }
}
