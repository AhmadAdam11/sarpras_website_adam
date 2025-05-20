@extends('nav')

@section('content')
    <h1>Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama">Nama Kategori:</label>
            <input type="text" name="nama" id="nama" value="{{ $kategori->nama }}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
