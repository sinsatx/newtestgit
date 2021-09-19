<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
 // protected $primaryKey = "id";  // como no use id_producto en la tabla es solo id y no es necesario ya esta en la tabla
 protected $table= "productos"; // para decir que la tabla se llama no es necsario ponerla si solo en la tabla se le agrega una s
    protected $fillable = ['nombre','img','stock','codigo'];
}
