<?php 

require '../dbConnection.php';

function CleanInputs($input){

// return stripslashes(htmlspecialchars(trim($input)));
$input = trim($input);
$input = stripslashes($input);
$input = htmlspecialchars($input);

return $input;
}




if($_SERVER['REQUEST_METHOD'] == "POST"){

  $errors = [];

  $key  = CleanInputs($_POST['key']);




  if(empty($key)){

    $errors['key'] = " Field Required";

  }






    if(count($errors) > 0){

        foreach($errors as $key => $error){

            echo '* '.$key.' : '.$error.'<br>';
        }
     }else{
 
     // code ... 

     $sql = "select * from users where name like '%$key%' or email like '%$key%' ";
      
     $op = mysqli_query($con,$sql);


     if(mysqli_num_rows($op) > 0 ){

        // show result 

       while($row = mysqli_fetch_assoc($op)){

        echo '* '.$row['name'].' || '.$row['email'].'<br>'; 
       }


     }else{

        echo 'No matched data ';        
     }

    }

    mysqli_close($con);


}

?>







<!DOCTYPE html>
<html lang="en">
<head>
<title>Search</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h2>Search</h2>
<form  method="post"  action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">



<div class="form-group">
<label for="exampleInputEmail1">key Search </label>
<input type="text"  name="key"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Search Here">
</div>


<button type="submit" class="btn btn-primary">Go</button>
</form>
</div>

</body>
</html>















