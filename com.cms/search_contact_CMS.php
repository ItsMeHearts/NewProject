<?php
session_start();
include_once "header_CMS.php";
include_once "connectDB_CMS.php";
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
}else
{

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



    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="col-md-9 ">
        <h1 class="page-header">Search</h1>
        <form method="post" id="search_contact">

            <div class="input-group col-sm-4 ">
                <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-search"></i>
                </span>
                <input class="form-control contact_search" type="text" name="contact_search" id="contact_search" aria-describedby="sizing-addon2" placeholder="Search Contact">
            </div>

            <br>

            <button type="submit" class="search_btn btn btn-primary" id="search_btn" name="search_btn">Search</button>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Contact Name</th>
                        <th>Mobile Number</th>
                        <th>Address</th>

                    </tr>
                </thead>
                <tbody id="displaySearch">


                </tbody>
            </table>

        </div> <!-- dashboard div  -->


    </div> <!-- col-md-9 -->



    <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->


    <script type="text/javascript">
        $(document).ready(function() {
            console.log("Page ready");
            $("#search_contact").on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "search_contact_script_CMS.php",
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("#displaySearch").html(data);
                    },
                }); //ajax
            });




        }); //document close
    </script>

</body>


</html>