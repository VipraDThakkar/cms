<div class="side-bar">
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}"  >Home</a>
            <br><br>

            @if ( Session::get('role')==1)
                <a href="{{url('admin/user')}}"  >User</a>
                <br><br>
            @endif

            <!-- {{Session::get('role')}}
            <a href="{{url('admin/user')}}"  >User</a>
            <br><br> -->
            
            <a href="{{url('admin/conference')}}" >Conference</a>
            <br><br>


            <a href="{{url('admin/paper')}}" >Papers</a>
            <br><br>
            <!-- <a href="{{url('feedback')}}">Review</a>
            <br><br> -->
            <a href="{{url('admin/contactus')}}" >Contact Us</a>
            <br><br> 
            <a href="{{url('logout')}}" >Logout</a>
            <br><br>
        </li>
    </ul>
</div>