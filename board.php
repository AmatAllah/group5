
<!DOCTYPE html>
<html lang="en">
<head>
  <title>board</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

   <table  width="300px">
   

     <?php 
          for($row=1;$row<=8;$row++){

           echo '<tr>';

         for($col=1;$col <=8;$col++){

            $equation = $row + $col;

            if(($equation%2) == 0){
                // 
                echo '<td width="30px"  height="40px"  bgcolor="#FFFFFF"></td>';
            }else{
                // 
                echo '<td width="30px" height="40px" bgcolor="#000000"></td>';
            }


         }



           echo '</tr>';



          }
     ?>

</table>    
  
</body>
</html>


