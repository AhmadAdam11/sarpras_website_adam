@extends('nav')

@section('title', 'Data Peminjaman')

@section('content')
<h1>Data Peminjaman</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Barang</th>
            <th>Waktu</th>
            <th>Tanggal Pinjam</th>
            <th>Rencana Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($peminjamans as $peminjaman)
            <tr>
                <td>{{ $peminjaman->id }}</td>
                <td>{{ $peminjaman->user->name ?? '-' }}</td>
                <td>{{ $peminjaman->barang->name ?? '-' }}</td>
                <td>{{ $peminjaman->waktu }}</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->rencana_kembali)->format('d-m-Y') }}</td>
                <td>{{ ucfirst($peminjaman->status) }}</td>
                <td>
                    @if($peminjaman->status == 'pending')
                        <form action="{{ route('admin.peminjamans.updateStatus', ['id' => $peminjaman->id, 'status' => 'disetujui']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Setujui peminjaman ini?')">Setujui</button>
                        </form>

                        <form action="{{ route('admin.peminjamans.updateStatus', ['id' => $peminjaman->id, 'status' => 'ditolak']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tolak peminjaman ini?')">Tolak</button>
                        </form>
                    @else
                        <span class="text-muted">Tindakan selesai</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="text-center">Tidak ada data peminjaman</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
