<!DOCTYPE html>

</html>

<head>
    <title>Contact Management System</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>



    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <!-- Latest compiled and minified CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <!-- script_ShowPassword_Function -->
    <script type="text/javascript">
        function showPassword() {
            var X = document.getElementById("password");
            var Y = document.getElementById("confirm_password");

            if (X.type === "password") {
                X.type = "text";
            } else {
                X.type = "password";
            }

            if (Y.type === "password") {
                Y.type = "text";
            } else {
                Y.type = "password";
            }

        }
    </script>

</head>

<body>
    <!-- header Bar -->
    <div id="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header h4">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home_CMS.php">Contact Management System !!</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                    </ul>

                    <ul class="nav navbar-nav navbar-right" style="padding-top:10px">
                        <li style="padding-right:10px"><button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#add_data_modal">SignUp</button>
                        </li>
                        <li><button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#check_data_modal">
                                SignIn
                            </button></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <!-- Header Bar -->

    <!-- register_form -->
    <div id="add_data_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Member Registration
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>

                        </button>
                    </h4>
                </div>
                <br>
                <!-- to_display_error -->
                <div id="error_message" class="text-center">

                </div>
                <br>
                <div class="modal-body">
                    <form method="post" id="register_form">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control username" id="username" name="username" placeholder=" Username" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <input type="email" class="form-control email" id="email" name="email" placeholder=" Email" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon 
                                glyphicon-phone"></i>
                            </span>
                            <input type="number" class="form-control phone" id="phone" name="phone" placeholder=" Phone Number" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-indent-left"></i>
                            </span>
                            <select name="gender" id="gender" class="gender form-control" aria-describedby="sizing-addon2">
                                <option value="0">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" class="form-control password" id="password" name="password" placeholder=" Password" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-screenshot"></i>
                            </span>
                            <input type="password" class="form-control confirm_password" name="confirm_password" id="confirm_password" placeholder=" Confirm Password" aria-describedby="sizing-addon2">
                        </div>

                        <div class="input-group checkbox">
                            <span class="input-group-addon" id="sizing-addon2">
                                <input type="checkbox" onclick="showPassword()"> Show Password
                            </span>

                        </div>
                        <br>
                        <div>
                            <button type="submit" id="reg_btn" class="reg_btn btn btn-primary">Register User</button>
                        </div>

                    </form>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Rgistration form close -->

    <!-- login_form_opens_here -->
    <div id="check_data_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div> <!-- modal-header -->
                <br>
                <div id="login_form_message" class="text-center">

                </div>
                <br>
                <div class="modal-body">
                    <form id="login_form" method="post" enctype="application/x-www-urlencoded">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input class="form-control login_id" type="text" name="login_id" id="login_id" placeholder="Email or Phone Number" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" class="form-control login_password" name="login_password" id="login_password" placeholder="Password" aria-describedby="sizing-addon2">
                        </div>
                        <br>
                        <button type="submit" class="login_btn btn btn-primary" id="login_btn" name="login_btn">Sign In</button>

                    </form>
                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>

                </div> <!-- modal-footer -->

            </div> <!-- modal-content -->
        </div>
        <!-- modal dialog -->
    </div> <!-- modal fade -->



    <!-- login_form_close -->

    <div class="container">
        <!-- <h1>Hello, world!</h1>
        <p>...</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>Management stuff!</h1>
            <p class="lead">Management (or managing) is the administration of an organization, whether it is a business, a not-for-profit organization, or government body. Management includes the activities of setting the strategy of an organization and coordinating the efforts of its employees (or of volunteers) to accomplish its objectives through the application of available resources, such as financial, natural, technological, and human resources. The term "management" may also refer to those people who manage an organization.</p>
            <p><a class="btn btn-lg btn-success" href="home_CMS.php" role="button">Get started today</a></p>
        </div>

        <!-- Example row of columns -->
        <div class="row">
            <div class="col-lg-4">
                <h2>Technology Stuff..!!</h2>
                <p class="">The number one benefit of information technology is that it empowers people to do what they want to do. It lets people be creative. It lets people be productive. It lets people learn things they didn't think they could learn before, and so in a sense it is all about potential.</p>
                <p class="">Technology has forever changed the world we live in. We're online, in one way or another, all day long. Our phones and computers have become reflections of our personalities, our interests, and our identities. They hold much that is important to us.
                </p>
                <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Contact Management</h2>
                <p class="">A contact manager is a software program that enables users to easily store and find contact information, such as names, addresses and telephone numbers. They are contact-centric databases that provide a fully integrated approach to tracking of all information and communication activities linked to contacts. Simple ones for personal use are included in most smartphones. The main reference standard for contact data and metadata, semantic and interchange, is the vCard.</p>
                <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Contact Saver</h2>
                <p>To Manage Contacts of Individual in a Database for a Emergency Use of User..In Contact Saver able to Add Name , Phone Number and Also Address of contacts</p>
                <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>

        <br>
        <br>
        <br>

        <!-- Site footer -->
        <footer class="footer">
            <p>&copy;Contact Management</p>
        </footer>
    </div>





    <!-- script_Validation -->
    <div>
        <script type="text/javascript">
            $(document).ready(function() {
                console.log('Page Ready');
                $("#register_form").on('submit', function(event) {
                    event.preventDefault();
                    $username = $("#username").val();
                    $email = $("#email").val();
                    $phone = $("#phone").val();
                    $password = $("#password").val();
                    $confirm_password = $("#confirm_password").val();
                    $gender = $("#gender").val();
                    $passwordRegex = /^([a-zA-Z0-9!@#$%^&*()_]{8,})*$/;
                    $phnRegex = /^([0-9]{10})*$/;
                    $usernameRegex = /^[a-zA-Z0-9_]*$/;

                    $('.error').remove();
                    //validation
                    if ($username == "") {
                        $("#error_message").html("<span class='text-danger h4 error'>Username Must Not To Be Empty..Plesae Enter Username</span>");
                    } else if (!$usernameRegex.test($username)) {
                        $("#error_message").html("<span class='text-danger h4 error'> Enter Valid [a-zA-Z0-9_] Username</span>");
                    } else if ($email == "") {
                        $("#error_message").html("<span class='text-danger h4 error'>Email Must Not To Be Empty..Plesae Enter Email </span>");
                    } else if ($phone == "") {
                        $("#error_message").html("<span class='text-danger h4 error'> Phone Number Must Not To Be Empty..Plesae Enter Phone Number</span>");
                    } else if (!$phnRegex.test($phone)) {
                        $("#error_message").html("<span class='text-danger h4 error'> Enter Valid 10 Digit Mobile Number</span>");
                    } else if ($gender == "0") {
                        $("#error_message").html("<span class='text-danger h4 error'> Select Gender </span>");
                    } else if ($password == "") {
                        $("#error_message").html("<span class='text-danger h4 error'> Password Must Not To Be Empty..Plesae Enter Password</span>");
                    } else if (!$passwordRegex.test($password)) {
                        $("#error_message").html("<span class='text-danger h4 error'> Enter Min 8 Characters as Password </span>");
                    } else if ($confirm_password == "") {
                        $("#error_message").html("<span class='text-danger h4 error'>Confirm Password Must Not To Be Empty..Please Enter Confirm Password </span");
                    } else if (!$passwordRegex.test($confirm_password)) {
                        $("#error_message").html("<span class='text-danger h4 error'> Enter Min 8 to Max 15 Letters as Confirm Password</span>");
                    } else if ($password != $confirm_password) {
                        $("#error_message").html("<span class='text-danger h4 error'> Password & Confirm Password Not Matching</span>");
                    } else {
                        $.ajax({
                            url: 'registration_script_CMS.php',
                            type: 'POST',
                            data: new FormData(this),
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                //console.log(data);
                                if (data == "Mail_exist") {
                                    $("#error_message").html("<span class='text-danger h4 error'>Email Id Registered Already..!!</span>");
                                } else if (data == "Phone_exist") {
                                    $("#error_message").html("<span class='text-danger h4 error'>Phone Number Registered Already..!!</span>");

                                } else {
                                    $("#error_message").html("<span class='text-success h4 error'>Successfully Registered...!!</span>");
                                    //reset form
                                    $("#register_form").each(function() {
                                        this.reset();
                                    });

                                }

                            }, //success _close
                        }); //ajax_close
                    } //else_close
                }); //form_close

                $("#login_form").on('submit', function(event) {
                    event.preventDefault();
                    $login_id = $("#login_id").val();
                    $password = $("#login_password").val();
                    $('.error').remove();
                    if ($login_id == "") {
                        $("#login_form_message").html("<span class='text-danger h4 error'>Login Id Cannot Be Empty...//</span>");
                    } else if ($password == "") {
                        $("#login_form_message").html("<span class='text-danger h4 error'>Password Cannot Be Empty...//</span>");
                    } else {
                        $.ajax({
                            url: 'login_script_CMS.php',
                            type: 'post',
                            data: new FormData(this),
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                //console.log(data);
                                if (data > 0) {
                                    $("#login_form_message").html("<span class='text-success h4 error'>Successfully Logged In...!!</span>");

                                    $("#login_form").each(function() {
                                        this.reset();
                                    }); //reset_form

                                    //redirect Page
                                    window.setTimeout(function() {
                                        window.location = "user_dashboard_CMS.php";
                                    }, 1000);
                                } else {
                                    $("#login_form_message").html("<span class='text-danger h4 error'> Incorrect Email or Password..//<span>");
                                }
                            },

                        }); // ajax_close
                    } // else_close

                }); //login_form_close

            }); //document_close
        </script>
    </div>
    <!-- Script_validation_endTag -->
    <!-- 
    <div id="login_form_script">
        <script type="text/javascript">
            $(document)

        </script>

    </div>
 -->
</body>

</html>