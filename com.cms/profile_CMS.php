<?php
session_start();
include_once "connectDB_CMS.php";
include_once "header_CMS.php";
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
}else{

    $username = $_SESSION['username'];
    $uid = $_SESSION['id'];
    
    $query = "SELECT * FROM user_cms WHERE _id = '$uid'";
    $result = mysqli_query($conn, $query);
    $result_check = mysqli_num_rows($result);
    
    $count_sql = "SELECT * FROM contacts_cms WHERE _id = '$uid'";
    $res = mysqli_query($conn, $count_sql);
    $total = mysqli_num_rows($res);
    
    
    
    
    if ($result_check > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['username'];
            $email = $row['email'];
            $phone = $row['phone'];
            $gender = $row['gender'];
            $image = $row['_image'];
            $image_src = "uploads/" . $image;
        }
    }
    
}
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UV-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="gowtham">
    <link rel='stylesheet' href="css/style.css">

    <script type="text/javascript">
        function showPassword() {
            var x = document.getElementById('password');
            var y = document.getElementById('new_password');
            var z = document.getElementById('confirm_new_password');

            if (x.type === 'password') {
                x.type = 'text';
            } else {
                x.type = 'password';
            }

            if (y.type === 'password') {
                y.type = 'text';
            } else {
                y.type = 'password';
            }

            if (z.type === 'password') {
                z.type = 'text';
            } else {
                z.type = 'password';
            }


        }
    </script>
</head>

