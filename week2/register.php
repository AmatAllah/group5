<?php 

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

  $name  = CleanInputs($_POST['name']);
  $email = CleanInputs($_POST['email']);
  $password = $_POST['password'] ;
  $dep_id   =  filter_var($_POST['dep_id'],FILTER_SANITIZE_NUMBER_INT);




  if(empty($name)){

    $errors['Name'] = " Field Required";

  }elseif(!preg_match("/^[a-zA-Z\s*']+$/",$name)){

    $errors['Name'] = "Invalid String";
  }



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


  if(!filter_var($dep_id,FILTER_VALIDATE_INT)){

    $errors['dep_id'] = "Invalid Department id ";

  }




    if(count($errors) > 0){

        foreach($errors as $key => $error){

            echo '* '.$key.' : '.$error.'<br>';
        }
     }else{

   $password =   sha1($password); // md5
      

   // code 
   $sql = "insert into users (name,email,password,dep_id) values ('$name','$email','$password',$dep_id)";

    $op =  mysqli_query($con,$sql);

    if($op){

        echo 'data Inserted';
    }else{
        echo 'Error Try Again';

      // echo  mysqli_error($con);


    }


    }

   


}




  # Fetch departments 

  $sql = "select * from departments";
  $op  = mysqli_query($con,$sql); 

  mysqli_close($con);

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




<div class="form-group">
<label for="exampleInputPassword1">Department</label>
<select name="dep_id" class="form-control" >
  <?php 
   
      while($rows = mysqli_fetch_assoc($op)){
  ?>

  <option value="<?php echo $rows['id'];?>">  <?php echo $rows['title'];?> </option>

  <?php } ?>

</select>  
</div>




<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>















