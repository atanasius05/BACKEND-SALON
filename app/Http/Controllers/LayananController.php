<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        return Layanan::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'durasi' => 'required|integer|min:1',
        ]);

        $layanan = Layanan::create($validatedData);
        return response()->json(['message' => 'Layanan created successfully!', 'data' => $layanan]);
    }

    public function show($id)
    {
        $layanan = Layanan::findOrFail($id);
        return response()->json($layanan);
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $validatedData = $request->validate([
            'jenis_layanan' => 'sometimes|string|max:255',
            'harga' => 'sometimes|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'durasi' => 'sometimes|integer|min:1',
        ]);

        $layanan->update($validatedData);
        return response()->json(['message' => 'Layanan updated successfully!', 'data' => $layanan]);
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return response()->json(['message' => 'Layanan deleted successfully!']);
    }
}