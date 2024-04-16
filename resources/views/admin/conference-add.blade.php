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
       
    <div class="main">
        <form action="{{url('/')}}/admin/conference/save" method ="post">
            @csrf 
                <h1 class="left-align bordered-btn">New Conference</h1>

                <div class="form-container1">
                    <form>
                        <div>
                            <div class="lableside"> Conference Name: </div>
                            <div class="filedside"> <input type="text" class ="input1-box" name="conference"> </div>
                        </div>
                                              
                        <div>
                            <div class="lableside"> Topic: </div>
                            <div class="filedside">  <input type="text" class="input1-box" name="topic"> </div>
                        </div>

                        <div>
                            <div class="lableside"> Starting Date: </div>
                            <div class="filedside"> 
                                <input type="date" class ="input1-box" placenolder="dd-mm-yyyy" name="start_date" >
                            </div>
                        </div>
                        
                        <div>
                            <div class="lableside"> Description: </div>
                            <div class="filedside"> <textarea name="description" cols="35" rows="5" ></textarea> </div>
                        </div>  
                        <br><br><br>
                        <br><br><br>
                        <br><br><br>

                        <div>
                            <div class="lableside"> </div>
                            <div class="filedside"><input type="reset" class="reset-box" style="width: 100px;" value="Reset"> <input type="submit" style="width: 100px;"  class="save-changes-box" value="Save"></div>
                        </div>                    
                       
                </form>
            </div>
        
        </form>
    </div>

</div>

</body>
</html>