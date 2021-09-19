<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    
public function __construct()
{       
       //el middlewaree son los que estan entree la peticion y el controlleer
    $this->middleware('auth');
}



    public function index()
    {
       
        $usuarios = DB::table('users') // la tabla que voy a usar
                        ->select('users.*') // .* significa para todos los campos

                        ->OrderBy('id','DESC')

                        ->get();

                        if(Auth::user()->nivel !='admin') {return redirect('/admin'); }
                        
       return view('usuarios')->with('usuarios',$usuarios);
       
       
    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

'nombre' => 'required|min:3|max:20',
'email' => 'required|min:3|email',
'pass1' => 'required|min:3|required_with:pass2|same:pass2', 
          //requerido / minimo 3 charact //requerido con el password2 / y que sea igual al password2
          'pass2' => 'required|min:3|',      

        ]);

if ($validator ->fails()){


// dd('Rellena los campos');  // es lo mismo que decir echo

                return back()

                ->withInput()
                ->with('ErrorInsert','rellene todos los campos')
            
                ->withErrors($validator);


} else {

$usuario = User::create([

//la flecha  ( -> ) sola se usa cuando es un atributo NO estas dentro de los corchetes // y 

 // el ( => ) cuando es un array SI estas dentro de los corchetes

'name'=>$request->nombre,
'img'=>'default.jpg',
'nivel'=>'usuario',
'email'=>$request->email,
'password'=>Hash::make($request->pass1),



]);

return back()->with('Listo','Se ha registrado Correctamente');

}



        // dd($request); esto interrumpe la coneccion eentonces lo saco

 // si solo quiero el atributo nombre / dd($request->$nombre);
    }

public function destroy($id)
{ 
    // con esto elimino todo de ese user
    $user = User::find($id);
    
    if($user->img != 'default.jpg'){

    if(file( public_path('users/'.$user->img) )){

        unlink( public_path('users/'.$user->img));

    }
            }
            $user->delete();
            return back()->with('Listo','El Registro se ha Eliminado Correctamente');
    

}



public function editarUsuario(Request $request)
{

                               //el name del id del edit
    $user = User::find($request->id);
     
    $validator = Validator::make($request->all(),[

        'nombre' => 'required|min:3|max:20',
        'email' => 'required|min:3|email',
             
        
                ]);
        
        if ($validator ->fails()){
        
        
        // dd('Rellena los campos');  // es lo mismo que decir echo
        
                        return back()
        
                        ->withInput()
                        ->with('ErrorInsert','rellene todos los campos')
                    
                        ->withErrors($validator);
        
        
        } else {

                                   //asi se llama en el input el name
            $user->name = $request->nombre;   
            $user->email = $request->email;

//para la contraseña

$validator2 = Validator::make($request->all(),[


    'pass1' => 'required|min:3|required_with:pass2|same:pass2', 
              //requerido / minimo 3 charact //requerido con el password2 / y que sea igual al password2
              'pass2' => 'required|min:3|',      
    
            ]);

            //si No Falla se va actualizar el password(osea sino se pone bien se actualiza lo de arriba y esto lo ignora)
            if(!$validator2->fails()){

$user->password = Hash::make($request->pass1);

            }

            
            //para la contraseña


            $user->save();   
            return back()->with('Listo','El Registro se ha Editado');


} //llave else validar

} //llave funcionditar

} 
