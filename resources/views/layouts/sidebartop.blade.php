

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="{{ asset('css/Topbar2.css') }}">

</head>
<body>
    

 
<div class="SidebarTop">
          


          <div class="todobar2"> 
          
          
                      <nav class="nav2">
                                 
                      <ul class="list">

                      <a href="{{ url('/about') }}">           <li class="items">  Home  </li> 
              
                      <a href="{{ url('/about') }}">           <li class="items">  About  </li> 
             
                     
             
                      <a href="{{ url('/programming') }}">           <li class="items">  Programming  </li> 

                      <a href="{{ url('/contact') }}">           <li class="items">  Contact   </li> 

    @if (Route::has('login'))
                
                    @auth
                    <ul class="rightlist">
                           <a href="{{ url('/home') }}">      <li class="items">  Home </li>  </a> 
                    @else
                               <a href="{{ route('login') }}">  <li class="items right">    Log in  </li>   </a>  
              

                        @if (Route::has('register'))
                                     <a href="{{ route('register') }}">    <li class="items right">  Register   </li>  </a>  
                        @endif
                    @endauth
                
            @endif
            </ul>
                          </ul>
          
          
                          <button class="btn" onClick={toggleNav}> Menu  </button>
                  </nav>
          
          
                  </div>

            
        </div>
       
            @yield('content2')
        


</body>
</html> -->
