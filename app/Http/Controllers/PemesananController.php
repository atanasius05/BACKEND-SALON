<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function index()
    {
        return Pemesanan::with(['layanan', 'pengguna', 'barber', 'review'])->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_layanan' => 'required|exists:layanan,id_layanan',
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'id_barber' => 'required|exists:barber,id_barber',
            'tanggal_pemesanan' => 'required|date',
        ]);

        $pemesanan = Pemesanan::create($validatedData);
        return response()->json(['message' => 'Pemesanan created successfully!', 'data' => $pemesanan]);
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::with(['layanan', 'pengguna', 'barber', 'review'])->findOrFail($id);
        return response()->json($pemesanan);
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $validatedData = $request->validate([
            'id_layanan' => 'sometimes|exists:layanan,id_layanan',
            'id_pengguna' => 'sometimes|exists:pengguna,id_pengguna',
            'id_barber' => 'sometimes|exists:barber,id_barber',
            'tanggal_pemesanan' => 'sometimes|date',
        ]);

        $pemesanan->update($validatedData);
        return response()->json(['message' => 'Pemesanan updated successfully!', 'data' => $pemesanan]);
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return response()->json(['message' => 'Pemesanan deleted successfully!']);
    }
}