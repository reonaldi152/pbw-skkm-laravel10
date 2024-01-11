<!-- resources/views/admin-master/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Admin Master</h2>

        <form action="{{ route('admin-master.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Admin Master</button>
        </form>
    </div>
@endsection
