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
 /* Hide increment and decrement buttons in webkit browsers (Chrome, Safari) */
 input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hide increment and decrement buttons in Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        .text-danger{
          color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Registration</h1>
        <form method="post" action="{{route('Registration.store')}}">
            @csrf;
            
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
                    <span class="text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                    </span>
                   
                  </div>
                  <div class="user-input-box">
                    <label for="phoneNumber">Phone no</label>
                    <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Enter Your Phone No">
                    <span class="text-danger">
                    @error('phoneNumber')
                    {{$message}}
                    @enderror
                    </span>
                    
                  </div>
                  <div class="user-input-box">
                    <label for="nid">NID</label>
                    <input type="number" id="nid" name="nid" placeholder="Enter Your NID">
                    <span class="text-danger">
                    @error('nid')
                    {{$message}}
                    @enderror
                    </span>
                    
                  </div>
                  <div class="user-input-box">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" placeholder="Enter Your Birthdate">
                    <span class="text-danger">
                    @error('dob')
                    {{$message}}
                    @enderror
                    </span>
                   
                  </div>
                  <div class="user-input-box">
                    <label for="hTown">Hometown</label>
                    <input type="text" id="hTown" name="hTown" placeholder="Enter Your Hometown">
                    <span class="text-danger">
                    @error('hTown')
                    {{$message}}
                    @enderror
                    </span>
                  
                  </div>
                  <div class="user-input-box">
                    <label for="passWord">Password</label>
                    <input type="password" id="passWord" name="passWord" placeholder="Enter Your Password">
                    <span class="text-danger">
                    @error('passWord')
                    {{$message}}
                    @enderror
                    </span>
                    
                  </div>
                  <div class="user-input-box">
                    <label for="cpassWord"> Confirm Password</label>
                    <input type="password" id="cpassWord" name="cpassWord" placeholder="Confirm Your Password">
                    <span class="text-danger">
                    @error('cpassWord')
                    {{$message}}
                    @enderror
                    </span>
                    
                  </div>
            </div>
            <div class="gender-details-box">
                 <span class="gender-title">Gender</span>
                 <div class="gender-category">
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                    <span class="text-danger">
                    @error('gender')
                    {{$message}}
                    @enderror
                    </span>
                  
                 </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>