<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seeder untuk Admin Master
        DB::table('admins')->insert([
            'name' => 'Admin Master',
            'email' => 'adminmaster@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
            'role' => 'admin_master',
        ]);

        // Seeder untuk Admin PKA
        DB::table('admins')->insert([
            'name' => 'Admin PKA',
            'email' => 'adminpka@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
            'role' => 'admin_pka',
        ]);

        // Seeder untuk Mahasiswa
        DB::table('mahasiswas')->insert([
            'nama' => 'Mahasiswa 1',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
            'email' => 'mahasiswa@gmail.com0',
            'nim' => '123456789',
            'angkatan' => 'IF-01',
            'role' => 'mahasiswa',
        ]);

        // Tambahkan seeder lainnya sesuai kebutuhan

        // Contoh lain:
        // DB::table('admins')->insert([...]);
        // DB::table('mahasiswa')->insert([...]);
    }
}
