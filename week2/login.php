<?php 

session_start();
require 'dbConnection.php';

function CleanInputs($input){

// return stripslashes(htmlspecialchars(trim($input)));
$input = trim($input);
$input = stripslashes($input);
$input = htmlspecialchars($input);

return $input;
}




if($_SERVER['REQUEST_METHOD'] == "POST"){

  $errors = [];

  $email = CleanInputs($_POST['email']);
  $password = $_POST['password'] ;



  if(empty($email)){

    $errors['Email'] = " Field Required";

  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $errors['Email'] = "Invalid Email";
  }


  if(empty($password)){

    $errors['Password'] = " Field Required";

  }elseif(strlen($password < 6)){

    $errors['Password'] = "Invalid Length";
  }



    if(count($errors) > 0){

        foreach($errors as $key => $error){

            echo '* '.$key.' : '.$error.'<br>';
        }
     }else{


      // Login LOgic 


      $password = sha1($password);


     $sql = "select * from users where email = '$email' and password = '$password'";

     $op = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){
         // code 
       $data = mysqli_fetch_assoc($op);

       $_SESSION['user'] = $data;




       header('Location: index.php');
        

     }else{
         echo 'Invalid email || Password ';
     }



    }

    mysqli_close($con);


}

?>







<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h2>Login</h2>
<form  method="post"  action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">




<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>

<div class="form-group">
<label for="exampleInputPassword1"> Password</label>
<input type="password"  name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>


<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

</body>
</html>















