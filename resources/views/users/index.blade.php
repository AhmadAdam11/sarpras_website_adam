<!-- resources/views/users/index.blade.php -->
@extends('nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Akun User</title>
    <style>
       
    </style>
</head>

@section('content')
<body>

    <h2>Akun User</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="form-tambah-user">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Nama User" required />
        <input type="password" name="password" class="form-control" placeholder="Password" required />
        <button class="btn btn-primary">Tambah User</button>
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
                <div class="action-group">
                    <!-- Form Update -->
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="update-form">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required />
                        <input type="password" name="password" class="form-control" placeholder="Password baru" />
                        <button class="btn btn-warning">Update</button>
                    </form>

                    <!-- Form Delete -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if(alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 500);
            }
        }, 4000);
    </script>

</body>
@endsection
</html>
