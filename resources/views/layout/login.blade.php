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
  button{
    cursor: pointer;
  }
   .text-danger{
    color: red;
   }
    </style>
</head>
<body>
    <div class="wrapper">
   
        <form  method="post" action="{{route('login.check')}}">
            @csrf
            
            <h1>Login</h1>
            <div class="input-box">
                <!-- <input type="text" id="email" name="email" placeholder="E-mail" required>  -->
                @if (isset($_COOKIE['remember_email']))
                <input type="text" id="email" name="email" placeholder="E-mail" value="{{ $_COOKIE['remember_email'] }}" required>
                @else
                <input type="text" id="email" name="email" placeholder="E-mail"  required>   
                @endif
                <i class="fa-solid fa-user"></i>
               
            </div>
            <div class="input-box">
            @if (isset($_COOKIE['remember_password']))
            <input type="password" id="password" name="password" placeholder="Password" value="{{ $_COOKIE['remember_password'] }}" required> 
            @else
    <input type="password" id="password" name="password" placeholder="Password" required> 
    @endif   
    <i class="fa-solid fa-lock"></i>

</div>

            <div class="remember-forget">
            <label for="remember"><input type="checkbox" id="remember" name="remember">Remember me a month</label>
                <a href="{{ route('forgot_password.view') }}">Forget password</a>
            </div>
            <button type="submit" class="btn" >Login</button>
            <div class="register-link">
                <p>Don't have an account?<a href="{{ route('Registration.create') }}">Register</a></p>
            </div>
        </form>
        @if (Session::has('error'))
    <div class="text-danger">{{ Session::get('error') }}</div>
    @endif
    </div>
</body>
</html>