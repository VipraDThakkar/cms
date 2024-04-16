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
                <h1 class="left-align bordered-btn">Conference</h1>
                @if ( Session::get('role')==1)
                    <a href="{{url('admin/conference/add')}}"  class="btn right-align">Add Conference</a>
                @endif
                </br>
                </br>

                <table>
              
                <thead>
                    <tr>
                        <th>Conference</th>
                        <th>Start Date</th>
                        
                        <!-- <th>End Date</th> -->
                        <th>Topic</th>
                        <th>Register Author</th>
                        
                        @if ( Session::get('role')==1)
                            <th>Edit</th>   
                        @endif

                         
                    </tr>
                </thead>
    
                <tbody>

                @foreach ($conference as $conf)
        <tr>
            <td>{{$conf->conferencename}}</td>


            <td>{{ \Carbon\Carbon::parse($conf->startdate)->format('F j, Y') }}</td>
            <!-- <td>{{ \Carbon\Carbon::parse($conf->enddate)->format('F j, Y') }}</td> -->

            <td>{{$conf->topic}}</td>
            <td>{{$conf->user_count}}</td>
            @if ( Session::get('role')==1)

                <td>
                <a href="{{url('admin/conference/edit/')}}/{{$conf->id}}"><span class="edit-icon"><i class="fas fa-edit"></i></span>
                    <!-- <a href="{{url('admin/conference/delete/')}}/{{$conf->id}}"><span class="delete-icon"><i class="fas fa-trash-alt"></i></span>  </a> -->
                </td>
            @endif

        </tr>
        @endforeach
                <!-- Add more rows as needed -->
                </tbody>
            </table>
    </div>
</div>
</body>
</html>







