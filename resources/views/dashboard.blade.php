@extends('nav')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
  .fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
  }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .hello {
    font-family: 'Orbitron', sans-serif;
    font-weight: 700;
    font-size: 18px;
    border-bottom: 2px solid #4a90e2;
    display: inline-block;
    padding-bottom: 4px;
    margin-top: -70px;
    margin-bottom: 40px;
  }

  .dashboard-container {
    max-width: 1100px;
    margin: 0 auto;
  }

  .cards {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 40px;
  }

  .card {
    background: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 10px;
    padding: 20px;
    width: 32%;
    height: 120px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: linear-gradient(135deg, #f9f9f9, #e3f2fd);
  }

  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    cursor: pointer;
  }

  .card .text {
    font-size: 14px;
    color: #333;
  }

  .card .number {
    font-weight: bold;
    font-size: 22px;
    margin-top: 5px;
  }

  .icon-container {
    background-color: #4a90e2;
    border-radius: 10px;
    padding: 12px;
    color: white;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .log-container {
    background: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 10px;
    padding: 20px;
    font-size: 13px;
    color: #000;
    margin-top: 20px;
  }

  .log-title {
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 15px;
    color: #1a2e6e;
  }

  .log-entry {
    border-top: 1px solid #ccc;
    padding: 10px 0;
  }

  .log-entry:first-child {
    border-top: none;
  }
</style>

<div class="hello">
  <h1>Dashboard</h1>
</div>

<div class="dashboard-container">

  {{-- Cards --}}
  <div class="cards">
    <div class="card fade-in">
      <div>
        <div class="text">Total User</div>
        <div class="number">{{ $jumlahUser }}</div>
      </div>
      <div class="icon-container" aria-label="User icon">
        <i class="fas fa-user"></i>
      </div>
    </div>

    <div class="card fade-in">
      <div>
        <div class="text">Total Barang</div>
        <div class="number">{{ $jumlahBarang }}</div>
      </div>
      <div class="icon-container" aria-label="Box icon">
        <i class="fas fa-box"></i>
      </div>
    </div>

    <div class="card fade-in">
      <div>
        <div class="text">Total Peminjaman</div>
        <div class="number">{{ $jumlahPeminjaman }}</div>
      </div>
      <div class="icon-container" aria-label="Hand holding icon">
        <i class="fas fa-hand-holding"></i>
      </div>
    </div>
  </div>

  {{-- Log Aktivitas --}}
  <div class="log-container" aria-label="Activity log">
    <div class="log-title">Log Aktivitas</div>
    @forelse($logAktivitas as $log)
      <div class="log-entry">
        <strong>User ID {{ $log->user_id }}</strong> melakukan <strong>{{ $log->aksi }}</strong><br>
        Barang ID: {{ $log->barang_id ?? '-' }}<br>
        {{ $log->tanggal }}<br>
        {{ $log->keterangan }}
      </div>
    @empty
      <div class="log-entry text-muted">Belum ada aktivitas.</div>
    @endforelse
  </div>

</div>

@endsection
