<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Vehicle;
use App\Models\MaintenanceType;
use App\Http\Requests\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::with(['vehicle', 'maintenanceType', 'user'])->latest()->paginate(10);
        return view('maintenances.index', compact('maintenances'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        $maintenanceTypes = MaintenanceType::all();
        return view('maintenances.create', compact('vehicles', 'maintenanceTypes'));
    }

    public function store(MaintenanceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        Maintenance::create($data);
        return redirect()->route('maintenances.index')->with('success', 'Data perawatan berhasil ditambahkan');
    }

    public function show(Maintenance $maintenance)
    {
        $maintenance->load(['vehicle', 'maintenanceType', 'user', 'spareParts']);
        return view('maintenances.show', compact('maintenance'));
    }

    public function edit(Maintenance $maintenance)
    {
        $vehicles = Vehicle::all();
        $maintenanceTypes = MaintenanceType::all();
        return view('maintenances.edit', compact('maintenance', 'vehicles', 'maintenanceTypes'));
    }

    public function update(MaintenanceRequest $request, Maintenance $maintenance)
    {
        $maintenance->update($request->validated());
        return redirect()->route('maintenances.index')->with('success', 'Data perawatan berhasil diperbarui');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('maintenances.index')->with('success', 'Data perawatan berhasil dihapus');
    }
}
