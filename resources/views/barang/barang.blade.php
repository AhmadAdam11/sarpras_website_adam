@extends('nav')

@section('content')
    <div class="daftar" style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Daftar Barang</h1>
        <a href="{{ url('/export-barang') }}" class="btn-primary" style="padding: 8px 12px; background-color: blue; color: white; text-decoration: none; border-radius: 5px;">
            Download Excel
        </a>
    </div>

    
    <!-- Form Tambah Barang -->
    <form id="barangForm" enctype="multipart/form-data">
        <input type="hidden" name="id" id="barangId">
        <div class="form-grid">
            <input type="text" name="name" id="name" placeholder="Nama Barang" required>
            <input type="file" name="gambar" id="gambar" accept="image/*" required>

            <!-- Dropdown untuk kategori -->
            <select name="kategori_id" id="kategori" required>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>

            <input type="number" name="stok" id="stok" placeholder="Stok" required>
            <button type="submit" class="btn-primary" id="submitBtn">Tambah</button>
        </div>
    </form>

    <!-- Tabel Data Barang -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $barang)
                <tr data-id="{{ $barang->id }}">
                    <td>{{ $index + 1 }}</td>
                    <td class="nama">{{ $barang->name }}</td>
                    <td class="gambar"><img src="{{ $barang->gambar }}" width="50"></td>
                    <td class="kategori" data-id="{{ $barang->kategori_id }}">{{ $barang->kategori->nama }}</td>
                    <td class="stok">{{ $barang->stok }}</td>
                    <td>
                        <button class="btn-warning btn-edit">Edit</button>
                        <button class="btn-danger btn-delete">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $('#barangForm').on('submit', function(e) {
            e.preventDefault();
            let id = $('#barangId').val();
            let url = id ? `/barang/${id}/update` : "/barang/create";
            let method = id ? "POST" : "POST"; // tetap POST, nanti pakai _method di server kalau update
            let formData = new FormData(this);

            if (id) {
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: url,
                method: method,
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(id ? 'Barang berhasil diupdate!' : 'Barang berhasil ditambahkan!');
                    location.reload();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });

        // Edit barang
        $('.btn-edit').on('click', function() {
            let row = $(this).closest('tr');
            $('#barangId').val(row.data('id'));
            $('#name').val(row.find('.nama').text());
            $('#kategori').val(row.find('.kategori').data('id'));
            $('#stok').val(row.find('.stok').text());
            $('#submitBtn').text('Update');
        });

        // Hapus barang
        $('.btn-delete').on('click', function() {
            if (!confirm('Yakin ingin menghapus barang ini?')) return;

            let id = $(this).closest('tr').data('id');

            $.ajax({
                url: `/barang/${id}/delete`,
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('Barang berhasil dihapus!');
                    $('tr[data-id="' + id + '"]').remove();
                },
                error: function(xhr) {
                    alert('Gagal menghapus barang!');
                }
            });
        });
    </script>
@endsection
