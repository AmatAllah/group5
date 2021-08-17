<?php 


/*
users

id   name password email    
1     x    xx222    x@x     




national ids 
  
id     nationalId      user_id 
1       88988xx         1
2       45654xx



  users        nationalids  
   1             1
   1             1
  ==========================               
     1  : 1 


     address 
id  stName   gov    country   flat_num
1    12st    alex    eg       190

*/




/*
users

id   name password email    dep_id
1     x    xx222    x@x      1
2     y    yymerkm  y@y      3




departments 
id name 
1  it 
2  cs 
3  is 



users       deps 

1            1 
m            1
===============
m     :   1

*/




/*

users(students)

id   name password email    dep_id
1     x    xx222    x@x      1
2     y    yymerkm  y@y      3




subs 

id   name 
1     pl1 
2     pl2 
3     SE




users    sub 
1         m 
m         1
============
m     :   m 




std_subjects 
id    user_id    subj_id
1      2          3     

*/



?>