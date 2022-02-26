


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SinsatoX"/>

    <title>SinsatoX</title>
    <link rel="shortcut icon" href="img/iconsinsa4.png">

    <link rel="stylesheet" href="{{ asset('css/example.css') }}">

</head>
<body>














<<<<<<< HEAD






<div class="comp"> 

<div class="create">  



<h1 class="createtext">Create Task</h1>


  <form action="{{ route('example-create') }}"  method="POST">
@csrf

 <div class="form-group"> 
<input type="hidden"  name="id" id="name" >
 </div> 



<label for="name">Name</label>
<input type="text"  name="name" placeholder="Name">

<div> 

</div>

<label for="name">Date</label>

<select name="date">

<option value="Monday">Monday</option>
<option value="Tuesday">Tuesday</option>
<option value="Wednesday">Wednesday</option>
<option value="Thursday">Thursday</option>
<option value="Friday">Friday</option>
<option value="Saturday">Saturday</option>
<option value="Sunday">Sunday</option>


                    </select>  
                    


<div> 
<textarea type="text"  name="description" cols="30" placeholder="Description" rows="7" class="textdesc"></textarea>
</div>


<button type="submit" class="buttoncreate">Create Task</button>

  </form>


@if($message = Session::get('Message'))  
  

<div class="message" role="alert">

<h5> Message: </h5>

<span>  {{ $message }}     </span>

</div>

@endif


</div>









  






















<div class="postcomplet"> 

@foreach($tasks as $task)









<div class="update"> 

     
<form action="{{ route('example-update') }}"  method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')


          
                

<input type="hidden" name="id" id="idEdit" value="{{ $task->id }}">
                
                    <div>

Name:  <input type="text" class="form-control" name="name" placeholder="Nombre"  value="{{ $task->name }}" > 


                    </div>

                    <div>
                        
                    Date: <select name="date">
                    <option value="{{ $task->date}}">{{ $task->date}}</option>

                    <option value=""></option>             
<option value="Monday">Monday</option>
<option value="Tuesday">Tuesday</option>
<option value="Wednesday">Wednesday</option>
<option value="Thursday">Thursday</option>
<option value="Friday">Friday</option>
<option value="Saturday">Saturday</option>
<option value="Sunday">Sunday</option>


                    </select> 
                    
                   
                                            </div> 

                  

                     <div>
                        
                    Description: <textarea type="text" placeholder="description" class="form-control" name="description">{{ $task->description }}</textarea>
                        
                        
                                            </div>

                                           

                                   

            <div class="btns"> 
               
                    
                    <button type="submit" class="bedit">Edit</button>
              
      </form>



      <form action="{{ route('example-delete') }}" method="POST" >
      @csrf

      
      <input type="hidden" name="id" value="{{ $task->id }}">
      <input type="hidden" name="_method" value="delete">
      <button type="submit" class="bdelete"> Delete  </button>
      
      </form>


      </div>  



     
      

</div>





@endforeach




  


</div>


=======
<h1>Hello!</h1>
>>>>>>> d3d3802003b9d787d77e7a14df3c1475241bb30f






</body>
        








            

</html>



