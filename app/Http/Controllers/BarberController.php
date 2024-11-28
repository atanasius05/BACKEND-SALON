<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;

class BarberController extends Controller
{
    public function index()
    {
        return Barber::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barber' => 'required|string|max:255',
            'keterampilan' => 'required|string|max:255',
            'status' => 'sometimes|string|in:Aktif,Tidak Aktif',
        ]);

        // Default status jika tidak dikirim
        $validatedData['status'] = $validatedData['status'] ?? 'Aktif';

        $barber = Barber::create($validatedData);
        return response()->json(['message' => 'Barber created successfully!', 'data' => $barber]);
    }

    public function show($id)
    {
        $barber = Barber::findOrFail($id);
        return response()->json($barber);
    }

    public function update(Request $request, $id)
    {
        $barber = Barber::findOrFail($id);

        $validatedData = $request->validate([
            'nama_barber' => 'sometimes|string|max:255',
            'keterampilan' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|in:Aktif,Tidak Aktif',
        ]);

        $barber->update($validatedData);
        return response()->json(['message' => 'Barber updated successfully!', 'data' => $barber]);
    }

    public function destroy($id)
    {
        $barber = Barber::findOrFail($id);
        $barber->delete();
        return response()->json(['message' => 'Barber deleted successfully!']);
    }
}
