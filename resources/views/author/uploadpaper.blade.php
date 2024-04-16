<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Upload</title>
    <link rel="stylesheet" href="\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .hidden {
            display: none;
        }
        .myDiv {
            width: 400px; /* You can adjust the width as per your requirement */
            padding: 10px;
            /* border: 1px solid #ccc; */
            margin: 0 auto; /* Centers the div horizontally */
      }
    </style>
</head>
<body>
    <x-layots/>    
    <Div>
        <x-authorsidebar/>
    </Div>       
    <Div>
        <h2>Upload File</h2>
        <form action="{{url('/')}}/author/uploadpaper" method ="post" enctype="multipart/form-data">
            @csrf
            
            <div  class="hidden">
                Conference id<input type="text" class ="input1-box" name="confid" value="{{session('confid')}}"  >
            </div>
<!-- 
            <div>
                 <label  class="myDiv" >Conference  :</label>
                 <label  class="myDiv" >{{session('confid')}}</label>
            </div> -->
            <br>

            <div>
                 <label  class="myDiv" for="file">Paper Name :</label>
                <input type="text" class ="input1-box" name="papername" value="" >
            </div>
            <br>
            
            <div>
                <label  class="myDiv" for="file">Choose a file:</label>
                <input type="file" id="file" name="file">
            </div>
            <br>
            <div>
                  <label  class="myDiv" for="file1"></label>
                 <button  type="submit">Upload</button>
            </div>

            
        </form>
    </Div>

</body>
</html>