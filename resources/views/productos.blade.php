@extends ('layouts.main')

@section('contenido')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Productos </h1>

                        
                        
                        <div class="col-4"> 
                          
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalAgregar">
                            <i class="fas fa-user fa-sm text-white-50"></i> Agregar Producto 
                        </a>


                        <a href="/admin/productos/imprimir" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-print fa-sm text-white-50"></i> Imprimir
                        </a>

                        </div>

                    </div>

<div class="row">
@if($message = Session::get('Listo'))  
  <!-- el if se usa con arroba -->

<div class="col-12 alert alert-success alert-dismissable fade show" role="alert">

<h5> Errores: </h5>

<span>  {{ $message }}     </span>

</div>

@endif
<div class="row col-6">

<canvas id="myChart" width="400" height="400"> </canvas>

</div>

<table class="table col-12 table-responsive">

  <thead>
      <tr> 
        <td> Id </td>
        <td> Nombre </td>
        <td> Stock </td>
        <td> Codigo </td>
        <td> &nbsp; </td> 
      <!-- Un espacio -->
           
      </tr>
  </thead>

  <tbody id="tbody">

  
  </tbody>


</table>



</div>

<!-- Modal Agregar -->
<div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/productos" method="post" enctype="multipart/form-data">

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
                        
<input type="file" class="form-control" name="img" placeholder="Imagen"  >


                    </div>

                    <div class="form-group">
                        
                        <input type="number" class="form-control" name="stock" placeholder="Stock">
                        
                        
                                            </div>

                                            <div class="form-group">
                        
                        <input type="text" class="form-control"  name="codigo" placeholder="Codigo de barras">
                        
                        
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


<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"> 


</script>


<script>

  var productos = [];

  var valores = [];

  var idEliminar=0;

$(document).ready(function(){

$.ajax({

  url: '/admin/productos/all',
  method:'POST',
  
  //para traer el formulario
  data:{

id:1,
   // para buscar y traer el token //para que me traiga el valor
_token:$('input[name="_token"]').val()


  }


}).done(function(res){

var arreglo = JSON.parse(res);

console.log(arreglo);

//un arreglo

for(var x=0;x<arreglo.length;x++){


  var todo='<tr><td>'+arreglo[x].id+'</td>';
  todo+= '<td>'+arreglo[x].nombre+'</td>';
  todo+= '<td>'+arreglo[x].stock+'</td>';
  todo+= '<td>'+arreglo[x].codigo+'</td>';
  todo+= '<td></td></tr>';
  $('tbody').append(todo);
  

productos.push(arreglo[x].nombre);
valores.push(arreglo[x].stock);

}

//para cuando se haya acabado el ciclo mando a llamar a generargrafica
generarGrafica();

});


})



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

                                  //si ncesito 2 graficas otro otro canvas con otro id y le cambio este id

//creo una funcion para que se ejecute luego de hacer la peticion ajax




function generarGrafica(){  

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Productos del inventario',
            data: valores,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


}

</script>

@endsection
