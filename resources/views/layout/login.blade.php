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
    </style>
</head>
<body>
    <div class="wrapper">
        <form  method="post" action="{{route('login.check')}}">
            @csrf
            @method('post');
            <h1>Login</h1>
            <div class="input-box">
                <!-- <input type="text" id="email" name="email" placeholder="E-mail" required>  -->
                <input type="text" id="email" name="email" placeholder="E-mail"  required>   
                <i class="fa-solid fa-user"></i>
                <span class="text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                  </span>
            </div>
            <div class="input-box">
    <input type="password" id="password" name="password" placeholder="Password" required>    
    <i class="fa-solid fa-lock"></i>
</div>

            <div class="remember-forget">
            <label for="remember"><input type="checkbox" id="remember" name="remember">Remember Me</label>
                <a href="{{ route('Forget.index') }}">Forget password</a>
            </div>
            <button type="submit" class="btn" >Login</button>
            <div class="register-link">
                <p>Don't have an account?<a href="{{ route('Registration.create') }}">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>