<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminPKAController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:admin_pka');
    // }

    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // Ambil semua data mahasiswa
        return view('admin_pka.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin_pka.create');
    }

    public function store(Request $request)
    {
        // Validasi input form sesuai kebutuhan

        // Simpan data mahasiswa
        Mahasiswa::create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'angkatan' => $request->input('angkatan'),
            'role' => 'mahasiswa', // Sesuaikan dengan peran mahasiswa
        ]);

        return redirect()->route('admin-pka.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin_pka.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input form sesuai kebutuhan

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'angkatan' => $request->input('angkatan'),
        ]);

        return redirect()->route('admin-pka.index')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin-pka.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
