<?php 
require 'checkLogin.php';

require 'dbConnection.php';

$sql = "select users.* , departments.title as dep_title from users inner join departments on users.dep_id = departments.id   ";

// $sql = "select * from users where id = ".$_SESSION['user']['id'];

$op = mysqli_query($con,$sql);


?>





<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Read Users </h1> 
            <br>

         <?php 
         
           echo   'Welcome '.$_SESSION['user']['name'];
         
         ?>

  
     <a href="logout.php">LogOut</a>

            

        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>department</th>
                <th>action</th> 
           
            </tr>

       
<?php   

   while ($data = mysqli_fetch_assoc($op)) {
    
?>

           <tr>
                 <td><?php echo $data['id'];?> </td>
                 <td><?php echo $data['name'];?></td>
                 <td><?php echo $data['email'];?></td>
                 <td><?php echo $data['dep_title'];?></td>


                 <td>
                 <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                </td> 

           </tr> 

<?php } ?>
       
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>












<!--
      Task 

      posts table [title,content,image]

      CURD SYSTEM .... [CREATE,READ];
      FORM [TITLE,CONTENT,IMAGE] [CREATE]

      DISPLAY [TITLE,CONTENT,IMAGE ]  // TABLE 



      delete , edit ..... []





    TASK 


    users Table (name,email,password)

    read users & change password .. .





  admins (name , email , password) - types 

  articales(title , content , image ,addedBy)- category 





types 
id   title  

admins 
id name email password role_id 


art_category

id  title 


art 

id title content image  addBy  cat_id 





   

admins (x,,y,z)   - name ,email,password 
users  (a,b,c)    - name,email,password,phone,N_id,address 
 
types 
id  title 
 1   user  
 2   admin  
 3   a
 4   b
 5   c


system Users  
id  name  password   email          
1    x    123xx      x@x.com                  
2    root   127r     root@r.com       


moreInfo  
id   phone    nationalid   address   user_id 
 1    010xx     45454       alex      1






 -->