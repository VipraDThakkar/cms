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

        h2{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
            text-align: center;
            background-color: rgb(208, 199, 199);
            border: 4px solid rgb(47, 46, 46);
            border-radius: 2px;
            width: 99%;
            

        }
        header{
            margin: auto;
            
        }
        .box{
            border:2px solid rgb(84, 83, 83);
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            background-color: rgb(208, 199, 199);
            color: rgb(56, 47, 47);
            font-weight: bold;
        }

        h3{
            font-size: 25px;
        }




    </style>
</head>
<body>
<div class="wrap">
@if ( Session::get('role')==4)
     {<x-layots/>       
        <x-authorsidebar/>}   
        @else
       { <x-adminheader/>       
    <x-adminsidebar/>}
@endif

    <div class="main scrollable-panel">
        

                <table>
                <h2>CONFERENCE DETAILS</h2>

              
                <tbody>
                    @foreach ($conference as $conf)
                    <div class="box">
                        <h3>{{$conf->conferencename}}</h3>
                        <p>Topic : {{$conf->topic}}</p>
                        <p>Date : {{ \Carbon\Carbon::parse($conf->startdate)->format('F j, Y') }}</p>
                        <p>Author Name : {{$conf->firstname}} {{$conf->middlename}} {{$conf->lastname}}</p>
                        <p>Paper : {{$conf->papername}}</p>
                        <p>File Name :{{$conf->file_name}}</p>
                        <p>Editor Name : {{$conf->efirstname}} {{$conf->emiddlename}} {{$conf->elastname}}</p>
                        <p>Reviewer Name : {{$conf->rfirstname}} {{$conf->rmiddlename}} {{$conf->rlastname}}</p>
                        <p>Reviewer Comment : {{$conf->comment}} </p>
                        
                        <p>Ratings : {{$conf->rating}}/10</p>
                        <a href="{{url('admin/paper/showPdf')}}/{{$conf->paperid}}"><span class="register-icon"><i class="fas fa-file-pdf"></i></span>       
                       
                    </div>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
</body>
</html>







