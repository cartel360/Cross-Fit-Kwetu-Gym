<?php
$host     = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name  = "CrossFit"; // Database name 

// Connect to server and select databse.
$con = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


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
