<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="\css\login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <form action="{{url('/')}}/login/validate" method ="post">
        @csrf

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message -->
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="img-container">
            <img src="\images\bg.png" alt="error loading" width="932x" height="525px">
        </div>
        <div class="login-box">
            <h1>login Here</h1>
            <div class="input-name">
                <div>
                    <i class="fa fa-user-circle lock"></i>
                    <input type="text" placeholder="Username"  class ="input-box" name="username" value="{{ session('username') }}" maxlength="15" >
                </div>
            </div>
            <span class="text-danger"> @error('username') {{$message}} @enderror </span>
            <div class="input-name">
                <div>
                    <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Password"  class ="input-box" name="password" value="{{session('password')}}" maxlength="15">
                </div>
            </div>
            <span class="text-danger"> @error('password') {{$message}} @enderror </span>                    
            <div class="input-name"  >
                <i class="fa fa-street-view lock"></i>
                <select class="input-box2" name="role" value="{{ session('role') }}">
                    <option value="0">Enter Your Role</option>
                    <option value="1">Admin</option>
                    <option value="2">Reviewer</option>
                    <option value="3">Editor</option>
                    <option value="4">Author</option>
                </select>  
                <div class="arrow"></div>
            </div>


            <div>
                <input type="submit" class="submit-box" value="SUBMIT">
            </div>
            <div>
                <!-- target will open this in new tab -->
                <br>
                Don't have an account?
                <!-- <a href="{{url('register')}}" target="_blank"> Sign Up Here</a> -->
                <a href="{{url('register')}}" class="btn">Sign Up Here</a>

            </div>
        </div>
    </form>
</body>
</html>