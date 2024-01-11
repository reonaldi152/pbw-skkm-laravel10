<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminMasterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:admin_master');
    // }

    public function index()
    {
        $admins = Admin::where('role', 'admin_master')->get();
        return view('admin-master.index', compact('admins'));
    }

    // Metode untuk menambahkan Admin Master baru
    public function create()
    {
        return view('admin-master.create');
    }

    // Metode untuk menyimpan Admin Master baru ke database
    public function store(Request $request)
    {
        // Validasi input di sini

        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'admin_master',
        ]);

        return redirect()->route('admin-master.index')->with('success', 'Admin Master berhasil ditambahkan.');
    }

    // Metode untuk mengedit Admin Master
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin-master.edit', compact('admin'));
    }

    // Metode untuk menyimpan perubahan Admin Master ke database
    public function update(Request $request, $id)
    {
        // Validasi input di sini

        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('admin-master.index')->with('success', 'Admin Master berhasil diperbarui.');
    }

    // Metode untuk menghapus Admin Master
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin-master.index')->with('success', 'Admin Master berhasil dihapus.');
    }
}
