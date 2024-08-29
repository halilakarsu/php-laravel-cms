<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: url('https://via.placeholder.com/1920x1080?text=Background+Image') no-repeat center center fixed; /* Arka plan resmi */
            background-size: cover; /* Resmin ekranı kaplamasını sağlar */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            width: 500px; /* Form genişliğini 600 piksel olarak ayarladım */
            padding: 30px;
            background: rgba(255, 255, 255, 0.9); /* Form arka planını hafif şeffaf beyaz yaptım */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-form .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            height: auto;
        }
        .login-form .card-header {
            background: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-bottom: none;
        }
        .login-form .form-control {
            border-radius: 0;
            box-shadow: none;
            border-color: #ddd;
            width: 100%; /* Input elemanlarının genişliğini form genişliğine uyacak şekilde ayarladım */
            max-width: 600px;
        }
        .login-form .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .login-form .btn {
            border-radius: 0;
            background: #007bff;
            border: none;
            color: #fff;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            width: 100%; /* Butonun genişliğini input elemanlarıyla aynı yaptım */
            max-width: 600px;
        }
        .login-form .btn:hover {
            background: #0056b3;
        }
        @media (max-width: 768px) {
            .login-form {
                width: 90%;
                padding: 20px;
            }
            .login-form .form-control, .login-form .btn {
                width: 100%; /* Mobil cihazlarda input ve buton genişliğini %100 yaparım */
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-form">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Login</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="text-center">
                        <p class="text-muted">Don't have an account? <a href="#">Sign up here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
