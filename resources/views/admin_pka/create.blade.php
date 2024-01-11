<!-- resources/views/admin_pka/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Mahasiswa</h2>

        <form action="{{ route('admin-pka.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="angkatan">angkatan:</label>
                <input type="text" name="angkatan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
        </form>
    </div>
@endsection
