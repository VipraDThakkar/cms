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
        <x-layots/>       
        <x-authorsidebar/>

    <div class="main">
                <h1 class="left-align bordered-btn">Conference</h1>

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

                <table>

                <thead>
                    <tr>
                        <th>Conference</th>
                        <th>Start Date</th>
                        <th>Topic</th>
                        <th>Register</th> 
                        <th>Upload Paper</th>    
   
                    </tr>
                </thead>
    
                <tbody>

                @foreach ($conference as $conf)
        <tr>
            <td>{{$conf->conferencename}}</td>
            <td>{{ \Carbon\Carbon::parse($conf->startdate)->format('F j, Y') }}</td>
            <td>{{$conf->topic}}</td>
            <td>
                  @if ( $conf->user_id == "")
                          <a href="{{url('author/conference/userregister')}}/{{$conf->id}}"><span class="register-icon"><i class="fas fa-registered"></i></span>
                  @endif
            </td>
            <td>
                  @if ( $conf->user_id > 0 and $conf->paperupload == 0 )
                    <a href="{{url('author/conference/usersubmitspaper')}}/{{$conf->id}}?confname=value1"><span class="upload-icon"><i class="fas fa-file-upload"></i></span>
                  @elseif ( $conf->user_id == "")
                    
                  @else
                    Already Uploaded  
                  @endif
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







