@extends('nav')

@section('title', 'Data Peminjaman')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Peminjaman</h1>

<table class="min-w-full border border-gray-300 text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">ID Peminjaman</th>
            <th class="p-2 border">User</th>
            <th class="p-2 border">Barang</th>
            <th class="p-2 border">Jumlah</th>
            <th class="p-2 border">Waktu</th>
            <th class="p-2 border">Tanggal Pinjam</th>
            <th class="p-2 border">Rencana Kembali</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($peminjamans as $peminjaman)
            <tr class="hover:bg-gray-50">
                <td class="p-2 border">{{ $peminjaman->id }}</td>
                <td class="p-2 border">{{ $peminjaman->user->name ?? '-' }}</td>
                <td class="p-2 border">{{ $peminjaman->barang->name ?? '-' }}</td>
                <td class="p-2 border">{{ $peminjaman->jumlah }}</td>
                <td class="p-2 border">{{ $peminjaman->waktu }}</td>
                <td class="p-2 border">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}</td>
                <td class="p-2 border">{{ \Carbon\Carbon::parse($peminjaman->rencana_kembali)->format('d-m-Y') }}</td>
                <td class="p-2 border">{{ ucfirst($peminjaman->status) }}</td>
<td>
    @if($peminjaman->status == 'pending')
        <div class="peminjaman-action-buttons">
            <form action="{{ route('admin.peminjamans.updateStatus', ['id' => $peminjaman->id, 'status' => 'disetujui']) }}" method="POST">
                @csrf
                <button type="submit" class="approve-btn" onclick="return confirm('Setujui peminjaman ini?')">Setujui</button>
            </form>

            <form action="{{ route('admin.peminjamans.updateStatus', ['id' => $peminjaman->id, 'status' => 'ditolak']) }}" method="POST">
                @csrf
                <button type="submit" class="reject-btn" onclick="return confirm('Tolak peminjaman ini?')">Tolak</button>
            </form>
        </div>
    @else
        <span class="text-muted">Tindakan selesai</span>
    @endif
</td>


            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center p-4 text-gray-500">Tidak ada data peminjaman</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
