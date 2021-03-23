<?php
// $a = $_SERVER['HTTP_REFERER'];

// if (strpos($a, '/e-has/') !== false) {

// } else {
//     header("Location: ./");
// }

?>
<?php
// include 'index.php';
require 'include/db_conn.php';



$userid = rtrim($_POST['userid']);
$pass         = rtrim($_POST['currentPassword']);
$password = rtrim($_POST['newPassword']);
$passconfirm = rtrim($_POST['confirmPassword']);
if ($password == $passconfirm) {
    if (isset($userid) && isset($pass) && isset($password)) {

        $sql    = "SELECT * FROM users WHERE userid=$userid  ";
        $result = mysqli_query($con, $sql);
        $count  = mysqli_num_rows($result);
        if ($count != 0) {
            mysqli_query($con, "UPDATE users SET password='$password' WHERE userid=$userid ");
            echo "<html><head><script>alert('Profile Updated ,Login Again ');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=../index.php'>" . mysqli_error($con);
            echo mysqli_error($con);
        } else {
            echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
            echo "Error" . mysqli_error($con);
        }
    } else {
        echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
        echo "error" . mysqli_error($con);
    }
} else {
    echo "<html><head><script>alert('Confirm Password Mismatch');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>
<center>
    <img src="loading.gif">
</center>