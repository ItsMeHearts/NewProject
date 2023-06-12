<?php
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
} else {

    $_SESSION['username'];
    $_SESSION['id'];
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Gowtham'>



    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <!--  -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

    <script src="bootstrap/js/bootstrap.min.js"></script> -->




    <!-- Latest compiled and minified CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand glyphicon glyphicon-user " href="user_dashboard_CMS.php"><?php echo " Welcome " . ucwords($_SESSION['username']) . "...!!" ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right h4 ">
                    <li><a href="user_dashboard_CMS.php">Dashboard</a></li>
                    <!-- <li><a href="#">Profile</a></li> -->
                    <!-- <li><a href="#">Contact Us</a></li> -->
                    <li><a href="logout_CMS.php"><span><i class="glyphicon glyphicon-off"></i></span> Logout</a></li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Dashboard SideBar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar h4">
                    <li><a href="profile_CMS.php">Profile</a></li>
                    <!-- add_contact_CMS.php -->
                    <li><a href="add_contact_CMS.php">Add New Contact</a></li>
                    <!-- edit_contact_CMS.php -->
                    <li><a href="edit_contact_CMS.php">Edit Contact</a></li>
                    <!-- search_contact_CMS.php -->
                    <li><a href="search_contact_CMS.php">Search Contact</a></li>
                    <!-- export_contact_CMS.php -->
                    <li><a href="export_contact_CMS.php">Export Contact</a></li>
                    <!-- emergency_cms.php -->
                    <li><a href="emergency_cms.php">Emergency Numbers</a></li>
                    <!-- <li><a href="send_sms_CMS.php">Send SMS </a></li> -->

                </ul>
            </div>




</body>

</html>