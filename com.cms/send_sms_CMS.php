<?php
session_start();
include_once 'header_CMS.php';
include_once 'connectDB_CMS.php';
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
}else{
$_SESSION['username'];
$uid = $_SESSION['id'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <meta name="author" content="gowtham">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h2 class="sub-header">Contacts List</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>

                    <th>Contact Name</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Send Message</th>



                </tr>
            </thead>
            <tbody id="displayCon">


            </tbody>
        </table>

    </div> <!-- dashboard div  -->

    <div id="send_sms_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Send SMS
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div> <!-- modal-header -->
                <br>
                <br>
                <div class="modal-body">
                    <!-- <div id="send_sms_popup" class="text-center h4"> -->
                    <div class="text-center h4" id="message_warning">
                    </div>
                    <form id="send_sms_form" method="post">
                        <!-- <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input class="form-control username" type="text" name="username" id="username" value="" aria-describedby="sizing-addon2">
                        </div> -->

                        <!-- <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input class="form-control sender" type="text" name="sender" id="sender" value="" aria-describedby="sizing-addon2">
                        </div> -->
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-phone"></i>
                            </span>
                            <input readonly class="form-control number" type="number" name="number" id="number" value="" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <textarea class="form-control message" name="message" id="message" placeholder="Enter Your Message" aria-describedby="sizing-addon2"></textarea>
                        </div>
                        <br>
                        <input type="button" class="send_btn btn btn-primary" id="send_btn" name="send_btn" value=Send Message">

                    </form>

                    <!-- </div> -->



                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>

                </div> <!-- modal-footer -->

            </div> <!-- modal-content -->
        </div> <!-- modal dialog -->
    </div> <!-- modal fade -->





    <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->


    <script type="text/javascript">
        $(document).ready(function() {
            //ajax
            $.ajax({
                url: 'send_sms_show_CMS.php',
                type: 'get',
                success: function(response) {
                    $("#displayCon").html(response);

                }

            }); //ajax close



            $(document).on('click', '.send_sms_btn', function() {
                var sms_btn_id = $(this).attr('id');
                $.ajax({
                    url: 'send_sms_details_CMS.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        sms_btn: sms_btn_id
                    },
                    success: function(data) {
                        $('.username').val(data.contacts.contact_name);
                        $('.number').val(data.contacts.mobile_num);
                    },
                }); //ajax close
            }); //send_sms_btn


            $(document).on('click', '.send_btn', function() {
                // event.preventDefault();
                var phone = document.getElementById("number").value;

                var message = document.getElementById("message").value;

                $('.error').remove();
                if (message == "") {
                    $("#message_warning").html("<span class='error text-danger'>Empty Message Cannot Be Sent..//</span>");
                } else {
                    $.ajax({
                        url: 'sms_api_CMS.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            number: phone,
                            message: message
                        },
                        success: function(data) {
                            if(data == 1) {
                                
                                $("#message_warning").html("<span class='error text-success'>Message Sent Successfully..!!</span>");
                                //window refresh
                                window.setTimeout(function() {
                                    location.reload(true);
                                }, 2000);
                            } else {
                                $("#message_warning").html("<span class='error text-danger'>Message Sent Failed</span>");
                            }
                        },

                    }); // ajax close

                } // else close
            }); // send_sms_form




        }); //document
    </script>


</body>

</html>