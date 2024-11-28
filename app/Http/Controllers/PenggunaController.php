<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        return Pengguna::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|string|min:8',
            'foto_profil' => 'nullable|string',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); // Hash the password

        $pengguna = Pengguna::create($validatedData);
        return response()->json(['message' => 'Pengguna created successfully!', 'data' => $pengguna]);
    }

    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return response()->json($pengguna);
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $validatedData = $request->validate([
            'nama_pengguna' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:pengguna,email',
            'password' => 'sometimes|string|min:8',
            'foto_profil' => 'nullable|string',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']); // Hash the password if updated
        }

        $pengguna->update($validatedData);
        return response()->json(['message' => 'Pengguna updated successfully!', 'data' => $pengguna]);
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
        return response()->json(['message' => 'Pengguna deleted successfully!']);
    }
}