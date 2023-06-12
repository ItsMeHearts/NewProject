<?php
session_start();
include_once "connectDB_CMS.php";
include_once "header_CMS.php";
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
}else
{

    $user_id =  $_SESSION['id'];
    $username =  $_SESSION['username'];

    $query = "SELECT * FROM user_cms WHERE _id = '$user_id'";
$result = mysqli_query($conn, $query);
$res_check = mysqli_num_rows($result);
if ($res_check > 0) {
    while ($user_row = mysqli_fetch_assoc($result)) {
        $name = $user_row['username'];
        $email = $user_row['email'];
        $phone = $user_row['phone'];
        $gender = $user_row['gender'];
        $image = $user_row['_image'];
        $image_src = "uploads/".$image ;
        
    }
}
}

?>

<!DOCTYPE html>
<html>
<!-- HeadTag -->

<head>
    <title>Welcome To Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="gowtham">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js">
    </script>
    <link rel="stylesheet" href="css/style.css">


</head>

<!-- bodyTag -->

<body>
    <!--   Dashboard SideBar 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar h4">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Add New Contact</a></li>
                    <li><a href="#">Edit Contact</a></li>
                    <li><a href="#">Search Contact</a></li>
                    <li><a href="#">Exports Contact</a></li>
                </ul>
            </div> -->
    <!-- dashboard -->
    <div class="col-md-9 ">
        <h1 class="page-header">Dashboard</h1>
        <div class="row placeholders text-center">
            <div class="col-xs-6 col-sm-3 placeholder navbar-right">
                <table border="0px">
                    <tr>
                        <td>
                            <!-- <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-circle" alt="Generic placeholder thumbnail"> -->
                            <?php 
                            if($image == "")
                            {
                                
                                echo "<img src='user.png' height='200' width='200' class='img-circle' alt='Generic placeholder thumbnail'>"; 
                            }
                            else{
                              echo "<img src='$image_src' height='200' width='200' class='img-circle' alt='Generic placeholder thumbnail'>"; 

                            }
                            
                            ?>
                            <h4> <span class="text-muted h4"><?php echo $name; ?></span></h4>

                        </td>
                    </tr>
                    <tr>
                        <td><span class="text-muted h4"><?php echo $email; ?></span></td>
                    </tr>
                    <tr>
                        <td><span class="text-muted h4"><?php echo $phone; ?></span></td>
                    </tr>
                    <tr>
                        <td><span class="text-muted h4"><?php echo $gender; ?></span></td>
                    </tr>
                </table>

            </div>
        </div> <!-- row Placeholder div -->
        <h2 class="sub-header">Contacts List</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Contact Name</th>
                        <th>Mobile Number</th>
                        <th>Address</th>

                    </tr>
                </thead>
                <tbody id="displayCon">


                </tbody>
            </table>

        </div> <!-- dashboard div  -->

        <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->

    <!-- Scritpt Tag -->
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('Contact_dashboard');
            //calling function
            displayContacts();

            function displayContacts() {
                $.ajax({
                    url: 'contact_dashboard_CMS.php',
                    type: 'get',

                    success: function(response) {
                        $("#displayCon").html(response);
                    },

                });
            }
        });
    </script>


</body>




</html>