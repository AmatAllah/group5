<?php 

 require '../helpers/functions.php';
 require '../helpers/dbConnection.php';


   # Fetch Roles 
   $sql = "select * from adminstype";
   $op  = mysqli_query($con,$sql);


   $id = Sanitize($_GET['id'],1);
   $sql = "select * from admins where id = $id";
   $adminOP = mysqli_query($con,$sql);
   $adminData = mysqli_fetch_assoc($adminOP);




 # Form Logic ... 
 if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE .... 

    $name  = CleanInputs($_POST['name']);
    $email = CleanInputs($_POST['email']);
    $role_id = Sanitize($_POST['role_id'],1); 
   



     $erros = [];
     # Validate Input ... 
    if(!validate($name,1))
    {
      $erros['name'] = "Name Field Required";
    }

    
    if(!validate($email,1)){
        $erros['email'] = "Email Field Required";
    }elseif(!validate($email,3)){

        $erros['email'] = "Inavalid Email";
    }

   
    if(!validate($role_id,2)){
        $errors['Type']  = "Invalid Role Id";
    }




    if(count($erros) > 0){

        $_SESSION['messages'] = $erros;
    }else{

     # db Logic 
       // sha1 , md5      // ha 
     $sql = "update admins  set name='$name',email = '$email' , role_id = $role_id   where id =  $id";

     $op = mysqli_query($con,$sql);

     if($op){
         header("location: index.php");
     }else{
         $_SESSION['messages'] = ['error try again'];
     }


    }

 }




   




   require '../header.php';
   require "../nav.php";

?>

<div id="layoutSidenav">

    <?php 
   require '../sidNav.php';
?>



    <div id="layoutSidenav_content">


        <main>


            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">


                    <?php 
                        # Dispaly error messages .... 

                        if(isset($_SESSION['messages'])){
                            foreach ($_SESSION['messages'] as  $value) {
                                # code...
                                echo '<li class="breadcrumb-item active">'.$value.'</li>';
                            }

                            unset($_SESSION['messages']);
                        }else{
                        echo '<li class="breadcrumb-item active">Dashboard</li>';

                        }
                   
                   ?>


                </ol>



                <div class="container">

                    <form method="post" action="edit.php?id=<?php echo $adminData['id'];?>"  enctype="multipart/form-data">



                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value="<?php echo $adminData['name'];?>" class="form-control" id="exampleInputName"
                                aria-describedby="" placeholder="Enter Name">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" value="<?php echo $adminData['email'];?>" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div> -->




                        <div class="form-group">
                            <label for="exampleInputPassword1">Role</label>
                            <select name="role_id" class="form-control">
                                <?php 
   
                                   while($rows = mysqli_fetch_assoc($op)){
                                ?>

                                <option value="<?php echo $rows['id'];?>"  <?php  if($adminData['role_id'] == $rows['id']){  echo 'selected'; } ?>  > <?php echo $rows['title'];?> </option>

                                <?php } ?>

                            </select>
                        </div>




                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>



            </div>
        </main>




        <?php 

    require '../footer.php';
?>