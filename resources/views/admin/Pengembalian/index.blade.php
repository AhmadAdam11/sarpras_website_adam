@extends('nav')

@section('content')
<div class="pengembalian-container">
    <h3 class="pengembalian-title">Data Pengembalian</h3>

    @if(session('success'))
        <div class="pengembalian-alert">{{ session('success') }}</div>
    @endif

    <table class="pengembalian-table">
        <thead class="pengembalian-table-head">
            <tr>
                <th>ID</th>
                <th>Peminjaman ID</th>
                <th>Nama Barang</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Kondisi Setelah</th>
                <th>Aksi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="pengembalian-table-body">
            @foreach($pengembalians as $item)
                <tr>
                    <td class="item-id">{{ $item->id }}</td>
                    <td>{{ $item->peminjaman_id }}</td>
                    <td>{{ $item->peminjaman->barang->name ?? '-' }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>

                    @if($item->selesai)
                        <td>Rp {{ number_format($item->denda, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($item->kondisi_setelah) }}</td>
                        <td><span class="status-selesai">Terkunci</span></td>
                    @else
                        <form action="{{ route('pengembalian.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <input type="number" name="denda" value="{{ $item->denda }}" class="pengembalian-input" min="0" required>
                            </td>
                            <td>
                                <select name="kondisi_setelah" class="pengembalian-select" required>
                                    <option value="">-- Pilih Kondisi --</option>
                                    <option value="baru" {{ $item->kondisi_setelah == 'baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="baik" {{ $item->kondisi_setelah == 'baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="rusak" {{ $item->kondisi_setelah == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn-mini-selesai">Selesaikan Aksi</button>
                            </td>
                        </form>
                    @endif

                    <td>
                        @if($item->selesai)
                            <span class="status-selesai">Selesai</span>
                        @else
                            <span class="status-pending">Perlu Dicek</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.pengembalian-alert');
            if(alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 500);
            }
        }, 4000);
    </script>
</div>
@endsection
