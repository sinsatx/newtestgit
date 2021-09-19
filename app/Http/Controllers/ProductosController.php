<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;


use App\Models\Producto;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;
use Barryvdh\DomPDF\Facade as PDF;


class ProductosController extends Controller
{
    
    public function index()
    {
        return view('productos');
    }

    public function imprimir()
    {
        $productos = DB::table('productos') // la tabla que voy a usar
        ->select('productos.*') // .* significa para todos los campos
                      //ascendente
        ->OrderBy('stock','ASC')
        ->take(10)

        ->get();

$fecha= date('Y-m-d');
$data = compact('productos','fecha');

        $pdf = PDF::loadView('pdf.reporteproductos', $data); 

        // para que se descarge directamente
        return $pdf->download('reporte_'.time().'.pdf');

        // para que salga una ventana
        return $pdf->stream();
    }


    public function All(Request $request)
    {
    

        $productos = DB::table('productos') // la tabla que voy a usar
        ->select('productos.*') // .* significa para todos los campos
                      //ascendente
        ->OrderBy('stock','ASC')
        ->take(10)

        ->get();

                  //lo traemos a formato json para que javascript lo pueda leer
        return response(json_encode($productos),200)->header('Content-type','text/plain');

    }
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

'nombre' => 'required|min:3|max:20',
            // tipo imagen // permitidos           //max peso
'img' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
'stock' => 'required', 
          //requerido / minimo 3 charact //requerido con el password2 / y que sea igual al password2
          'codigo' => 'required',      

        ]);

if ($validator ->fails()){


// dd('Rellena los campos');  // es lo mismo que decir echo

                return back()

                ->withInput()
                ->with('ErrorInsert','rellene todos los campos')
            
                ->withErrors($validator);


} else {

    $imagen = $request -> file('img');
               // para que diga por ejemplo : 02_12_2020.jpg
    $nombre = time().'.'.$imagen->getClientOriginalExtension();

    $destino = public_path('img/productos');

    $request->img->move($destino, $nombre);
 

    $red = Image::make($destino.'/'.$nombre);
    $red->resize(230, null, function ($constraint) {
        $constraint->aspectRatio();
});

$red->save($destino.'/thumbs/'.$nombre);
$marca_agua= Image::make($destino.'/'.$nombre);
$logo= Image::make(public_path('img/logo.png'));
$logo->fit(100);

$marca_agua->insert($logo, 'bottom-right',7,7);

$marca_agua->save();

$producto = Producto::create([

'nombre'=>$request->nombre,
'img'=>$nombre,
'stock'=>$request->stock,
'codigo'=>$request->codigo,

]);

 return back()->with('Listo','Se ha insertado Correctamente');

}



        // dd($request); esto interrumpe la coneccion eentonces lo saco

 // si solo quiero el atributo nombre / dd($request->$nombre);
    }

}
