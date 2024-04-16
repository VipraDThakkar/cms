<!DOCTYPE html>
<html>
<head>
    <title>New Conference Form</title>
    <link rel="stylesheet" href="\css\sidebar.css">
    <link rel="stylesheet" href="\css\dashboard.css">
</head>
<body>
<div class="wrap">
<x-adminheader/>   
<x-adminsidebar/>
<form action="{{url('/')}}/admin/conference/update/{{$conf->id}}" method ="post">
        @csrf
    <div class="main">
    <h1 class="left-align bordered-btn">Update Conference</h1>
             

        <div>
            <div class="lableside"> Conference Name: </div>
            <div class="filedside"> <input type="text" class ="input1-box" name="conference" value="{{$conf->conferencename}}"/> </div>
        </div>
                                
        <div>
            <div class="lableside"> Topic: </div>
            <div class="filedside"> <input type="text" class="input1-box" name="topic"  value="{{$conf->topic}}"></div>
        </div>

        <div>
            <div class="lableside"> Starting Date: </div>
            <div class="filedside"> 
            <input type="date" class ="input1-box" placenolder="dd-mm-yyyy" name="start_date" value="{{ \Carbon\Carbon::parse($conf->startdate)->format('Y-m-d') }}">
            </div>
        </div>
        
        <div>
            <div class="lableside"> Description: </div>
            <div class="filedside"> <textarea name="description" cols="35" rows="5" >{{$conf->description}}</textarea> </div>
        </div>  
        <br><br><br>
        <br><br><br>
        <br><br><br>

        <div>
            <div class="lableside"> </div>
            <div class="filedside"><input type="reset" class="reset-box" style="width: 100px;" value="Reset"> <input type="submit" style="width: 100px;"  class="save-changes-box" value="Save"></div>
        </div>  

     
    </div>
</form>
</body>
</html>