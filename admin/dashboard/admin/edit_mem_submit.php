<?php
require '../../include/db_conn.php';
page_protect();
    
    
   $uid=$_POST['uid'];
   $uname=$_POST['uname'];
   $gender=$_POST['gender'];
   $mobile=$_POST['phone'];
   $email=$_POST['email'];
   $dob=$_POST['dob'];
   $jdate=$_POST['jdate'];
   $stname=$_POST['stname'];
   $calorie=$_POST['calorie'];
   $height=$_POST['height'];
   $weight=$_POST['weight'];
   $fat=$_POST['fat'];
   $remarks=$_POST['remarks'];
    
    $query1="UPDATE users SET username='".$uname."',gender='".$gender."',mobile='".$mobile."',email='".$email."',dob='".$dob."',joining_date='".$jdate."' WHERE userid='".$uid."'";

   if(mysqli_query($con,$query1)){
     $query2="UPDATE address SET streetName='".$stname."' WHERE id='".$uid."'";
     if(mysqli_query($con,$query2)){
        $query3="update health_status set calorie='".$calorie."',height='".$height."',weight='".$weight."',fat='".$fat."',remarks='".$remarks."' where uid='".$uid."'";
        if(mysqli_query($con,$query3)){
            echo "<html><head><script>alert('Member Update Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
        }else{
             echo "<html><head><script>alert('ERROR! Update Operation Unsuccessful');</script></head></html>";
             echo "error".mysqli_error($con);
        }
     }else{
        echo "<html><head><script>alert('ERROR! Update Operation Unsuccessful');</script></head></html>";
         echo "error".mysqli_error($con);
     }
   }else{
    echo "<html><head><script>alert('ERROR! Update Operation Unsuccessful');</script></head></html>";
    echo "error".mysqli_error($con);
   }
    

?>
