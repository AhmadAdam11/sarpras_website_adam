<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet"/>
  <style>
    * { box-sizing: border-box; }
    body, html {
      margin: 0;
      height: 100%;
      font-family: Arial, sans-serif;
      background-color: #1f2f7f;
    }
    .container {
      display: flex;
      height: 100vh;
      width: 100%;
    }
    .left {
      background-color: #fff;
      width: 360px;
      min-width: 360px;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 60px;
    }
    .logo {
      width: 120px;
      height: auto;
      margin-bottom: 30px;
    }
    h2 {
      font-family: 'Fredoka One', cursive;
      font-size: 28px;
      color: #1f2f7f;
      margin: 0 0 40px 0;
    }
    form {
      width: 280px;
      display: flex;
      flex-direction: column;
    }
    input[type="text"],
    input[type="password"] {
      background-color: #d3d3d3;
      border: none;
      border-radius: 6px;
      padding: 12px 15px;
      margin-bottom: 20px;
      font-size: 14px;
      color: #333;
      font-weight: 600;
      font-family: Arial, sans-serif;
    }
    input::placeholder {
      color: #999999;
      font-weight: 600;
    }
    button {
      background-color: #1f2f7f;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #162063;
    }
    #message {
      margin-top: 20px;
      color: red;
      font-size: 14px;
      text-align: center;
    }
    .right {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .right img {
      width: 100%;
      height: 100vh;
      object-fit: cover;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="left">
      <img alt="Logo" class="logo" src="https://smktarunabhakti.net/wp-content/uploads/2020/07/logotbvector-copy.png" />
      <h2>Login</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Sign In</button>

        <div id="message">
          @if (session('error'))
            <div>{{ session('error') }}</div>
          @endif
          @error('name')
            <div>{{ $message }}</div>
          @enderror
          @error('password')
            <div>{{ $message }}</div>
          @enderror
        </div>
      </form>
    </div>
    <div class="right">
      <img alt="School" src="https://smktarunabhakti.net/wp-content/uploads/2023/11/20231002_141528-scaled.jpg" />
    </div>
  </div>
</body>
</html>
