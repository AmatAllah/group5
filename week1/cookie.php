<?php 

$user = [];

 setcookie("name",$user,time()-(60*60),"/");
//unset($_COOKIE['name']);

if(isset($_COOKIE['name'])){
   echo $_COOKIE['name'];
}else{

echo 'no Cookie';

}





?>