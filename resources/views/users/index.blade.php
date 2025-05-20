<!-- resources/views/users/index.blade.php -->
@extends('nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun User</title>
    <style>
        h2 {
            margin-bottom: 20px;
        }
        .alert {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-control {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
        }
        .row {
            display: flex;
            gap: 10px;
        }
        .col-md-4 {
            flex: 1;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-warning {
            background-color: #ffc107;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
    </style>
</head>

@section('content')
<body>

    <h2>Kelola Akun User</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Nama User" required>
            </div>
            <div class="col-md-4">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary">Tambah User</button>
            </div>
        </div>
    </form>

    <table class="table">
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>
                <!-- Edit Form -->
                <form action="{{ route('users.update', $user->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    <input type="password" name="password" class="form-control" placeholder="Password baru (opsional)">
                    <button class="btn btn-warning">Update</button>
                </form>

                <!-- Delete Form -->
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
@endsection
</html>
