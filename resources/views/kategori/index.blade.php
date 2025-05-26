@extends('nav')

@section('content')
    <h1>Kategori Barang</h1>
    <a href="{{ route('kategori.create') }}">Tambah Kategori</a>

    <table>
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id) }}">Edit</a> |
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
