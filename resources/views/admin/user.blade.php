<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .edit-icon, .delete-icon {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="wrap">
    <x-adminheader/>
    <x-adminsidebar/>      
    <div class="main">
                <h1 class="left-align bordered-btn">User</h1>
                <a href="{{url('register')}}" class="btn right-align">ADD User</a>
                </br>
                </br>
                <table>
              
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Create Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usermaster as $user)
                    <tr>
                        <td>{{$user->username}}</td>
                        <td>{{$user->firstname}}</td>                        
                        <td>
                            @if($user->type=='1')
                            Admin
                            @elseif($user->type=='2')
                            Reviewer
                            @elseif($user->type=='3')
                            Editor
                            @else
                            Author
                            @endif
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phonenumber}}</td>
                        <td>{{$user->created_at}}</td>

                        <td>
                            @if($user->isactive=='1')
                            Active
                            @else
                            Inactive
                            @endif
                        </td>
                    
                        <td>
                        <a href="{{route('Registration.edit',['id'=> $user->id])}}" > <span class="edit-icon"><i class="fas fa-edit"></i></span>
                            <a href="{{route('Registration.delete',['id'=> $user->id])}}" ><span class="delete-icon"><i class="fas fa-trash-alt"></i></span>  </a>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
    </div>
</div>
</body>
</html>