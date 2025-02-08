<?php

namespace App\Http\Controllers;

use App\Models\Apoteker;
use Illuminate\Http\Request;

class ApotekerController extends Controller
{
    public function index()
    {
        $apoteker = Apoteker::all();
        return view('apoteker.index', compact('apoteker'));
    }

    public function create()
    {
        return view('apoteker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_apoteker' => 'required',
            'alamat_apoteker' => 'required',
            'no_telepon' => 'required|numeric',
        ]);

        Apoteker::create($request->all());
        return redirect()->route('apoteker.index')->with('success', 'Apoteker berhasil ditambahkan!');
    }

    public function edit(Apoteker $apoteker)
    {
        return view('apoteker.edit', compact('apoteker'));
    }

    public function update(Request $request, Apoteker $apoteker)
    {
        $request->validate([
            'nama_apoteker' => 'required',
            'alamat_apoteker' => 'required',
            'no_telepon' => 'required|numeric',
        ]);

        $apoteker->update($request->all());
        return redirect()->route('apoteker.index')->with('success', 'Apoteker berhasil diperbarui!');
    }

    public function destroy(Apoteker $apoteker)
    {
        $apoteker->delete();
        return redirect()->route('apoteker.index')->with('success', 'Apoteker berhasil dihapus!');
    }
}