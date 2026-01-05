<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use App\Http\Requests\SparePartRequest;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index()
    {
        $spareParts = SparePart::latest()->paginate(10);
        return view('spare-parts.index', compact('spareParts'));
    }

    public function create()
    {
        return view('spare-parts.create');
    }

    public function store(SparePartRequest $request)
    {
        SparePart::create($request->validated());
        return redirect()->route('spare-parts.index')->with('success', 'Suku cadang berhasil ditambahkan');
    }

    public function show(SparePart $sparePart)
    {
        return view('spare-parts.show', compact('sparePart'));
    }

    public function edit(SparePart $sparePart)
    {
        return view('spare-parts.edit', compact('sparePart'));
    }

    public function update(SparePartRequest $request, SparePart $sparePart)
    {
        $sparePart->update($request->validated());
        return redirect()->route('spare-parts.index')->with('success', 'Suku cadang berhasil diperbarui');
    }

    public function destroy(SparePart $sparePart)
    {
        $sparePart->delete();
        return redirect()->route('spare-parts.index')->with('success', 'Suku cadang berhasil dihapus');
    }
}
