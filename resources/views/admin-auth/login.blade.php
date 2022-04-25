<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maati | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/style.css') }}">
</head>

<body>
<div class="login-page">
    <div class="img-div">
        <img src="{{ asset('dashboard_files/images/login.png') }}" alt="">
    </div>
    <div class="form-div">
        <div class="details">
        <h2>Wellcom Back !</h2>
        <p>Login to contiune</p>
            <x-auth-validation-errors class="danger" :errors="$errors" />
        </div>
        <form action="{{ route('dashboard.login') }}" method="post">
            @csrf
            <div class="input-div">
                 <i class="bi bi-person"></i>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Your Email">
            </div>
            <div class="input-div">
                <i class="bi bi-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="rember">
                <input type="checkbox" name="remember" id="check">
                <label for="check">Rember me</label>
            </div>
            <button class="login-btn">Login</button>
            @if (Route::has('dashboard.password.request'))
            <a href="{{ route('dashboard.password.request') }}" class="forgot-btn" >Forgot Password ?</a></button>
            @endif
        </form>

        <div class="social">
            <p>Login with</p>
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-google"></i>
        </div>
     </div>
     
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
</body>

</html>