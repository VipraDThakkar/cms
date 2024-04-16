<!DOCTYPE html>
<html>
<head>
    <title> Conference Form</title>
    <link rel="stylesheet" href="\css\sidebar.css">
    <link rel="stylesheet" href="\css\dashboard.css">
</head>
<x-adminheader/>       
<body>
<x-adminsidebar/>

<div class="wrap">
<form action="{{url('/')}}/admin/conference/update/{{$conf->id}}" method ="post">
        @csrf
    <div class="main">
        <h1 class="left-align bordered-btn">Update Conference</h1>

        <div class="form-container">
            <form>
             
            <div class="input-name">
                <div>
                    Conference Name<br><input type="text" class ="input1-box" name="conference" value="{{$conf->conferencename}}"/>
                </div>
                <br>
                <div>
                    Description<br><input type="text" class ="input1-box" name="description"  value="{{$conf->description}}">
                </div>
                <br>
                <div>
                    Starting Date<br>
                    <input type="date" class ="input1-box" placenolder="dd-mm-yyyy" name="start_date" value="{{ \Carbon\Carbon::parse($conf->startdate)->format('Y-m-d') }}">
                </div>
                <br>
                <div>
                    End Date<br>
                    <input type="date" class="input1-box"  placenolder="dd-mm-yyyy" name="end_date" value="{{ \Carbon\Carbon::parse($conf->enddate)->format('Y-m-d') }}">
                </div>
                <br>
               
                <br>
                <div>
                    Topic<br>
                    <input type="text" class="input1-box" name="topic"  value="{{$conf->topic}}">
                </div>
                <br>
                <div>
                    <input type="reset" class="reset-box" value="Reset">&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="save-changes-box" value="Save Changes">
                </div>
            </div>
            </form>
        </div>
    </div>
</form>
</div>

</body>
</html>