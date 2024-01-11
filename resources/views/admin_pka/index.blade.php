<!-- resources/views/admin_pka/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Mahasiswa</h2>
        <a href="{{ route('admin-pka.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->id }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->angkatan }}</td>
                        <td>
                            <a href="{{ route('admin-pka.edit', $mhs->id) }}" class="btn btn-warning">Edit</a>
                            <!-- Tambahkan tombol aksi lainnya sesuai kebutuhan -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
