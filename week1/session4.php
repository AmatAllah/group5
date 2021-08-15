
<?php 

session_start();

 
echo $_SESSION['name'];




  if($_SERVER['REQUEST_METHOD'] == "POST"){

    // code ... 
     /// name , size,tmp_name,type
       if(!empty($_FILES['image']['name'])){

    // code 

      $name = $_FILES['image']['name'];
      $temp = $_FILES['image']['tmp_name'];
      $size = $_FILES['image']['size'];
      $type = $_FILES['image']['type'];



    //   $count = count($nameArray);
    //   $extension = $nameArray[$count-1];
    
      $nameArray =  explode('/',$type);

      $extension =  strtolower($nameArray[1]);
    
      $FinalName = rand().time().'.'.$extension;

      $allowedExt = array('png','jpg','jpeg','pdf'); 

      if(in_array($extension,$allowedExt)){

      // code 

           $folder = "./uploads/";

           $finalPath = $folder.$FinalName;

          if(move_uploaded_file($temp,$finalPath)){

            echo 'File Uploaded';
          }else{

            echo 'error try again';
          }





      }else{

        echo 'Invalid Extension';
      }





       }else{

        echo 'File Required';
       }    



  

  }
    

  include 'header.php';



?>




<div class="container">
  <h2>Upload File</h2>
  <form  method="post"  action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">

  



  <div class="form-group">
    <label for="exampleInputPassword1">Upload Image</label>
    <input type="file"  name="image"  >
  </div>
 

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php 

include 'footer.php';

?>