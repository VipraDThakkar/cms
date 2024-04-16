<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="\css\login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

</head>
<body>
       
    <div class="img-container">
        <img src="/images/signbg.png" alt="error loading" width="900px" height="660px">
    </div>
    <div class="signup-box">
        <h1>update Sign Up</h1>
        <div class="form-container">
            <form action="{{url('/')}}/register/update/{{$usermaster->id}}" method ="post">
                
            @csrf
            <div class="input-name">
                <div>
                    <!-- we use place holder to write content into box -->
                    <i class="fa fa-user-circle lock"></i>
                    <input type="text" placeholder="Username"  class ="input-box" name="username"  value="{{$usermaster->username}}" required maxlength="15" >
                </div>
                <span class="text-danger"> @error('username') {{$message}} @enderror </span>                    
             
                <span>
                    <i class="fa fa-user lock"></i>
                    <input type="text" placeholder="First Name"  class ="input-box1" name="firstname" value="{{$usermaster->firstname}}"  maxlength="15" required>
                </span>
                &nbsp;&nbsp;
                <span>
                    <i class="fa fa-user lock"></i>
                    <input type="text" placeholder="Middle Name"  class ="input-box1" name="middlename" value="{{$usermaster->middlename}}"  maxlength="15" required>
                </span>
                &nbsp;&nbsp;
                <span>
                    <i class="fa fa-user lock"></i>
                    <input type="text" placeholder="Last Name"  class ="input-box1" name="lastname" value="{{$usermaster->lastname}}" maxlength="15" required>
                </span>
                <br>
                <div>
                    <i class="fa fa-envelope lock"></i>
                    <input type="text" placeholder="Email"  class ="input-box" name="email"  value="{{$usermaster->email}}" maxlength="45" required >
                </div>
                <span class="text-danger"> @error('email') {{$message}} @enderror </span>                    

            </div>
                <div class="input-name">
                    <i class="fa fa-street-view lock"></i>
                    <select class="input-box2" name="role"   value="{{$usermaster->type}}">
                        <option value="0">Enter Your Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Reviewer</option>
                        <option value="3">Editor</option>
                        <option value="4">Author</option>
                    </select> 
                    <div class="arrow"></div>
                </div>
                <span class="text-danger"> @error('role') {{$message}} @enderror </span>                    
            <div class="input-name">
                <div>
                    <i class="fa fa-phone lock"></i>
                    <input type="text" placeholder="Phone Number"  class ="input-box" name="phonenumber"  value="{{$usermaster->phonenumber}}"  maxlength="10"required>
                </div>
                <span class="text-danger"> @error('phonenumber') {{$message}} @enderror </span>                    

                <div>
                    <i class="fa fa-lock lock"></i>
                    <input type="text" placeholder="Password"  class ="input-box" name="password" maxlength="15" required>
                </div>
                <span class="text-danger"> @error('password') {{$message}} @enderror </span>                    

                <div>
                    <i class="fa fa-lock lock"></i>
                    <input type="text" placeholder="Confirm Password" class="input-box" name="password_confirmation" maxlength="15" required>
                </div>
                <span class="text-danger"> @error('password_confirmation') {{$message}} @enderror </span>                    

                <div>
                    <input type="submit" class="submit-box" value="SUBMIT">
                </div>
                <br>
                <div>
                    &nbsp;&nbsp;&nbsp;Already have an account?
                    <a href="{{url('login')}}"  target="_blank"> Login Here</a>
                
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>