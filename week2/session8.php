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

id   name    users 
1     pl1     1,2,3,4,5
2     pl2     
3     SE




users    sub 
1         m 
m         1
============
m     :   m 




std_subjects 
id    user_id    subj_id     grade     created_at
1      2          3          80         2021/8/16

*/







/*

     patient , admins , doctors (name,email,password)    , lab  , pharmacy ,ray  ,x,y,z

     appointments [from , to ]

     reservation 




patient 
id   name     email 



admins 
id   name     email 



doctors 
id   name     email 



lab 
id   name     email 


ray 
id   name     email 


pharmacy  
id   name     email 






usersTypes 
id   name  
1    doctor
2    admin 
3    patient 
4    lab


users 
id  name email   type_id 
1   x     x@x     1
2   y     y@y     4 
3   a     a@a     3 




appointments 
id   from    to    doctor_id
1     3:00   3:30    1            
2     4:00   4:30    2


  doctors   app 
    1        m 
    1        1
================
    1  :    m 



reservations 
id    patient_id    appointment_id     date             status 
1       3            1                  2021/8/18         1
2       3            2 
*/

?>