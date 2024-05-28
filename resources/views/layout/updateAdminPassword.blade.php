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
        <form  method="post" action="{{route('admin.update1')}}">
            @csrf
           
            <h1>Update Admin</h1>
            
            <div class="input-box">
    <input type="password" id="password" name="password"  placeholder="Password" required>    
    <i class="fa-solid fa-lock"></i>
     </div>
     <button type="submit" class="btn" >Update</button>
        </form>
    </div>
</body>
</html>