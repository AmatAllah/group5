<?php 




function login(){

    echo 'login';
}


function register(){
    echo 'register';
}

function edit(){
    echo 'edit profile';
}




if($_SERVER['REQUEST_METHOD'] == "POST"){

   $flag = $_POST['logic'];



   switch ($flag) {
       case 1:
           # code...

           register();
           break;


        case 2: 
            
            edit();
            break;
       
       default:
           # code...

           echo 'error try again ';
           break;
   }





}




?>