<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\feedback.css">
    <link rel="stylesheet" href="\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <title>Register</title>
</head>
<body>
    
<form action="{{url('/')}}/admin/contactus/save" method ="post">
 @csrf
</html>
<x-adminheader/>
<x-adminsidebar/>
        <div class="main">
            <h1 class="left-align bordered-btn">Contact us</h1>

            <div class="input-name">
                <div>
                    Name:&nbsp;<input type="text" class ="input-box" name="name">
                </div>
                <div>
                    Phone Number:&nbsp;<input type="text" class ="input-box" name="phonenumber">
                </div>
                <div>
                    Email address:&nbsp; <input type="email" class="input-box" name="email" >
                    </div>
                </div>
                <div>
                Description:&nbsp;<br><textarea name="description" cols="55" rows="5"></textarea>
                </div>
                <div>
                    <input type="submit" class="submit-box" value="SUBMIT Feedback">
                </div>
            </div>
        </div>
</form>
</body>
