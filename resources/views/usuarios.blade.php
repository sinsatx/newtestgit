@extends ('layouts.main')

@section('contenido')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Usuarios </h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalAgregar">
                            <i class="fas fa-user fa-sm text-white-50"></i> Agregar Usuario 
                        </a>
                    </div>

<div class="row">
@if($message = Session::get('Listo'))  
  <!-- el if se usa con arroba -->

<div class="col-12 alert alert-success alert-dismissable fade show" role="alert">

<h5> Errores: </h5>

<span>  {{ $message }}     </span>

</div>

@endif


<table class="table col-12 table-responsive">

  <thead>
      <tr> 
        <td> Id </td>
        <td> Nombre </td>
        <td> Email </td>
        <td> Nivel </td>
        <td> &nbsp; </td> 
      <!-- Un espacio -->
           
      </tr>
  </thead>

  <tbody>
  @foreach($usuarios as $usuario)
  <tr>
        <!-- la variable que use en usercontroller es $usuarios y / as $usuario seria el alias -->

  
        <td> {{ $usuario->id }} </td>
        <td> {{ $usuario->name }} </td>
        <td> {{ $usuario->email }} </td>
        <td> {{ $usuario->nivel }} </td>
  <td>    <button class="btn btn-round btnEliminar" data-toggle="modal" data-target="#ModalEliminar"> <i class="fa fa-trash" > </i>     </button>   
  
  <button class="btn btn-round btnEditar" 
  data-id="{{ $usuario->id }}" 
  data-name="{{ $usuario->name }}" 
  data-email="{{ $usuario->email }}" 
  data-toggle="modal" data-target="#ModalEditar"> 
  <i class="fa fa-edit" > </i>     </button>    
      
<form action="{{ url('/admin/usuarios', ['id'=>$usuario->id]) }}" method="post" id="formEli_{{ $usuario->id }}">
                                                            <!-- como se repite el formulario tieene que tener diferentes id -->

@csrf



<input type="hidden" name="id" value="{{ $usuario->id }}">
<input type="hidden" name="_method" value="delete">

</form> 

      </td> 


  </tr>
  @endforeach
  
  </tbody>


</table>





</div>

<!-- Modal Agregar -->
<div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/usuarios" method="post">

@csrf

                <div class="modal-body">
 
                @if($message = Session::get('ErrorInsert')) 
  <!-- el if se usa con arroba -->

<div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">

<h5> Registro: </h5>

<ul>
@foreach($errors->all() as $error)
                       <!-- traigo los errores -->
                                 
        <li> {{ $error }} </li>   


@endforeach

</ul>

</div>

@endif










                


                
                    <div class="form-group">

<input type="text" class="form-control" name="nombre" placeholder="Nombre"  value="{{ old('nombre') }}" > 


                    </div>

                    <div class="form-group">
                        
<input type="email" class="form-control" name="email" placeholder="Email"  value="{{ old('email') }}" >


                    </div>

                    <div class="form-group">
                        
                        <input type="password" class="form-control" name="pass1" placeholder="Password">
                        
                        
                                            </div>

                                            <div class="form-group">
                        
                        <input type="password" class="form-control"  name="pass2" placeholder="Confirmar Password">
                        
                        
                                            </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
      </form>

    </div>
  </div>
</div>


<!-- Modal Eliminar -->
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

                <div class="modal-body">
 
                <h5> Desea eliminar el Usuario? </h5>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>
  

    </div>
  </div>
</div>


<!-- Modal Editar -->
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/usuarios/edit" method="post">

@csrf

                <div class="modal-body">
 
                @if($message = Session::get('ErrorInsert')) 
  <!-- el if se usa con arroba -->

<div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">

<h5> Registro: </h5>

<ul>
@foreach($errors->all() as $error)
                       <!-- traigo los errores -->
                                 
        <li> {{ $error }} </li>   


@endforeach

</ul>

</div>

@endif










                

<input type="hidden" name="id" id="idEdit">
                
                    <div class="form-group">

<input type="text" class="form-control" name="nombre" placeholder="Nombre"  value="{{ old('nombre') }}" id="nameEdit" > 


                    </div>

                    <div class="form-group">
                        
<input type="email" class="form-control" name="email" placeholder="Email"  value="{{ old('email') }}" id="emailEdit" >


                    </div>

                    <div class="form-group">
                        
                        <input type="password" class="form-control" name="pass1" placeholder="Password">
                        
                        
                                            </div>

                                            <div class="form-group">
                        
                        <input type="password" class="form-control"  name="pass2" placeholder="Confirmar Password">
                        
                        
                                            </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
      </form>

    </div>
  </div>
</div>


@endsection


@section('scripts')

@if($message = Session::get('ErrorInsert'))

    

       

<script> 

$(document).ready(function(){
        

  $("#ModalAgregar").modal('show');   //este code es del lado del servidor si hay un error se ejecuta esto

    });







</script>


@endif


<script>

  var idEliminar=0;

$(".btnEliminar").click(function(){

idEliminar = $(this).data('id');


});

$(".btnModalEliminar").click(function(){

$("#formEli_"+idEliminar).submit();


});

$(".btnEditar").click(function(){

$("#idEdit").val($(this).data('id'));
$("#nameEdit").val($(this).data('name')); // el name le puse al atributo / data-name
$("#emailEdit").val($(this).data('email'));


});

</script>

@endsection
