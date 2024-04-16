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
                
        <h1 class="left-align bordered-btn">Paper</h1>
        </br>

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
                    <th>File Name</th>
                    <th>Paper Name</th>
                    <th>Paper ID</th>
                    <th>Conf ID</th>
                    <th>Conf User ID</th>
                    <th>Status</th>
                    <th>Action</th>                            
                </tr>
            </thead>

            <tbody>

                @foreach ($conference as $conf)
                    <tr>
                        <td>{{$conf->conferencename}}</td>
                        <td>{{ \Carbon\Carbon::parse($conf->startdate)->format('F j, Y') }}</td>

                        <td>{{$conf->file_name}}</td>
                        <td>{{$conf->papername}}</td>
                        <td>{{$conf->PaperID}}</td>
                        <td>{{$conf->ConfID}}</td>
                        <td>{{$conf->userconfid}}</td>
                        <td>{{$conf->paperstatus}}</td>
                        <!-- <td>{{$conf->Status}}</td> -->                
                        <td>
                            @if(session('role') == 3 && $conf->Status == 1)
                                <a href="{{url('admin/paper/sendforeditorapproval')}}/{{$conf->PaperID}}"><span class="register-icon"><i class="fas fa-registered"></i></span>       
                            @endif
                            @if(session('role') == 2 && $conf->Status == 2)
                                <a href="{{url('admin/paper/sendforreviewerapproval')}}/{{$conf->PaperID}}"><span class="register-icon"><i class="fas fa-registered"></i></span>       
                            @endif

                            <a href="{{url('admin/paper/showPdf')}}/{{$conf->PaperID}}"><span class="register-icon"><i class="fas fa-file-pdf"></i></span>       
                            
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







