<?php 

   require '../helpers/functions.php';
   require '../helpers/dbConnection.php';

  if($_SERVER['REQUEST_METHOD'] == "GET"){

   
    $id = Sanitize($_GET['id'],1);

    if(!validate($id,2)){

        $message = "Invalid Id";
    }else{

   // code ... 

   $sql = "delete from admins where id = $id";

   $op  = mysqli_query($con,$sql);
   
   if($op){
       $message = "Item removed";

   }else{
       $message = "Error Try Again";
   }


    }

      $_SESSION['messages'] = $message;

      header("Location: index.php");


  }else{

    header("Location: index.php");
  }





?>