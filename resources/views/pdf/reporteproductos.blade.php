<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<style>
.titulo{
text-align: center;
font:2rem;
color:blue;


}

.thead1{

width: 100%;

}

</style>
 
</head>
<body>
    <div>

<h1 class="titulo" >Listado de Productos</h1>

<table class="thead1">
        <thead > 
                <th> 
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Stock</td>
                </th>
        </thead>
<tbody> 
@foreach($productos as $p)




<tr>

        <td> {{$p->id}} </td>
        <td> {{$p->nombre}} </td>
        <td> {{$p->stock}} </td>



</tr>



@endforeach
</tbody>


</table>

  
</body>
</html>