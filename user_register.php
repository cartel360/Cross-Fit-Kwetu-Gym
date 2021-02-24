<?php
require '../include/db_conn.php';
page_protect();

 $memID=$_POST['m_id'];
 $uname=$_POST['username'];
 $fullname=$_POST['fullname'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $dob=$_POST['dob'];
 $gender=$_POST['gender'];
 $password=$_POST['password'];


//inserting into users table
$query="INSERT INTO users (username, fullname, gender,mobile,email,dob,userid, password) VALUES('$uname','$fullname','$gender','$phone','$email','$dob','$memID','$password')";

if(mysqli_query($con,$query)==1){
     
    date_default_timezone_set("Africa/Nairobi"); 
    echo "
    <head>
    <script>
    alert('Member Added Successfully');
    window.location.href='index.php';
    </script></head></html>";

   
}
else{
    echo "<head><script>alert('Member Added Failed');</script></head></html>";
    echo "error: ".mysqli_error($con);
}
            

?>
