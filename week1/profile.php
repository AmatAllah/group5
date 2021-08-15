<?php 

  session_start();

echo "name : ".$_SESSION['userData'][0].'<br>';

echo "email : ".$_SESSION['userData'][1].'<br>';


?>