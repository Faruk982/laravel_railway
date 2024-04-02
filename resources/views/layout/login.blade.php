<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/290cdb0382.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/login.css')}}">
    <style>
         body{
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url("{{ asset('images/demo.jpg') }}")no-repeat;
      background-size: cover;
      background-position: center;
  }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="E-mail" required>    
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>    
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="remember-forget">
                <label for=""><input type="checkbox">Remember Me</label>
                <a href="{{ route('Forget.index') }}">Forget password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account?<a href="{{ route('Registration.create') }}">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>