<body>
    <button class="btn btn-primary navbar-left " type="button" id="contact_btn">
        Total Contacts <span class="badge"><?php echo $total; ?></span>
    </button>
    <div class="col-md-9 ">
        <h1 class="page-header">Profile </h1>

        <div class="row placeholders text-center">
            <div class="col-xs-6 col-sm-3 placeholder">
                <table border="0px" width="300">
                    <tr>
                        <td>
                            <?php

                            if ($image == "") {
                                //$image_src = 'user.png';
                                echo "<img src='user.png' width='200' height='200' class='img-circle' alt='Generic placeholder thumbnail'>";
                            }
                            else 
                            {
                                echo "<img src='$image_src' width='200' height='200' class='img-circle' alt='Generic placeholder thumbnail'>";

                            }
                            ?>

                        </td>
                        <td>
                            <h4> <span class="text-muted "> <a href="#" data-toggle="modal" data-target="#edit_image"><i class="glyphicon glyphicon-pencil navbar-right"> </i> </a></span></h4>


                        </td>





                    </tr>

                    <!-- Empty Row For Space -->
                    <tr>
                        <td> <br> </td>
                    </tr>

                    <tr>
                        <td><span class="text-muted h4"><?php echo $name; ?>
                        <a style="padding-left:10px ;" href="#" data-toggle="modal" data-target="#change_username"><i class="glyphicon glyphicon-pencil"></i></a> </span>
                    </td> 

                    </tr>

                    <!-- Empty Row For Space -->
                    <tr>
                        <td> <br> </td>
                    </tr>

                    <tr>
                        <td> <span class="text-muted h4"> <?php echo $email; ?>
                        <a style="padding-left:10px;" href="#" data-toggle="modal" data-target="#change_email"> <i class="glyphicon glyphicon-pencil"></i></a>
                        </span> </td> 
                    </tr>

                    <!-- Empty Row For Space -->
                    <tr>
                        <td> <br> </td>
                    </tr>

                    <tr>
                        <td> <span class="text-muted h4"> <?php echo $phone ?> 
                        <a style="padding-left:10px;" href="#" data-toggle="modal" data-target="#change_phone"><i class="glyphicon glyphicon-pencil"></i></a> 
                        
                        </span> </td>

                    </tr>

                    <!-- Empty Row For Space -->
                    <tr>
                        <td> <br> </td>
                    </tr>

                    <tr>
                        <td> <span class="text-muted h4"> <?php echo $gender; ?>
                            </span>
                        </td>
                    </tr>

                    <!-- Empty row for space -->
                    <tr>
                        <td> <br> </td>
                    </tr>


                    <tr>
                        <td><span class="text-muted h4"> Change Password 
                            <a href="#" style="padding-left:10px" data-toggle="modal" data-target="#change_password"> <i class="glyphicon glyphicon-pencil"></i></a>
                         </span>
                        </td>

                    </tr>
                    <!-- Empty row for space -->
                    <tr>
                        <td> <br> </td>
                    </tr>
                </table>


            </div>
        </div> <!-- row Placeholder div -->

    </div> <!-- col-md-9 -->


    <div class="navbar-left">




    </div>

    <!-- modal form image-->
    <div class="modal fade" id="edit_image">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Profile Picture
                        <button type="button" data-dismiss="modal" class="close btn btn-danger" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>

                </div> <!-- modal-header -->
                <br>
                <!-- To display Message -->
                <div id="image_message" class="text-center">


                </div>

                <br>
                <div class="modal-body">
                    <form method="post" id="image_upload" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-file"></i>
                            </span>
                            <input type="file" class="form-control image" id="image" name="image" aria-describedby="sizing-addon2">
                        </div>
                        <br>
                        <div>
                            <button type="submit" id="img_btn" class="img_btn btn btn-primary">Change Picture</button>
                        </div>
                    </form>

                </div> <!-- modal-body -->


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


                </div> <!-- modal-footer -->


            </div> <!-- modal-content -->
        </div> <!-- modal-dialog -->
    </div> <!-- modal-fade -->

    <!-- modal form close image -->

    <!-- modal form open username-->
    <div class="modal fade" id="change_username">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Username
                        <button type="button" data-dismiss="modal" class="close btn btn-danger" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>

                </div> <!-- modal-header -->
                <br>
                <!-- To display Message -->
                <div id="username_message" class="text-center">


                </div>

                <br>
                <div class="modal-body">
                    <form method="post" id="username_update" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control username" id="username" name="username" placeholder="Enter New Username" aria-describedby="sizing-addon2">
                        </div>
                        <br>
                        <div>
                            <button type="submit" id="username_btn" class="username_btn btn btn-primary">Change Username</button>
                        </div>
                    </form>

                </div> <!-- modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div> <!-- modal-footer -->


            </div> <!-- modal-content -->
        </div> <!-- modal-dialog -->
    </div> <!-- modal-fade -->

    <!-- modal form username close -->

    <!-- modal form open Email-->
    <div class="modal fade" id="change_email">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Email
                        <button type="button" data-dismiss="modal" class="close btn btn-danger" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>

                </div> <!-- modal-header -->
                <br>
                <!-- To display Message -->
                <div id="email_message" class="text-center">


                </div>

                <br>
                <div class="modal-body">
                    <form method="post" id="email_update" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <input type="email" class="form-control email" id="email" name="email" placeholder="Enter New Email" aria-describedby="sizing-addon2">
                        </div>
                        <br>
                        <div>
                            <button type="submit" id="email_btn" class="email_btn btn btn-primary">Change Email</button>
                        </div>
                    </form>

                </div> <!-- modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div> <!-- modal-footer -->


            </div> <!-- modal-content -->
        </div> <!-- modal-dialog -->
    </div> <!-- modal-fade -->

    <!-- modal form email close -->


    <!-- modal form open phone-->
    <div class="modal fade" id="change_phone">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Phone Number
                        <button type="button" data-dismiss="modal" class="close btn btn-danger" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>

                </div> <!-- modal-header -->
                <br>
                <!-- To display Message -->
                <div id="phone_message" class="text-center">


                </div>

                <br>
                <div class="modal-body">
                    <form method="post" id="phone_update" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-phone"></i>
                            </span>
                            <input type="number" class="form-control phone" id="phone" name="phone" placeholder="Enter New Phone Number " aria-describedby="sizing-addon2">
                        </div>
                        <br>
                        <div>
                            <button type="submit" id="phone_btn" class="phone_btn btn btn-primary">Change Phone Number</button>
                        </div>
                    </form>

                </div> <!-- modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div> <!-- modal-footer -->


            </div> <!-- modal-content -->
        </div> <!-- modal-dialog -->
    </div> <!-- modal-fade -->

    <!-- modal form phone number close -->


    <!-- modal form open Password-->
    <div class="modal fade" id="change_password">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password
                        <button type="button" data-dismiss="modal" class="close btn btn-danger" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>

                </div> <!-- modal-header -->
                <br>
                <!-- To display Message -->
                <div id="password_message" class="text-center">


                </div>

                <br>
                <div class="modal-body">
                    <form method="post" id="password_update" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" class="form-control password" id="password" name="password" placeholder="Enter Old Password " aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" class="form-control new_password" id="new_password" name="new_password" placeholder="Enter New Password" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-screenshot"></i>
                            </span>
                            <input type="password" class="form-control confirm_new_password" id="confirm_new_password" name="confirm_new_password" aria-describedby="sizing-addon2" placeholder="Confirm New Password">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <input type="checkbox" id="show_password" class="show_password" onclick="showPassword()"> Show Password
                            </span>
                        </div>
                        <br>
                        <div>
                            <button type="submit" id="password_btn" class="password_btn btn btn-primary">Change Password</button>
                        </div>
                    </form>

                </div> <!-- modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div> <!-- modal-footer -->


            </div> <!-- modal-content -->
        </div> <!-- modal-dialog -->
    </div> <!-- modal-fade -->

    <!-- modal form Change Password close -->










    <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->



    <script type="text/javascript">
        $(document).ready(function() {
            //console.log('Page Ready');

            //total contacts redirect
            $("#contact_btn").on('click', function() {
                window.location = 'user_dashboard_CMS.php';
            });


            //image upload open
            $("#image_upload").on('submit', function(event) {
                event.preventDefault();
                $image = $("#image").val();
                $('.error').remove();
                if ($image == "") {
                    $("#image_message").html("<span class='error h4 text-danger'> Image Is Empty..//</span>");

                } else {
                    $.ajax({
                        url: 'profile_script_CMS.php',
                        type: 'POST',
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            console.log(data);
                            if (data == "update") {
                                $("#image_message").html("<span class='error h4 text-success'> Image Updated Successfully..!!</span>");
                                //form-reset
                                $("#image_upload").each(function() {
                                    this.reset();
                                });
                                window.setTimeout(function() {
                                    location.reload(true);
                                }, 1000);
                            } else {
                                $("#image_message").html("<span class='error h4 text-danger'> Image Uploading Failed..// Enter Valid Jpeg* Jpg* Png* Image..</span>");
                            }
                        },


                    }); //ajax close
                }

            }); //image_upload close

            //username change open
            $("#username_update").on('submit', function(event) {
                event.preventDefault();
                $username = $("#username").val();
                $usernameRegex = /^[a-zA-Z0-9_]*$/;
                $('.error').remove();
                if ($username == "") {
                    $("#username_message").html("<span class='error h4 text-danger'> Username Cannot Be Empty..//</span>");
                } else if (!$usernameRegex.test($username)) {
                    $("#username_message").html("<span class='error h4 text-danger'> Enter Valid [a-zA-Z0-9_] Username...// </span>");
                } else {
                    $.ajax({
                        url: 'username_script_CMS.php',
                        type: 'post',
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data == "updated") {
                                $("#username_message").html("<span class='error h4 text-success'> Username Updated Successfully...!! </span>");
                                //reset form
                                $("#username_update").each(function() {
                                    this.reset();
                                });

                                //page reload
                                window.setTimeout(function() {
                                    location.reload(true);
                                }, 1000);

                            } else {
                                $("#username_message").html("<span class='error h4 text-danger'>Username Updation Failed..//</span>");
                            }
                        }

                    });

                }


            }); // username change close


            //email update open
            $("#email_update").on('submit', function(event) {
                event.preventDefault();
                $email = $("#email").val();
                $('.error').remove();

                if ($email == "") {
                    $("#email_message").html("<span class='error h4 text-danger'> Email Cannot Be Empty..//</span>");
                } else {
                    $.ajax({
                        url: 'email_script_CMS.php',
                        type: 'post',
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data == 'updated') {
                                $("#email_message").html("<span class='error h4 text-success'> Email Updated Successfully...!!</span>");

                                //reset Form
                                $("#email_update").each(function() {
                                    this.reset();
                                });
                                //reload page
                                window.setTimeout(function() {
                                    location.reload(true);
                                }, 1000);

                            } else {
                                $("#email_message").html("<span class='error h4 text-danger'>Email Already Exist...  Updation Failed..//</span>");
                            }
                        },


                    });
                }

            }); //email update close


            //phone update open
            $("#phone_update").on('submit', function(event) {
                event.preventDefault();
                $phone = $("#phone").val();
                $phoneRegex = /^([0-9]{10})*$/;
                $('.error').remove();

                if ($phone == '') {
                    $("#phone_message").html("<span class='error h4 text-danger'>Mobile Number Cannot Be Empty...Please Enter Mobile Number..//</span>");
                } else if (!$phoneRegex.test($phone)) {
                    $("#phone_message").html("<span class='error h4 text-danger'>Enter Valid 10 Digit Mobile Number..//</span>");
                } else {
                    $.ajax({
                        url: 'phone_script_CMS.php',
                        type: 'post',
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data == "updated") {
                                $("#phone_message").html("<span class='error h4 text-success'> Mobile Number Updated Successfully...!!</span>");
                                //reset Form
                                $("#phone_update").each(function() {
                                    this.reset();
                                });
                                //reload page
                                window.setTimeout(function() {
                                    location.reload(true);
                                }, 1000);
                            } else {
                                $("#phone_message").html("<span class='error h4 text-danger'>Mobile Number Already Exist...Updation Failed..//</span>");
                            }

                        }

                    }); //ajax close
                }

            }); //phone update close



            //password update open
            $("#password_update").on('submit', function(event) {
                event.preventDefault();
                $password = $("#password").val();
                $new_password = $("#new_password").val();
                $cnf_new_password = $("#confirm_new_password").val();
                $passwordRegex = /^([a-zA-Z0-9!@#$%^&*()_]{8,})*$/;
                $('.error').remove();

                if ($password == "") {
                    $("#password_message").html("<span class='error text-danger h4'>Password Cannot Be Empty...Please Enter Current Password..//</span>");
                } else if ($new_password == "") {
                    $("#password_message").html("<span class='error text-danger h4'>New Password Cannot Be Empty...Enter New Password..//</span>");
                } else if (!$passwordRegex.test($new_password)) {
                    $("#password_message").html("<span class='error text-danger h4'>Enter Min 8 Characters as New Password..//</span>");
                } else if ($cnf_new_password == "") {
                    $("#password_message").html("<span class='error text-danger h4'>Confirm Password Cannot Be Empty...Enter Confirm Password..//</span>");
                } else if (!$passwordRegex.test($cnf_new_password)) {
                    $("#password_message").html("<span class='error text-danger h4'>Enter Min 8 Characters as Confirm Password..//</span>");
                } else if ($new_password != $cnf_new_password) {
                    $("#password_message").html("<span class='error text-danger h4'> New Password & Confirm Password Not Matching..//</span>");
                } else {
                    $.ajax({
                        url: 'password_script_CMS.php',
                        type: 'post',
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data == 'updated') {
                                $("#password_message").html("<span class='error text-success h4'> Password Updated Successfully..!!!</span>");

                                //reset form
                                $("#password_update").each(function() {
                                    this.reset();
                                });
                                // reload
                                window.setTimeout(function() {
                                    location.reload(true);
                                }, 1000);

                            } else {
                                $("#password_message").html("<span class='error text-danger h4'>Incorrect Password...Updation Failed..//</span>");
                            }

                        },


                    }); // ajax close
                }


            }); //password update close






        }); // document close
    </script>


</body>




</html>