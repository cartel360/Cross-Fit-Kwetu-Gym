<?php
require '../../include/db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cross Fit Kwetu Gym | New User</title>
    <link rel="stylesheet" href="../../css/style.css" id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" type="text/css" rel="stylesheet">
    <style>
        .page-container .sidebar-menu #main-menu li#regis>a {
            background-color: #2b303a;
            color: #ffffff;
        }

        #boxx {
            width: 220px;
        }
    </style>

</head>

<body class="page-body  page-fade" onload="collapseSidebar()">

    <div class="page-container sidebar-collapsed" id="navbarcollapse">

        <div class="sidebar-menu">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="main.php">
                        <img src="../../images/logo.png" alt="" width="192" height="80" />
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse" onclick="collapseSidebar()">
                    <a href="#" class="sidebar-collapse-icon with-animation">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>



            </header>
            <?php include('nav.php'); ?>
        </div>

        <div class="main-content">

            <div class="row">

                <!-- Profile Info and Notifications -->
                <div class="col-md-6 col-sm-8 clearfix">

                </div>


                <!-- Raw Links -->
                <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                    <ul class="list-inline links-list pull-right">

                        <li>Welcome <?php echo $_SESSION['full_name']; ?>
                        </li>

                        <li>
                            <a href="logout.php">
                                Log Out <i class="entypo-logout right"></i>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>


            <h3>New Registration</h3>

            <hr />

            <?php


            if (isset($_POST['name'])) {
                $memid = $_POST['name'];

               

                $query = "SELECT * FROM users WHERE userid = $memid";
                $result = mysqli_query($con, $query);

                if (mysqli_affected_rows($con) == 1) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $fullname = $row['fullname'];
                        $u_name = $row['username'];
                        $gender = $row['gender'];
                        $mobile = $row['mobile'];
                        $email   = $row['email'];
                        $dob     = $row['dob'];
                        $jdate    = $row['joining_date'];
                        $password = $row['password'];


            ?>

                        <div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
                            <div class="a1-card-8 a1-light-gray" style="width:500px; margin:0 auto;">
                                <div class="a1-container a1-dark-gray a1-center">
                                    <h6>NEW ENTRY</h6>
                                </div>
                                <form id="form1" name="form1" method="post" class="a1-container" action="new_submit.php">
                                    <table width="100%" border="0" align="center">
                                        <tr>
                                            <td height="35">
                                                <table width="100%" border="0" align="center">
                                                    <tr>
                                                        <td height="35">MEMBERSHIP ID:</td>
                                                        <td height="35"><input type="text" id="boxx" name="m_id" value="<?php echo $memid; ?>" readonly required /></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="35">FULL NAME:</td>
                                                        <td height="35"><input name="fullname" id="boxx" required value="<?php echo $fullname; ?>" readonly /></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35">USERNAME:</td>
                                                        <td height="35"><input name="u_name" id="boxx" required value="<?php echo $u_name; ?>" readonly /></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td height="35">GENDER:</td>
                                                        <td height="35"><input type="text" name=" gender" id="boxx" value="<?php echo $gender; ?>" readonly /> </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35">DATE OF BIRTH:</td>
                                                        <td height="35"><input type="date" name="dob" id="boxx" required/ size="30" value="<?php echo $dob; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35">PHONE NO:</td>
                                                        <td height="35"><input type="number" name="mobile" id="boxx" maxlength="10" required/ size="30" value="<?php echo $mobile; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35">EMAIL ID:</td>
                                                        <td height="35"><input type="email" name="email" id="boxx" required/ size="30" value="<?php echo $email; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35">JOINING DATE:</td>
                                                        <td height="35"><input type="date" name="jdate" id="boxx" required size="30"  min="<?php echo date("Y-m-d"); ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35">PLAN:</td>
                                                        <td height="35"><select name="plan" id="boxx" required onchange="myplandetail(this.value)">
                                                                <option value="">--Please Select--</option>
                                                                <?php
                                                                $query = "select * from plan where active='yes'";
                                                                $result = mysqli_query($con, $query);
                                                                if (mysqli_affected_rows($con) != 0) {
                                                                    while ($row = mysqli_fetch_row($result)) {
                                                                        echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                                                                    }
                                                                }

                                                                ?>

                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                       
                                                        <td><input type="password" name="password" value="<?php echo $password; ?>" hidden readonly</td>
                                                    </tr>

                                                    <tbody id="plandetls">

                                                    </tbody>

                                                    <tr>
                                                    <tr>
                                                        <td height="35">&nbsp;</td>
                                                        <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Register">
                                                            <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Reset">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>

            <?php
                    }
                }
            }
            ?>

            <script>
                function myplandetail(str) {

                    if (str == "") {
                        document.getElementById("plandetls").innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("plandetls").innerHTML = this.responseText;

                            }
                        };

                        xmlhttp.open("GET", "plandetail.php?q=" + str, true);
                        xmlhttp.send();
                    }

                }
            </script>



        </div>

</body>

</html>