<!-- resources/views/admin_pka/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Mahasiswa</h2>

        <form action="{{ route('admin-pka.update', $mahasiswa->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
            </div>
            <div class="form-group">
                <label for="angkatan">angkatan:</label>
                <input type="text" name="angkatan" class="form-control" value="{{ $mahasiswa->angkatan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
