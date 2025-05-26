@extends('nav')
@section('content')
<div class="container">
  <div class="dash-hello">
    <h1>Dashboard</h1>
  </div>
  <main class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="dash-card">
          <h4>Jumlah User</h4>
          <p>{{ $jumlahUser }}</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dash-card">
          <h4>Jumlah Barang</h4>
          <p>{{ $jumlahBarang }}</p>
        </div>
      </div>
    </div>
  </main> 
</div>
@endsection
