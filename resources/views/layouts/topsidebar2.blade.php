
    

<div class="sidebar">

<div class="logo_content">


<div class="logo">

<i class="fa fa-globe"> </i>

<div class="logo_name">SinsatoXP</div>

</div>

<i class="fa fa-bars" id="btn"> </i>


</div>


<ul class="nav_list">

<form action="" method="GET">
<li>


<input type="text" placeholder="Search..." name="search" id="search">

<span class="tooltip">Search </span>
<i class="fa fa-search"> </i> 


</li>
</form>






<li>
<a href="{{ url('/') }}">
<i class="fa fa-home"> </i>
<span class="links_name">Home </span>
</a>
<span class="tooltip">Home </span>

</li>

<li>
<a href="{{ url('/about') }}">
<i class="fa fa-info-circle"> </i>
<span class="links_name">About </span>
</a>
<span class="tooltip">About </span>

</li>

<li>
<a href="{{ url('/programming') }}">
<i class="fa fa-cloud"> </i>
<span class="links_name">Programming </span>
</a>
<span class="tooltip">Programming </span>

</li>

<li>
<a href="{{ url('/videos') }}">
<i class="fa fa-youtube-play"> </i>
<span class="links_name">Videos </span>
</a>
<span class="tooltip">Videos </span>

</li>

<li>
<a href="{{ url('/community') }}">
<i class="fa fa-group"> </i>
<span class="links_name">Community </span>
</a>
<span class="tooltip">Community </span>

</li>



<li>
<a href="{{ url('/contact') }}">
<i class="fa fa-comment-o"> </i>
<span class="links_name">Contact </span>
</a>
<span class="tooltip">Contact </span>

</li>

@if (Route::has('login'))

@auth

<li>
<a href="{{ url('/setting') }}">
<i class="fa fa-gear"> </i>
<span class="links_name">Settings </span>
</a>
<span class="tooltip">Settings </span>

</li>

@if(Auth::user()->nivel == 'admin')

<li>
<a href="{{ url('/admin') }}">
<i class="fa fa-newspaper-o"> </i>
<span class="links_name">DashBoard</span>
</a>
<span class="tooltip">DashBoard </span>

</li>

@endif


@else

<li>
 <a href="{{ route('login') }}"> 
<i class="fa fa-user"> </i>
<span class="links_name">Login </span>
</a>
<span class="tooltip">Login </span>

</li>


@if (Route::has('register'))
<li>
<a href="{{ route('register') }}">
<i class="fa fa-registered"> </i>
<span class="links_name">Register </span>
</a>
<span class="tooltip">Register </span>

</li>
@endif




@endauth



@endif








</ul>

@if (Route::has('login'))

@auth

<div class="profile_content">

<div class="profile">




<div class="profile_details">


<img src="{{asset('/users/'.Auth::user()->img)}}" alt="">
<div class="name_job">

<div class="name">{{ Auth::user()->name }}</div>

<div class="job">User Account</div>

</div>


</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button>          <i  class="fa fa-power-off" id="log_out"></i> </button>  
                                        
                                    </form>


                                  


</div>



</div>







                            

                @else



<div class="profile_content">

<div class="profile">




<div class="profile_details">


<img src="img/sett1.jpg" alt="">
<div class="name_job">

<div class="name">Sinsato Work </div>

<div class="job">Web development</div>

</div>


</div>

<!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button>          <i  class="fa fa-power-off" id="log_out"></i> </button>  
                                        
                                    </form> -->


                                  


</div>



</div>





@endauth



@endif








</div>


       
            @yield('content2')
        

