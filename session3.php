<?php 

// task  ... 



// function calculatebill($units){
      
//     $fCost = 3.5;
//     $sCost = 4;
//     $TCost = 6.5;


//     if($units <= 50){

//         $bill = $units*$fCost;
//     }elseif($units > 50 && $units <= 150){

//           $FCostBill = 50 * $fCost;

//           $SCostBill = ($units-50)*4;

//           $bill = $FCostBill+$SCostBill;
//     }else{


//         $FCostBill = 50 * $fCost;

//         $SCostBill = 100*4;

//         $TCostBill = ($units-150)*$TCost;

//         $bill = $FCostBill + $SCostBill + $TCostBill;


//     }

//    return   number_format((float)$bill,2,'.','');
   
// }

// echo calculatebill(160);     





// $color = ["red","green","blue"];

//    //  sort($color);

//    rsort($color);
//     print_r($color);


 //$students = ["a" => 3.5 , "c" => 2 , "b" => 5];

//asort($students); // value
// arsort($students); // value

//ksort($students);  // key

// krsort($students);// key
// print_r($students);





//   $num = 4;

//   $result = 5;


//   function message(){

//      echo  $GLOBALS['num'];     // global $num

//   }


//   message();



// $_SERVER 

 // echo  $_SERVER['PHP_SELF'];
    
 //   echo   $_SERVER['SERVER_NAME'];

 // echo $_SERVER['SCRIPT_NAME'];

//  echo $_SERVER['REMOTE_ADDR'];

 // echo  $_SERVER['REQUEST_METHOD'];


//  $_GET  
//  $_POST
//  $_REQUEST


// logic 



 // XSS CROSS SITE SCRIPTING ATTACKS


function CleanInputs($input){

    // return stripslashes(htmlspecialchars(trim($input)));
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}




   if($_SERVER['REQUEST_METHOD'] == "POST"){

      $errors = [];

      $name  = CleanInputs($_POST['name']);
      $email = CleanInputs($_POST['email']);
      $password = $_POST['password'] ;


      
      if(empty($name)){

        $errors['Name'] = " Field Required";

      }


      if(empty($email)){

        $errors['Email'] = " Field Required";

      }


      if(empty($password)){

        $errors['Password'] = " Field Required";

      }




        if(count($errors) > 0){

            foreach($errors as $key => $error){

                echo '* '.$key.' : '.$error.'<br>';
            }
        }else{

            echo $name;
        }


   }



    // $age = 'test20';
   /// ECHO   filter_var($age,FILTER_SANITIZE_NUMBER_INT);

     //var_dump(filter_var($age,FILTER_VALIDATE_INT));   // filter_SANITIZE_number_int 






    //  $email ="test@.admin.com";

    //  // echo  filter_var($email,FILTER_SANITIZE_EMAIL);

    //   var_dump(filter_var($email,FILTER_VALIDATE_EMAIL));



    //      $url = "http://localhost";
  
    //    echo filter_var($url,FILTER_SANITIZE_URL);
    //    // var_dump(filter_var($url,FILTER_VALIDATE_URL));



$ip = "127.0.0.1";

    var_dump(filter_var($ip,FILTER_VALIDATE_IP));

?>







<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form  method="post"  action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password"  name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 

 

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>




