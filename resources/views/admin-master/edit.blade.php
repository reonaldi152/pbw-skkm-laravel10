<!-- resources/views/admin-master/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Admin Master</h2>

        <form action="{{ route('admin-master.update', $admin->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
