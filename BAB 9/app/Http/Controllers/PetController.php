<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'duration' => 'required|integer',
            'notes' => 'nullable'
        ]);

        Pet::create($request->all());
        return redirect()->route('pets.index')->with('success', 'Data hewan berhasil ditambahkan.');
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'duration' => 'required|integer',
            'notes' => 'nullable'
        ]);

        $pet->update($request->all());
        return redirect()->route('pets.index')->with('success', 'Data hewan berhasil diperbarui.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Data hewan berhasil dihapus.');
    }
}
