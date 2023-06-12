<?php 
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once 'connectDB_CMS.php';
    
    if(isset($_POST))
    {
        $sms_id = mysqli_real_escape_string($conn , $_POST['sms_btn']);

        $query = "SELECT * FROM contacts_cms WHERE cnt_id = '$sms_id' ";

        $result = mysqli_query($conn , $query);

        $result_check = mysqli_num_rows($result);

        if($result_check == 1)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $data['contacts']  = $row ;
            }
            echo json_encode($data);
        }
        else{
            echo "failed";
        }
    }

?>