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
    }

    header {
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
        background-color:rgb(73, 109, 255); /* Merah untuk tombol logout */
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
        .container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 200px;
      background-color: #f4f4f4;
      padding: 20px 0;
      border-right: 1px solid #ddd;
    }

    .sidebar ul {
      list-style: none;
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
      padding: 30px;
    }

    body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        
        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 5px;
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            padding: 8px 16px;
            cursor: pointer;
        }

        .btn-warning {
            background-color: orange;
            color: white;
            border: none;
        }

        .btn-danger {
            background-color: red;
            color: white;
            border: none;
        }

        .btn-primary {
            background-color: blue;
            color: white;
            border: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #444;
            color: white;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

.dashboard-card {
  background-color: rgb(242, 255, 0);
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  padding: 20px;
  text-align: center;
  transition: transform 0.2s ease;
  margin-top: 50px;
  margin-right: 60px;
}

  .hello{
    margin-bottom: 10px;
  }

  .dashboard-card:hover {
    transform: scale(1.03);
  }

  .dashboard-card h4 {
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
  }

  .dashboard-card p {
    font-size: 24px;
    font-weight: bold;
    color: #007bff;
  }


.row {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin-top: 0;
}


  .col-md-4 {
    flex: 1;
    min-width: 250px;
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
            <img src="data:image/png;base64,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" alt="Barang" />
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
          <a href="">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAABJZJREFUeF7tm0uoFUcQhj9FUBRFDCGiIvgMmBAfiO9XzEbIQo3GBIKKLxBd6EJw4UJduBRERZEoGheCURdCcKWiSdQkJkF8LnyCqBhf+EgUlcT5L30vYzszZ7rnzDlzcqdgONw51dVVf1dXV1Wf24ZWTm1auf2UAJQe0MoRyGMLHCsgpquB41F65QHAfwUEYBawrwQgAoHSA3Jw13ILeIB6EbiXctzElHxhti+B/UWOAbFBKkJpHw8rfBAsAYg7pkoPeBeBcgt4BMEyBhQ9E7SPqQ7AOmA7cMlacZ8t0FDH4IfAQUCfz4GFwJ4QCD4ANMwWmAdsBjpaq74zSJSWGkD+lwDMBT4HtFJxpK0wI+BR1uhKhfeAfyJWPcrIv4FOrtYDhY8BHjY5DSm8BzhZ48FcAlD0PMBjUZ2G1NQDhgO3zeOkJdAVGAD0NZ+LgZ6uQiL4axoEq6Bvi4h2wGxgFdAvg+CaekAGPWOHtgf2AlM9hTc8ALK7bbA1dgPfeIBQMwC+AMaaZ6SHoveB88BZYGPg/lctGepi/xHUCkMdZecOwAhA+fogR8WS2JX1LQN2WEyjgFOO8+QKwAajqKNOqdnXAyss7u9NeqvXN4GfgJPGO+4C14HuQP+gkhxoALPL6iaRWS5GsuzJ1NYDqv5GA7+GBvUGxgC/ADdchNm8vgDUyvhmfS8Hff2PgZdZjI0a6wuAOjULYpSRsttMIHvlqLCaIEpaPosYp3dHHeVVZPcBIMl4Re9PgYcVZ45n6Aw8ifh6vgm0USO1z7VNxgNDTDdJQfQMcCDIJr+Nm84VgCTjzwGTMhrfrOfP5igN6702+GONeTHYGDvOzPlBBcB1tE4HrkTFAJ8Wky1HKz8ZeJBh5cND/wLet2RpNe8AMlpe4kpPgU/soCkPyApANVderjzH5P6uBqbh1wWpYkwLZQXgQhCYJqR0eyUjyufrTdo+8tgmygKA0lQFnrTX2jMd7v98QVIqrdzgCNAlsE9xwyZ1l7dUAwBlY185aCrX05hqkuoCZYAyWomSXTvondL0MCmQL6oEgKJt+FdV+pWVInyYag3ALWOo6gAZppMiiZQKnw5ul3pZTFuBJZUAsIsH/cJKLhwmvUvq49vKucSAFyav18rKYD3qMqUhnR7LAXWTukUM0B2EyuomiosBdgtJwcs21tUDpNhHKSzQcSXXdiVlkSsB3S7FkZIjtdt0zCYCkIcHuBqUll8psqrFKSkGqLxWn6GF4jyg6ACoV/i1MVzHWhp6a+9X8oA8tkAaJZN4FNS02iqDpwE9HATKQ9RXeIeK7AFqZijJan76OBgs1sfALuPy1+LGFgkA1fvNxqqqc1nhsH3q/OiK/TtAQS+R6gWAGirDQgarwHmvkrIJ3/8L/BDI2BQUS4dd5GRJhV3myYv3kWmaKrKrN+hMjQiAqk/9T4KeQ4CSJm8qOgCvgT+DXsOPoUfBrWpUNAC0mr+FjFW+rx9K5Ub1BuAZcML09bXKKnKq3vlNQk8A2FVebmhbgmX877WaLCkPqLcOdZ3ftStcV2XzmLwEIA9UG0lm6QGNtFp56PoGCFMUULKCjkkAAAAASUVORK5CYII=" />
            <span>Peminjaman</span>
          </a>
        </li>
        <li>
          <a href="">
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
