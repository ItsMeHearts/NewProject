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

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="col-md-9 ">
        <h1 class="page-header">Search</h1>

        <!--  -->
       
            <div class="panel panel-default">
                <div class="panel-heading h4">
                    Contact list
                    <a href="export_contact_script_CMS.php" class="btn btn-success">Export Contacts</a>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Contact Name</th>
                                <th>Mobile Number</th>
                                <th>Address</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //include database configuration file
                            
                            //get records from database
                            $query ="SELECT * FROM contacts_cms WHERE _id='$uid' ORDER BY cnt_id DESC " ;
                            $result = mysqli_query($conn , $query);
                            $result_check = mysqli_num_rows($result);
                            if ($result_check > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo ucwords($row['contact_name']); ?></td>
                                        <td><?php echo ucwords($row['mobile_num']); ?></td>
                                        <td><?php echo ucwords($row['address']); ?></td>
                                       
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="5">No member(s) found.....</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        




    </div> <!-- col-md-9 -->


    <!-- continue from headerPage_sidebar -->
    </div> <!-- row -->
    </div>
    <!-- Container-fluid -->

</body>


</html>