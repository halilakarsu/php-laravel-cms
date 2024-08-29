<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login Form</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- CSS Files -->
    <link rel="stylesheet" href="/backend/assets/css/bootstrap.min.css">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f7f7f7;
        }
        .login-card {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
        }
        .login-image {
            width: 50%;
            background-image: url('https://via.placeholder.com/400'); /* Buraya kendi resim URL'inizi ekleyin */
            background-size: cover;
            background-position: center;
        }
        .login-form {
            width: 50%;
            padding: 20px;
        }
        .login-form .card-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .login-form .form-group {
            margin-bottom: 15px;
        }
        .login-form .btn {
            width: 100%;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .remember-me input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="card login-card">
        <div class="login-image"></div>
        <div class="login-form">
            <div class="card-header">
                <div class="card-title">Login</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email2">Email Address</label>
                    <input type="email" class="form-control" id="email2" placeholder="Enter Email">
                    <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Remember Me</label>
                </div>
            </div>
            <div class="card-action">
                <button class="btn btn-success">Login</button>
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Core JS Files -->
<script src="/backend/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/backend/assets/js/core/bootstrap.min.js"></script>
</body>
</html>
