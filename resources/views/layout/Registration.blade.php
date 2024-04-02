<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/Registration.css')}}">
    <style>
        body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    background: url("{{ asset('images/demo2.jpg') }}");
    background-size: cover;
}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Registration</h1>
        <form method="post" action="{{route('Registration.store')}}">
            @csrf;
            @method('post');
            <div class="main-user-info">
                <div class="user-input-box">
                  <label for="fullName">Fullname</label>
                  <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name">
                  <span class="text-danger">
                    @error('fullName')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter Your Email">
                    @error('email')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="user-input-box">
                    <label for="phoneNumber">Phone no</label>
                    <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Enter Your Phone No">
                    @error('phoneNumber')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="user-input-box">
                    <label for="nid">NID</label>
                    <input type="number" id="nid" name="nid" placeholder="Enter Your NID">
                    @error('nid')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="user-input-box">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" placeholder="Enter Your Birthdate">
                    @error('dob')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="user-input-box">
                    <label for="hTown">Hometown</label>
                    <input type="text" id="hTown" name="hTown" placeholder="Enter Your Hometown">
                    @error('hTown')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="user-input-box">
                    <label for="passWord">Password</label>
                    <input type="password" id="passWord" name="passWord" placeholder="Enter Your Password">
                    @error('passWord')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="user-input-box">
                    <label for="cpassWord"> Confirm Password</label>
                    <input type="password" id="cpassWord" name="cpassWord" placeholder="Confirm Your Password">
                    @error('cpassWord')
                    {{$message}}
                    @enderror
                  </div>
            </div>
            <div class="gender-details-box">
                 <span class="gender-title">Gender</span>
                 <div class="gender-category">
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                    @error('gender')
                    {{$message}}
                    @enderror
                 </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>