@extends('nav')

@section('content')
    <h1>Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="Ckategori">
            <label for="nama">Nama Kategori:</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
