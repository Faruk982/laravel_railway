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
      background: url("{{ asset('images/login.jpg') }}")no-repeat;
      background-size: cover;
      background-position: center;
  }
  .input-box input[type="password"] {
    color: black;
}
.error{
    color: red;
    margin-top: 30px;
    padding: 15px;
    border-radius: 5px;
    border: 1px solid red;
    background-color: #f8d7da;
}
    </style>
</head>
<body>
    
<div class="wrapper">
        <h2>Forgot Password</h2>

        <!-- Display status or errors if any -->
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Forgot password form -->
        <!-- reset-password.blade.php -->
        @if ($errors->has('email'))
            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
        @endif

        <form method="POST" action="{{ route('resetPasswordPost') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
             <div class="input-box">
             <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
             </div>
            
             <div class="input-box">
             <label for="password">New Password</label>
            <input id="password" type="password" name="password" required>
             </div>
           
             <div class="input-box">
             <label for="password_confirmation">Confirm New Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
             </div>
            

            <button type="submit" class="btn">Reset Password</button>
        </form>

    </div>


</body>
</html>