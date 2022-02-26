<?php

namespace App\Http\Controllers;


use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class ExampleController extends Controller
{
    

  


    public function index()
    {

        $tasks = Tasks::all();
     
    
        
     return view('example', compact('tasks'));
        

        
        


    }






































public function store(Request $request)
{



    $validator = Validator::make($request->all(),[

        'name' => 'required',
                   
        'description' => 'required', 

        'date' => 'required', 
                      
        
                ]);
        
        if ($validator ->fails()){
        
        
     
        
                        return back()
        
                        ->withInput()
                        ->with('Message','Fill in all the fields')
                    
                        ->withErrors($validator);
        
        
        } else {
        
            

        
        $task = Tasks::create([
        
            
        'name'=>$request->name,
       
        'description'=>$request->description,

        'date'=>$request->date,
        
       
        
        ]);
        
         return back()->with('Message','Your Task has been uploaded');
        
        }
        
    
   }



































            

  

            public function delete(Request $request)
            {
               
                $tasks = Tasks::findOrFail($request->id);

                
                
                $tasks->delete();   
                          
                return back()->with('Message','Your Task has been deleted');
                
                
        
        
        
        
        
                
            }

































            



            public function update(Request $request)
            {
                $task = Tasks::findOrFail($request->id);
                
            
                $validator = Validator::make($request->all(),[
            
                    'name' => 'required',
                    'description' => 'required',
            
                    'date' => 'required',
                   
                  
                         
                    
                            ]);
            
            
                            
            
                        if ($validator ->fails()){
                    
                    
                           
                            
                                            return back()
                            
                                            ->withInput()
                                            ->with('Message','Fill in all the fields')
                                        
                                            ->withErrors($validator);
                            
                            
                            } else {  
                
            
            
            $task->name = $request->name;
            $task->description = $request->description;
            $task->date = $request->date;
            
            
            
            
            
            
            
            
            
                       $task->update();   
                      
                       return back()->with('Message','Your Task has been edited');
            
            
            
                    }
            
            
            
            
            }


            



        }






