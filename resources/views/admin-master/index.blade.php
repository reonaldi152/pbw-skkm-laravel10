<!-- resources/views/admin-master/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Admin Master</h2>
        <a href="{{ route('admin-master.create') }}" class="btn btn-primary">Tambah Admin Master</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="{{ route('admin-master.edit', $admin->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin-master.destroy', $admin->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
