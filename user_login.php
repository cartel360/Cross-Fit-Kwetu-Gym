
<?php
include 'include/db_conn.php';

$username = ltrim($_POST['username']);
$username= rtrim($username);

$password = ltrim($_POST['password']);
$password = rtrim($_POST['password']);

$username = stripslashes($username);
$password     = stripslashes($password);



if ($password == "" &&  $username == "") {
    echo "<head><script>alert('Username and Password can be empty');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else if ($password == "") {
    echo "<head><script>alert('Password cannot be empty');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else if ($username == "") {
    echo "<head><script>alert('Username cannot be empty');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else {

    $username= mysqli_real_escape_string($con, $username);
    $password     = mysqli_real_escape_string($con, $password);
    $sql          = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result       = mysqli_query($con, $sql);
    $count        = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        // store session data
        $_SESSION['user_data']  = $username;
        $_SESSION['logged']     = "start";
        // $_SESSION['auth_level'] = $row['level'];
        // $_SESSION['fullname']  = $username;
        $_SESSION['name'] = $row['fullname'];
        $_SESSION['user'] = $row['userid'];
        // $auth_l_x               = $_SESSION['auth_level'];
        // if ($auth_l_x == 5) {
        header("location: UserDashboard/");
    } else {
        include 'index.php';
        echo "<html><head><script>alert('Username OR Password is Invalid');</script></head></html>";
    }
}
?>
