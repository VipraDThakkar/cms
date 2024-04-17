<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\feedback.css">
    <link rel="stylesheet" href="\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <title>Register</title>
    <style>
        .hidden {
            display: none;
        }
    </style>

</head>
<body>
    
<form action="{{url('/')}}/admin/paper/reviewsave" method ="post">
 @csrf
</html>
<x-adminheader/>
<x-adminsidebar/>
    <div class="main">
            <h1 class="left-align bordered-btn">Paper - Review</h1>

            @foreach ($conference as $conf)

            <div class="input-name">

                <div class="hidden">
                    paperid <br><input type="text" class ="input1-box" name="paperid" value= '{{$conf->PaperID}}'>
                </div>

                <div>
                            <div class="lableside"> Conference Name: </div>
                            <div class="filedside"> {{$conf->conferencename}} </div>
                </div>
                
                <div>
                            <div class="lableside"> Description: </div>
                            <div class="filedside"> {{$conf->startdate}} </div>
                </div>  
                <div>
                            <div class="lableside"> Starting Date:</div>
                            <div class="filedside"> {{$conf->startdate}}</div>
                </div>             
                <div>
                            <div class="lableside"> File Name:</div>
                            <div class="filedside">{{$conf->file_name}}</div>
                </div> 
                <div>
                            <div class="lableside">Paper Name:</div>
                            <div class="filedside"> {{$conf->papername}}</div>
                </div> 
      
                <div>
                  <div class="lableside">Review:</div>

                  <div class="filedside"> 
                        <select class="input-box2" name="fdrate" value="{{ session('role') }}">
                            <option value="0">Enter Your Feedback</option>
                            <option value="10">Very Good</option>
                            <option value="8">Good</option>
                            <option value="5">Average</option>
                            <option value="2">Poor</option>
                        </select>  
                    </div>
                </div>
                <div>
                    <div class="lableside">Description:</div>
                    <div class="filedside"> <textarea name="description" cols="55" rows="5"></textarea></div>
                </div>
                

                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>

                <div>
                    <div class="lableside"> </div>
                    <div class="filedside"> <input type="submit" class="submit-box" value="Submit"></div>
                </div>        

            </div>
            @endforeach
            
</form>
</body>
