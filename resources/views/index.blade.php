<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Set background image */
            background-image: url('/images/welcome.jpg');
            /* Set background image size */
            background-size: cover;
            /* Set background image to cover the entire page */
            background-repeat: no-repeat;
            /* Prevent background image from repeating */
            position: relative; /* Ensure z-index works correctly */
        }
        .container {
            text-align: center;
            z-index: 1; /* Ensure content appears above background image */
            position: relative; /* Ensure z-index works correctly */
        }
        h1 {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        /* Style for the navigation bar */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            padding: 10px 20px; /* Adjusted padding */
            /* display: flex; */
           justify-content: space-between;
            align-items: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        nav a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>

<nav>
    <h1>Welcome to Our Website of Conference Management System</h1>
    <div>
        <a href="{{url('login')}}">Login</a>
        <a href="{{url('register')}}">Register</a>
    </div>
</nav>

</body>
</html>