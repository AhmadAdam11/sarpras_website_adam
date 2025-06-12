<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sarpras Website</title>
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff;
      color: #333;
      line-height: 1.5;
    }

    /* 
      Header & Navbar Styles
     */
    header {
      position: sticky;
      top: 0;
      z-index: 1000;

      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #1e398f;
      color: white;
      padding: 10px 20px;
    }


    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .logo span {
      font-weight: bold;
      font-size: 18px;
    }

    .menu-button {
      position: relative;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-toggle {
      background-color: #5faaff;
      border: none;
      padding: 5px 10px;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      right: 0;
      background-color: #fff;
      border: 1px solid #ccc;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      border-radius: 5px;
      overflow: hidden;
      z-index: 100;
      min-width: 120px;
    }

    .dropdown-menu a,
    .dropdown-menu .dropdown-item {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: white;
      color: #333;
      text-align: left;
      border: none;
      text-decoration: none;
      font: inherit;
      cursor: pointer;
    }

    .dropdown-menu a:hover,
    .dropdown-menu .dropdown-item:hover {
      background-color: #f0f0f0;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .dropdown-menu form button {
      width: 100%;
      padding: 5px 10px;
      background-color: rgb(73, 109, 255);
      color: white;
      border: none;
      border-radius: 5px;
      text-align: center;
      font-size: 12px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .dropdown-menu form button:hover {
      background-color: #e60000;
    }

    /* 
      Layout Styles
     */
.container {
  display: flex;
  min-height: 100vh;
}

.sidebar {
  position: fixed;
  top: 60px; /* Sesuaikan dengan tinggi navbar Anda */
  left: 0;
  width: 200px;
  height: calc(100vh - 60px); /* Mengurangi tinggi navbar dari tinggi sidebar */
  background-color: #f4f4f4;
  padding: 20px 0;
  border-right: 1px solid #ddd;
  overflow-y: auto; /* Menambahkan scroll jika konten sidebar terlalu panjang */
  z-index: 999; /* Z-index lebih rendah dari navbar */
}

.sidebar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.sidebar li {
  margin: 10px 0;
}

.sidebar a {
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  color: #333;
  padding: 10px 20px;
  border-radius: 8px;
  transition: background 0.3s, color 0.3s;
}

.sidebar a:hover {
  background-color: #5faaff;
  color: white;
}

.sidebar a img {
  width: 24px;
  height: 24px;
}

.sidebar a span {
  font-size: 16px;
  font-weight: 500;
}

.content {
  flex-grow: 1;
  margin-left: 200px; /* Memberikan ruang untuk sidebar yang fixed */
  margin-top: 60px; 
  padding: 30px;
}
    /* 
      Tabel Barang dan Kategori
     */
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      border-radius: 10px;
      overflow: hidden;
      margin-top: 20px;
    }

    table th,
    table td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #eee;
    }

    table th {
      background-color: #1e398f;
      color: white;
      font-weight: normal;
    }

    table img {
      border-radius: 6px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    /* Tombol Edit & Hapus */
    .btn-warning,
    .btn-danger {
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
      font-size: 13px;
      display: inline-block;
      text-decoration: none;
      user-select: none;
    }

    .btn-warning {
      background-color: #ffc107;
    }

    .btn-warning:hover {
      background-color: #e0a800;
    }

    .btn-danger {
      background-color: #dc3545;
    }

    .btn-danger:hover {
      background-color: #b52a37;
    }

    /* form hapus tombol*/
    form.delete-form {
      display: inline;
      margin: 0;
      padding: 0;
      background: none;
      box-shadow: none;
      border-radius: 0;
    }

    form.delete-form button[type="submit"] {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 5px;
      font-size: 13px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    form.delete-form button[type="submit"]:hover {
      background-color: #b52a37;
    }

    /* 
      Form Tambah Barang
     */
    #barangForm {
      display: flex;
      align-items: center;
      gap: 12px;
      font-family: 'Segoe UI', sans-serif;
      overflow-x: auto;
      max-width: 100%;
      margin-bottom: 30px;
      margin-top: 10px;

      /* Hapus efek "card" */
      background-color: transparent;
      border-radius: 0;
      box-shadow: none;
      padding: 0;
    }

    #barangForm input[type="text"],
    #barangForm input[type="number"],
    #barangForm input[type="file"],
    #barangForm select {
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      min-width: 150px;
      flex-shrink: 0;
    }

    #barangForm input[type="file"] {
      min-width: 180px;
    }

    #barangForm .btn-primary {
      background-color: #4a90e2;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
      flex-shrink: 0;
      white-space: nowrap;
      transition: background-color 0.3s;
    }

    #barangForm .btn-primary:hover {
      background-color: #3a7bd5;
    }

    /* 
      Form Tambah Kategori
     */
    form.kategori-form {
      max-width: 400px;
      margin: 20px auto 40px auto;
      background-color: #ffffff;
      padding: 24px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
      font-family: 'Segoe UI', sans-serif;
    }

    form.kategori-form label {
      display: block;
      margin-bottom: 8px;
      color: #1e398f;
      font-weight: 600;
    }

    form.kategori-form input[type="text"] {
      width: 100%;
      padding: 10px 14px;
      font-size: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s;
    }

    form.kategori-form input[type="text"]:focus {
      border-color: #1e398f;
      outline: none;
      box-shadow: 0 0 0 3px rgba(30, 57, 143, 0.1);
    }

    form.kategori-form button[type="submit"] {
      background-color: #1e398f;
      color: #fff;
      border: none;
      padding: 10px 20px;
      margin-top: 16px;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    form.kategori-form button[type="submit"]:hover {
      background-color: #162e75;
    }

    /* card dashboard */

    .dash-hello h1 {
      margin-left: 60px;
      font-size: 28px;
      font-weight: 700;
      color:rgb(0, 0, 0);
      margin-top: -30px;
    }

    /* Row Container - Cards Sebelahan */
    .row {
      display: flex;
      gap: 20px;
      flex-wrap: nowrap;
      justify-content: center;
      margin-top: 20px;
      align-items: stretch;
    }

    .col-md-4 {
      flex: 1;
      display: flex;
    }

    .dash-card {
      background-color: #f7f9fc;
      border: 1.5px solid #1e398f;
      border-radius: 12px;
      padding: 25px 60px;
      width: 100%; 
      box-shadow: 0 4px 8px rgba(30, 57, 143, 0.12);
      transition: all 0.3s ease;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      overflow: hidden;
      margin-top: 50px;
      margin-left: 25px;
    }

    .dash-card:hover {
      box-shadow: 0 8px 20px rgba(30, 57, 143, 0.25);
      transform: translateY(-3px);
      border-color: #2a4cb8;
    }

    .dash-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #1e398f, #2a4cb8);
    }


    .dash-card h4 {
      margin-bottom: 12px;
      font-size: 16px;
      font-weight: 600;
      color: #1e398f;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      opacity: 0.8;
    }


    .content_dashboard{
      padding: 0 20px;
    }

    /* kategori create */

    .Ckategori {
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
    }

    /* Label */
    .Ckategori label {
      font-weight: 600;
      margin-bottom: 8px;
      color: #1e398f;
      font-size: 16px;
    }

    /* Input field */
    .Ckategori input[type="text"] {
      padding: 10px 12px;
      border: 2px solid #1e398f;
      border-radius: 6px;
      font-size: 16px;
      transition: border-color 0.3s ease;
      outline: none;
    }

    .Ckategori input[type="text"]:focus {
      border-color: #2a4cb8;
      box-shadow: 0 0 6px rgba(30, 57, 143, 0.4);
    }

    /* Button submit */
    button[type="submit"] {
      background-color: #1e398f;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px;
      align-self: flex-start; /* tombol tidak melebar full */
    }

    button[type="submit"]:hover {
      background-color: #2a4cb8;
    }


    

    /* tombol aprove peminjaman */

