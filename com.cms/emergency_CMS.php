<?php
session_start();
include_once 'header_CMS.php';
include_once 'connectDB_CMS.php';
if (!isset($_SESSION['username'])) {
    echo "<script>alert('User Not Logged In');window.location='home_CMS.php'</script>";
}else {
    $_SESSION['username'];
    $uid = $_SESSION['id'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width , initial-scale = 1.0">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="col-md-9">
        <h1 class="page-header">Search</h1>
        <form method="post" id="emergency_search">

            <div class="input-group col-sm-4 ">
                <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-search"></i>
                </span>
                <input class="form-control em_num_search" type="text" name="em_num_search" id="em_num_search" aria-describedby="sizing-addon2" placeholder="Search Number">
            </div>

            <br>

            <button type="submit" class="em_search_btn btn btn-primary" id="em_search_btn" name="em_search_btn">Search</button>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Emergency Helpline</th>
                        <th>Number</th>


                    </tr>
                </thead>
                <tbody id="emergencyDisplay">


                </tbody>
            </table>

        </div> <!-- dashboard div  -->






        <h1 class="page-header">Emergency Numbers</h1>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Emergency Helpline</th>
                        <th>Number</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = "SELECT * FROM emergency_cms ORDER BY e_id DESC";
                    $result = mysqli_query($conn, $query);
                    $result_check = mysqli_num_rows($result);

                    if ($result_check > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo ucwords($row['helpline']); ?> </td>
                                <td><?php echo $row['number']; ?>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No member(s) found.....</td>
                        </tr>
                    <?php }     ?>


                </tbody>
            </table>

        </div> <!-- dashboard div  -->

        <h1 class="page-header">Chennai</h1>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Emergency Helpline</th>
                        <th>Number</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = "SELECT * FROM emergency_chennai ORDER BY c_id DESC";
                    $result = mysqli_query($conn, $query);
                    $result_check = mysqli_num_rows($result);

                    if ($result_check > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo ucwords($row['helpline']); ?> </td>
                                <td><?php echo $row['number']; ?>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No Number(s) found.....</td>
                        </tr>
                    <?php }     ?>


                </tbody>
            </table>

        </div> <!-- dashboard div  -->


        <h1 class="page-header">Hospital Ambulance & Other Services</h1>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Emergency Helpline</th>
                        <th>Number</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = "SELECT * FROM chennai_hosp ORDER BY h_id DESC";
                    $result = mysqli_query($conn, $query);
                    $result_check = mysqli_num_rows($result);

                    if ($result_check > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo ucwords($row['helpline']); ?> </td>
                                <td><?php echo $row['number']; ?>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No Number(s) found.....</td>
                        </tr>
                    <?php }     ?>


                </tbody>
            </table>

        </div> <!-- dashboard div  -->

    </div> <!-- col-md-9 -->


    <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->


    <div id="script">
        <script type="text/javascript">
            $(document).ready(function() {
                $("#emergency_search").on('submit', function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: 'emergency_script_CMS.php',
                        type: 'POST',
                        data: new FormData(this),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) 
                        {
                            $("#emergencyDisplay").html(data);
                        }

                    }); //ajax close

                }); //emergency_search

            }); //document
        </script>


    </div>



</body>



</html>