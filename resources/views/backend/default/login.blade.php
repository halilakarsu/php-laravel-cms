<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Sayfası</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/backend/assets/css/login.css" rel="stylesheet">
    <style>

    </style>
</head>
<body>
<div class="container">
    <div class="login-container">
        @if(Session::has('error'))
          <div class="alert alert-danger">
            {{session('error')}}
          </div>
        @endif
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        <h2 class="text-center">Giriş</h2>
        <form method="post" action="{{route('login.enter')}}">
            <div class="form-group">
                <label for="username">E-mail</label>
                <input type="text" required class="form-control" id="username" name="email" value="{{old('email')}}" placeholder="E-mail adresiniz giriniz">
            </div>
            @csrf
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" required class="form-control" id="password" name="password" placeholder="Şifrenizi giriniz.">
            </div>
            <div class="form-group">

                <input name="remember_me"  {{ old('remember_me') ? "checked" : "" }} type="checkbox" >
                <label for="password">Beni Hatırla</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kullanıcı Girişi</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
