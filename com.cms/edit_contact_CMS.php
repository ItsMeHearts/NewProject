<?php
session_start();
include_once "header_CMS.php";
include_once "connectDB_CMS.php";
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
    <meta http-equiv="X-UA_Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="gowtham">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/image.css">


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
                    <th>Edit Contact</th>
                    <th>Delete Contact</th>


                </tr>
            </thead>
            <tbody id="displayCon">


            </tbody>
        </table>

    </div> <!-- dashboard div  -->





    <!-- login_form_opens_here -->
    <div id="edit_form_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Details
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div> <!-- modal-header -->
                <br>
                <div id="edit_form_message" class="text-center">

                </div>
                <br>
                <div class="modal-body">
                    <form id="edit_form" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-tags"></i>
                            </span>
                            <input readonly class="form-control cnt_id" type="number" name="cnt_id" id="cnt_id" value="" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-file"></i>
                            </span>
                            <input class="form-control cnt_image" type="file" name="cnt_image" id="cnt_image" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control cnt_name" name="cnt_name" id="cnt_name" value="" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-phone"></i>
                            </span>
                            <input type="number" class="form-control cnt_number" name="cnt_number" id="cnt_number" value="" aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                            <input type="text" class="form-control cnt_address" name="cnt_address" id="cnt_address" value="" aria-describedby="sizing-addon2">
                        </div>
                        <br>
                        <button type="submit" class="login_btn btn btn-primary" id="login_btn" name="login_btn">Update Details</button>

                    </form>
                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>

                </div> <!-- modal-footer -->

            </div> <!-- modal-content -->
        </div>
        <!-- modal dialog -->
    </div> <!-- modal fade -->

    <!-- edit_form_close -->




    <!-- image popup open -->
    <div id="image_form_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Contact Details
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div> <!-- modal-header -->
                <br>
                <br>
                <div class="modal-body">
                    <div id="image_popup" class="text-center h4">

                    </div>



                </div> <!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>

                </div> <!-- modal-footer -->

            </div> <!-- modal-content -->
        </div> <!-- modal dialog -->
    </div> <!-- modal fade -->



    <!-- login_form_close -->






    <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->



    <script type="text/javascript">
        $(document).ready(function() {
            //ajax
            $.ajax({
                url: 'edit_contact_script_CMS.php',
                type: 'get',
                success: function(response) {
                    $("#displayCon").html(response);

                }

            }); //ajax close


            $(document).on('click', '.edit_btn', function() {
                var edit_btn_id = $(this).attr('id');
                document.getElementById("cnt_id").value = edit_btn_id;
                $.ajax({
                    url: 'get_contact_info_CMS.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        cnt_btn_id: edit_btn_id,
                    },
                    success: function(data) {
                        $(".cnt_name").val(data.contact.contact_name);
                        $(".cnt_number").val(data.contact.mobile_num);
                        $(".cnt_address").val(data.contact.address);

                    }
                }); //ajx close
            }); //edit_btn close

            $("#edit_form").on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'update_contact_script_CMS.php',
                    type: 'post',
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data == 'success') {
                            $("#edit_form_message").html("<span class='error h4 text-success'> Successfully Updated</span>");

                            //reset form
                            $("#edit_form").each(function() {
                                this.reset();
                            });
                            //window refresh
                            window.setTimeout(function() {
                                location.reload(true);
                            }, 1000);
                        } else {
                            $("#edit_form_message").html("<span class='error h4 text-danger'>Updation Failed...May Be Phone Number Already Exist..//</span>");
                        }

                    },

                });

            }); // edit form close



            //image id 
            $(document).on('click', '.image_', function() {
                var img_id = $(this).attr('id');
                $.ajax({
                    url: 'get_image_CMS.php',
                    type: 'post',
                    data: {
                        image_id: img_id,
                    },
                    success: function(data) {
                        $("#image_popup").html(data);
                    },


                });


            }); //image id close

            //delete contact
            $(document).on('click', '.del_btn', function() {
                var del_id = $(this).attr('id');
                $.ajax({
                    url: 'delete_contact_CMS.php',
                    type: 'post',
                    data: {
                        delete_id: del_id,
                    },
                    success: function(data) {
                        if (data == 'deleted') {
                            alert('Contact Deleted Successfully..');
                            window.setTimeout(function() {
                                location.reload(true);
                            }, 1000);
                        }
                    },

                }); //ajax close
            }); //del close




        }); //document close
    </script>

</body>

</html>