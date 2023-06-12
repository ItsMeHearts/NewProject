<?php
session_start();
include_once "header_CMS.php";
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
} else {
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    //echo $username;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Contact</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="gowtham">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
        function validate_form() {
            var name = document.getElementsByName('name[]');
            var phone = document.getElementsByName('phone[]');
            var address = document.getElementsByName('address[]');
            var num = name.length;
            for(var i=0 ; i < num ; i++)
            {
                if(name[i].value == "")
                {
                    alert("Contact Name Required");
                    name[i].focus();
                    return false ;

                }
                else if(phone[i].value == "")
                {
                    alert("Phone Number Required");
                    phone[i].focus();
                    return false;

                }
                else if(address[i].value == "")
                {
                    alert("Address Required");
                    address[i].focus();
                    return false;
                }
            }
            return true ;
        }
    </script>


</head>

<body>
    <div class="col-md-9 ">
        <h1 class="page-header">Add Contact</h1>

        <form id="contact_form" method="post">
            <div id="success_message">
            </div>
            <br>

            <div class="input-group col-sm-6">
                <input type="button" class="form-control btn btn-default add_contact" id="add_contact" value="Add Contact">
            </div>
            <br>
            <div class="form-inline">
                <div class="form-group ">
                    <input type="text" name="name[]" class="form-control name" id="name" placeholder="Contact Name">
                </div>
                <div class="form-group ">
                    <input type="number" name="phone[]" id="phone" class="form-control" placeholder="Mobile Number">
                </div>
                <div class="form-group ">
                    <input type="text" name="address[]" id="address" class="form-control" placeholder="Address">
                </div>

                <!-- to Add_dynamic_fields -->
                <table id="dynamic_fields" class="dynamic_fields">



                </table>
                <br>
                <div class="form-group">
                    <input type="submit" id="add_form_btn" class="add_form_btn btn btn-primary " value="Save Contact">
                </div>
            </div>
        </form>



    </div>

    <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->

    <!-- ScriptTag -->
    <script type="text/javascript">
        $(document).ready(function() {
            var i = 0;
            $('.error').remove();
            $("#add_contact").on('click', function() {
                i++;
                $("#dynamic_fields").append("<tr id='row" + i + "'> <td style='padding-right:4px'> <div class='form-group'><input type='text' name='name[]' id='name' placeholder='Contact Name' class='form-control name '></div></td>    <td style='padding-right:3px'> <div class='form-group'><input type='number' name='phone[]' id='phone' placeholder='Mobile Number' class='form-control phone'></div></td> <td style='padding-right:4px'> <div class='form-group'><input type='text' name='address[]' id='address' placeholder='Address' class='form-control address'></div></td>  <td style='padding-right:1px'> <div class='input-group'><button type='button' name='remove_btn' id='" + i + "' class='_remove btn btn-info'>Remove</button></div></td></tr>");
            }); //add_contact_close

            //remove_form 
            $(document).on('click', '._remove', function() {
                var btn_id = $(this).attr('id');
                $('#row' + btn_id + '').remove();

            }); //remove_form_close

            //ajax_request_to_Post_data
            $("#add_form_btn").on('click', function(event) {
                event.preventDefault();
                $bool = validate_form();

                if($bool)
                {
                $.ajax({
                    url: 'add_contact_script_CMS.php',
                    type: 'POST',
                    data: $("#contact_form").serialize(),
                    success: function(data) {
                        if (data == "success") {
                            $("#success_message").html("<span class='error text-success h4'>Successfully Added</span>");
                            window.setTimeout(function() {
                                location.reload(true);
                            }, 1000);


                        } else {
                            $("#success_message").html("<span class='error text-danger h4'>Sorry Phone Number Already Exists... Unable To Add Contact</span>");
                        }
                    }, //success close
                }); //ajax_close
                }



            })



        }); //document_close
    </script>




</body>

</html>