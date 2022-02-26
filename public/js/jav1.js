   


$(document).ready(function(){

    $('.menu-icon').click(function(){
    
    $('.nav-bar').toggleClass('visible');
    
    });
    
    });
  
  
  
    // function phpdirect(){
  
  
  
    //   document.getElementById('logse1').style.display = 'none'; //muestro lo que quiero
    //   document.getElementById('phpcss').style.display = 'block'; // y oculto esto
  
  
  
  
  
    // }
  
  
    $(document).ready(function () {
  
      $(".course-col").click(function () {                           // un solo click
        $(".course-col").css("color","black");
        $(".course-col").css("background-color","rgb(241, 127, 127)");
        $(".course-col").css("font-family","Verdana");
        $(".course-col").css("font-size","110%");
  
        
  
      });
      $(".course-col").dblclick(function () {                        //doble click
   
  
        $(".course-col").css("color","unset");
        $(".course-col").css("background-color","#388b00fa");
        $(".course-col").css("font-family","Arial");
        $(".course-col").css("font-size","unset");
        $(".course-col").css("color","white");
      });
      });
  
  
  
  
      // $(document).ready(function () {
      //   $("div").click(function () {
      //   posx= $(this).css("left");                    // hace que se mueva hacia la derecha
      //   if (posx == "") posx = "20";
      //   num = parseInt(posx)
      //   num = num + 10;
      //   $(this).css("left",num);
       
      //   if ($(this).attr('id') =="zonaX")
      //   mueve("#zonaX",num)
      //   });
       
       
      //   function mueve (objeto, pos) {
      //   pos = pos + 30;
      //   $(objeto).css("left",pos)
      //   }
      //  }); 
         
  
  
  
       $(document).ready(function () {
        var obj;
        obj = $(".facilities-col");
  
       
        
        obj.hover(entraMouse, saleMouse);
        });
        function entraMouse() {
        $(this).css("background-color", "rgb(255, 58, 58)");    
        $(this).css("transition", "1s")            //funcion para al tocar que salga
        $(this).css("font-size", "130%")  
     
        
        
        }
        function saleMouse() {                                   //funcion para al dejar de tocar que salga 
        $(this).css("background-color", "transparent");                    // Si lo pongo #fff (blanco) quedaria como un subrayado pero si lo dejo asi con otro color 
                               // como red al tocar sale amarillo y al dejar de tocar lo deja red
                               $(this).css("font-size", "unset") ;
                               $($p).css("color","white");
                             
        } 
  
  
        
        // $(document).ready(function () {
        //   $(".facilities-col").click(function(){
        //   $("#phptexx1").css("color","#00ff00");                // Color
        //   });
         
       
        //  }); 



        // --------------------------------------------------------------------------------


        



