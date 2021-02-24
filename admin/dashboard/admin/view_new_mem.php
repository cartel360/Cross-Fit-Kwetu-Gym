<?php
require '../../include/db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cross Fit Kwetu Gym | View Member</title>
    <link rel="stylesheet" href="../../css/style.css" id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <!-- <link rel="stylesheet" href="DataTables/buttons.dataTables.min.css"> -->

    <script src="DataTables/jquery-2.2.4.min.js"></script>
    <script src="DataTables/datatables.min.js"> </script>

    <style>
        #button1 {
            width: 126px;
        }

        .page-container .sidebar-menu #main-menu li#hassubopen>a {
            background-color: #2b303a;
            color: #ffffff;
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

            <h3>Member Detail</h3>

            <hr />

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <h2>
                            <th>Sl.No</th>
                            <th>Full Name</th>
                            <th>Member ID</th>
                            <th>Username</th>
                            <th>Contact</th>
                            <th>E-Mail</th>
                            <th>Gender</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </h2>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query  = "SELECT * FROM users  WHERE status = 0";
                    //echo $query;
                    $result = mysqli_query($con, $query);
                    $sno    = 1;

                    if (mysqli_affected_rows($con) != 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $uid   = $row['userid'];
                           

                                    echo "<tr><td>" . $sno . "</td>";

                                    echo "<td>" . $row['fullname'] . "</td>";

                                    echo "<td>" . $row['userid'] . "</td>";

                                    echo "<td>" . $row['username'] . "</td>";

                                    echo "<td>" . $row['mobile'] . "</td>";

                                    echo "<td>" . $row['email'] . "</td>";

                                    echo "<td>" . $row['gender'] . "</td>";

                                    echo "<td>" . $row['joining_date'] . "</td>";

                                    $sno++;

                                    echo "<td><form action='new_enroll.php' method='post'><input type='hidden' name='name' value='" . $uid . "'/><input type='submit' class='a1-btn a1-blue' id='button1' value='Enroll ' class='btn btn-info'/></form></td></tr>";
                                    $msgid = 0;
                                
                            }
                        }
                    
                    ?>
                </tbody>
            </table>

            <script>
                function ConfirmDelete(name) {

                    var r = confirm("Are you sure! You want to Delete this User?");
                    if (r == true) {
                        return true;
                    } else {
                        return false;
                    }
                }

                $(document).ready(function() {
                    $('#example').DataTable({
                        dom: 'Bfrtip'

                    });
                });
            </script>


        </div>

</body>

</html>