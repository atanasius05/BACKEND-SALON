<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function index()
    {
        return Riwayat::with('pengguna')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'status_akun' => 'required|string|max:255',
            'tanggal_perubahan' => 'required|date',
        ]);

        $riwayat = Riwayat::create($validatedData);
        return response()->json(['message' => 'Riwayat created successfully!', 'data' => $riwayat]);
    }

    public function show($id)
    {
        $riwayat = Riwayat::with('pengguna')->findOrFail($id);
        return response()->json($riwayat);
    }

    public function update(Request $request, $id)
    {
        $riwayat = Riwayat::findOrFail($id);

        $validatedData = $request->validate([
            'id_pengguna' => 'sometimes|exists:pengguna,id_pengguna',
            'status_akun' => 'sometimes|string|max:255',
            'tanggal_perubahan' => 'sometimes|date',
        ]);

        $riwayat->update($validatedData);
        return response()->json(['message' => 'Riwayat updated successfully!', 'data' => $riwayat]);
    }

    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();
        return response()->json(['message' => 'Riwayat deleted successfully!']);
    }
}