.peminjaman-action-buttons {
    display: flex;
    gap: 6px;
    justify-content: center;
    align-items: center;
}

.peminjaman-action-buttons form {
    margin: 0;
}

.approve-btn,
.reject-btn {
    font-size: 12px !important;
    padding: 4px 8px !important;
    border-radius: 4px;
    border: none;
    color: #fff;
    cursor: pointer;
}

.approve-btn {
    background-color: #28a745 !important; /* hijau */
}

.reject-btn {
    background-color: #dc3545 !important; /* merah */
}

.btn-mini-selesai {
    background-color: #3B82F6 !important; /* biru Tailwind */
    color: white !important;
    font-size: 0.8rem !important;
    padding: 4px 10px !important;
    border-radius: 6px !important;
    border: none !important;
    cursor: pointer !important;
    transition: background-color 0.2s ease-in-out !important;
}

.btn-mini-selesai:hover {
    background-color: #2563EB !important; /* hover biru */
}

.status-selesai {
    color: #16a34a !important;
    font-weight: 600;
    font-size: 0.8rem;
}


    /* tambah user */

     h2 {
            margin-bottom: 20px;
        }
        .alert {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            max-width: 700px;
            margin-left: 10px; /* rata kiri */
            transition: opacity 0.5s ease;
        }

        /* Form Tambah User */
        .form-tambah-user {
            display: flex;
            gap: 10px;
            max-width: 700px;
            margin-bottom: 15px;
        }
        .form-tambah-user input.form-control {
            flex: 1;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-tambah-user button {
            flex-shrink: 0;
            width: 150px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
        }

        /* Update/Delete Button and inputs */
        .action-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .action-group form.update-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .action-group input.form-control {
            width: 130px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 0; /* supaya rapi di baris */
        }
        .action-group button.btn-warning {
            background-color: #ffc107;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .action-group button.btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

/* ========== CSS KHUSUS PENGEMBALIAN ========== */

.pengembalian-container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.pengembalian-title {
    color: #2c3e50;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 3px solid #3498db;
}

.pengembalian-alert {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
    color: white;
    padding: 12px 20px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-weight: 500;
    box-shadow: 0 2px 8px rgba(46, 204, 113, 0.3);
}

.pengembalian-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
    font-size: 14px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    overflow: hidden;
}

.pengembalian-table-head {
    background: linear-gradient(135deg, #34495e, #2c3e50);
    color: white;
}

.pengembalian-table-head th {
    padding: 15px 12px;
    text-align: left;
    font-weight: 600;
    letter-spacing: 0.5px;
    border: none;
}

.pengembalian-table-body tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #ecf0f1;
}

.pengembalian-table-body tr:hover {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.pengembalian-table-body td {
    padding: 12px;
    vertical-align: middle;
    border: none;
}

.pengembalian-table-body tr:last-child {
    border-bottom: none;
}

.pengembalian-form {
    margin: 0;
    display: inline-block;
    width: 100%;
}

.pengembalian-select {
    width: 100%;
    padding: 8px 12px;
    border: 2px solid #bdc3c7;
    border-radius: 5px;
    background: white;
    font-size: 13px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.pengembalian-select:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

.pengembalian-select:hover {
    border-color: #95a5a6;
}

.status-selesai {
    background-color: #27ae60; /* Lebih gelap dari #2ecc71 */
    color: #ffffff !important;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
    display: inline-block;
    min-width: 80px;
}

.status-pending {
    background-color: #e67e22; /* Orange solid */
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
    display: inline-block;
    min-width: 80px;
}


.denda-amount {
    font-weight: 600;
    color: #e74c3c;
}

.item-id {
    font-weight: 600;
    color: #3498db;
}

.barang-name {
    font-weight: 500;
    color: #2c3e50;
}

.tanggal-kembali {
    color: #7f8c8d;
    font-size: 13px;
}

/* Responsive */
@media (max-width: 768px) {
    .pengembalian-container {
        margin: 10px;
        padding: 15px;
    }
    
    .pengembalian-title {
        font-size: 24px;
    }
    
    .pengembalian-table {
        font-size: 12px;
    }
    
    .pengembalian-table-head th,
    .pengembalian-table-body td {
        padding: 8px 6px;
    }
}

        


  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
  <header>
    <div class="logo">
      <img src="https://smktarunabhakti.net/wp-content/uploads/2020/07/logotbvector-copy.png" alt="Logo" />
      <span>Sarpras Website</span>
    </div>
    <div class="dropdown">
      <button class="dropdown-toggle">Menu ▼</button>
      <div class="dropdown-menu">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </div>
    </div>
  </header>

  <div class="container">
    <nav class="sidebar">
      <ul>
        <li>
          <a href="{{ route('dashboard') }}">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAAS9JREFUeF7tmmsOgjAQhJebeQm9jl7HxyH0ZEp/WiKZxoFs049/kGVpp7OPoZ1i8GsafP4BADBgcAQIgcEJQBJUQuC9AUtOEXGv/JZn1w2+tTpHABAQhwECSK0mhAA5gCRIFaAM0gd8I0AjRCdIK4wWQAy19tSCPWpwDaRMclhYTL8JAAiY7vU/QBiK3wQGCJjCAAGkVpNjRDyqlw7z/aXVkWBf/P68MoUAYggxhBjKKYaeQqJpNTlHxKt6qSTGW6sjwf5vLSB8w2KSNglaZic4AYCsVUBYPIsJDMjKgL20QFoGAIAlwpebIGyNVcASAiRBxFBOMUQVoAr4EeCUGKfEOCXGKTFaYVrhpUBKeULEXwQTeVS2xhIN1z8UAPBj2pdHGNDXevlHCwP8mPbl8QP2uoFB0LTsbAAAAABJRU5ErkJggg==" alt="Register Akun" />
            <span>dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('barang.index') }}">
            <img src="data:image/png;base64,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" alt="Barang" />
            <span>Barang</span>
          </a>
        </li>
        <li>
          <a href="{{ route('kategori.index') }}">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSIjMDAwIiBkPSJNNi41IDExTDEyIDJsNS41IDl6bTExIDExcS0xLjg3NSAwLTMuMTg3LTEuMzEyVDEzIDE3LjV0MS4zMTMtMy4xODdUMTcuNSAxM3QzLjE4OCAxLjMxM1QyMiAxNy41dC0xLjMxMiAzLjE4OFQxNy41IDIyTTMgMjEuNXYtOGg4djh6TTE3LjUgMjBxMS4wNSAwIDEuNzc1LS43MjVUMjAgMTcuNXQtLjcyNS0xLjc3NVQxNy41IDE1dC0xLjc3NS43MjVUMTUgMTcuNXQuNzI1IDEuNzc1VDE3LjUgMjBNNSAxOS41aDR2LTRINXpNMTAuMDUgOWgzLjlMMTIgNS44NXptNy40NSA4LjUiLz48L3N2Zz4=" alt="Barang" />
            <span>Kategori</span>
          </a>
        </li>
        <li>
          <a href="{{ route('register.index') }}">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAAx5JREFUeF7tmknoT1EUxz//LBQyZFqQyIKiLEjZmGXIsJEkRQplZ0FKKRILsjUmkgViIySzJBZKSlKUIUpChkgWvFP3F37F7533zrm/4d1br9/mDN/7fefed4ZfFxVfXRXfP4mAFAEVZyAdgYoHQLoE0xFIR6B5DAwAhgE/gRfAu2ZAiX0E5gPLganA4LoNvwGuZaQcBi7FIiMWAfKmDwGzcm7sHLAWeJVTvrBYDAJmAieBfkqUciQWZ9FyXamnEvcmYDRwD+ihQvVb+CswAXhUUL+hmjcBT4CRDVH8X+AxIES6LE8CNgE7jVBvBHYZ2frLjCcBH4C+RqDfA/2NbEUhYDpwxRjwFOCmsU23WmALsNUY7GZgh7FNNwL2A2uMwe4F1hnbdCPgWMj4LPEeBVZaGhRbXpfgHmC9MdjdwAZjm24ErACOGIOVGuK4sU03AgYBUtxYLrH51tKg5xEQ2zeAyUaArwIzjGxFyQPEyRzgghFoqSIvG9mKRoA4Og/MLQn8LLCwpI1/qnt9BWoO+wAPQuenyB6eAuOzL8rHIsp5dLwJEAxDgDNZNEzMA+gPmdvAEu+mSAwCanuS6lDS2V4NiPgCbPOq/up9xyRAfA8Mra5VwIg6MBLu0jY7GLNBGpsA5SnwF08E+HPc2h5SBLT2+/FHFyMCJA8YHh4ZkMhIrDcgSZI8siTRqT0yD3ie1f7PwvPakwYPAoYC84DZoYCpbbLoPqS5KnXAxVBbmBJiRYAMPpZlWdvqAhmflphbwIEwbfquVfZIhKQBKn37nmXBKPU/AdvLZoxlImBM6NCMUwK3Fr8LLA33hdp2UQIWASeyyU93tUcfhc/ZDHJBaMKoPBQhQMbW+1Re4glL9XhK405LwFjgPtBN4ySi7DdgFPAyr08tAVKjT8prvElyp8P/CnK51xAgg075Jrf6+hG+SPLbcGkImJZ1eaU72w5LovROHqAaAuSCkZu/HVbuyzARoHidKQLSEaj4HSAdXcn/22E9zDtI1VyC7bBxNcZEgJqyDlNIEdBhL1S9nRQBaso6TCFFQIe9UPV2Kh8BvwBKN2lBc9ac9AAAAABJRU5ErkJggg==" alt="Register Akun" />
            <span>Register Akun</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.peminjamans.index') }}">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAABJZJREFUeF7tm0uoFUcQhj9FUBRFDCGiIvgMmBAfiO9XzEbIQo3GBIKKLxBd6EJw4UJduBRERZEoGheCURdCcKWiSdQkJkF8LnyCqBhf+EgUlcT5L30vYzszZ7rnzDlzcqdgONw51dVVf1dXV1Wf24ZWTm1auf2UAJQe0MoRyGMLHCsgpquB41F65QHAfwUEYBawrwQgAoHSA3Jw13ILeIB6EbiXctzElHxhti+B/UWOAbFBKkJpHw8rfBAsAYg7pkoPeBeBcgt4BMEyBhQ9E7SPqQ7AOmA7cMlacZ8t0FDH4IfAQUCfz4GFwJ4QCD4ANMwWmAdsBjpaq74zSJSWGkD+lwDMBT4HtFJxpK0wI+BR1uhKhfeAfyJWPcrIv4FOrtYDhY8BHjY5DSm8BzhZ48FcAlD0PMBjUZ2G1NQDhgO3zeOkJdAVGAD0NZ+LgZ6uQiL4axoEq6Bvi4h2wGxgFdAvg+CaekAGPWOHtgf2AlM9hTc8ALK7bbA1dgPfeIBQMwC+AMaaZ6SHoveB88BZYGPg/lctGepi/xHUCkMdZecOwAhA+fogR8WS2JX1LQN2WEyjgFOO8+QKwAajqKNOqdnXAyss7u9NeqvXN4GfgJPGO+4C14HuQP+gkhxoALPL6iaRWS5GsuzJ1NYDqv5GA7+GBvUGxgC/ADdchNm8vgDUyvhmfS8Hff2PgZdZjI0a6wuAOjULYpSRsttMIHvlqLCaIEpaPosYp3dHHeVVZPcBIMl4Re9PgYcVZ45n6Aw8ifh6vgm0USO1z7VNxgNDTDdJQfQMcCDIJr+Nm84VgCTjzwGTMhrfrOfP5igN6702+GONeTHYGDvOzPlBBcB1tE4HrkTFAJ8Wky1HKz8ZeJBh5cND/wLet2RpNe8AMlpe4kpPgU/soCkPyApANVderjzH5P6uBqbh1wWpYkwLZQXgQhCYJqR0eyUjyufrTdo+8tgmygKA0lQFnrTX2jMd7v98QVIqrdzgCNAlsE9xwyZ1l7dUAwBlY185aCrX05hqkuoCZYAyWomSXTvondL0MCmQL6oEgKJt+FdV+pWVInyYag3ALWOo6gAZppMiiZQKnw5ul3pZTFuBJZUAsIsH/cJKLhwmvUvq49vKucSAFyav18rKYD3qMqUhnR7LAXWTukUM0B2EyuomiosBdgtJwcs21tUDpNhHKSzQcSXXdiVlkSsB3S7FkZIjtdt0zCYCkIcHuBqUll8psqrFKSkGqLxWn6GF4jyg6ACoV/i1MVzHWhp6a+9X8oA8tkAaJZN4FNS02iqDpwE9HATKQ9RXeIeK7AFqZijJan76OBgs1sfALuPy1+LGFgkA1fvNxqqqc1nhsH3q/OiK/TtAQS+R6gWAGirDQgarwHmvkrIJ3/8L/BDI2BQUS4dd5GRJhV3myYv3kWmaKrKrN+hMjQiAqk/9T4KeQ4CSJm8qOgCvgT+DXsOPoUfBrWpUNAC0mr+FjFW+rx9K5Ub1BuAZcML09bXKKnKq3vlNQk8A2FVebmhbgmX877WaLCkPqLcOdZ3ftStcV2XzmLwEIA9UG0lm6QGNtFp56PoGCFMUULKCjkkAAAAASUVORK5CYII=" />
            <span>Peminjaman</span>
          </a>
        </li>
        <li>
          <a href="{{ route('pengembalian.index') }}">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS41Ij48cGF0aCBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGQ9Im0yIDExbDIuODA3LTMuMTU3QTQgNCAwIDAgMSA3Ljc5NyA2LjVIOG0tNiAxM2g1LjVsNC0zcy44MS0uNTQ3IDItMS41YzIuNS0yIDAtNS4xNjYtMi41LTMuNUM4Ljk2NCAxMi44NTcgNyAxNCA3IDE0Ii8+PHBhdGggZD0iTTggMTMuNVY3YTIgMiAwIDAgMSAyLTJoMTBhMiAyIDAgMCAxIDIgMnY2YTIgMiAwIDAgMS0yIDJoLTYuNSIvPjxwYXRoIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgZD0iTTE4LjI1IDEyYy41LTEuNS41LTIuNSAwLTRNMTYgOWMuMjI3LjUuMjI3IDEuNSAwIDIiLz48L2c+PC9zdmc+" />
            <span>Pengembalian</span>
          </a>
        </li>
      </ul>
    </nav>

    <main class="content">
      @yield('content')
    </main>
  </div>
</body>
</html>
