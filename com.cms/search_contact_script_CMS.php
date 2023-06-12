<?php 
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once "connectDB_CMS.php";

    if(isset($_POST))
    {
        $request = mysqli_real_escape_string($conn , $_POST['contact_search']);
        $query = "SELECT * FROM contacts_cms WHERE contact_name LIKE '%".$request."%'
        OR mobile_num LIKE '%".$request."%' 
        OR address LIKE '%".$request."%' ";
        //var_dump($query);
        $result = mysqli_query($conn , $query);
        $res_check = mysqli_num_rows($result) ;


        if($res_check > 0)
        {            
            while($row = mysqli_fetch_assoc($result))
            {
               
                echo "<tr>";
                echo "<td>".$row['contact_name']."</td>";
                echo "<td>".$row['mobile_num']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                              
            }
            
        }else{
                echo "<tr>";
                echo "<td colspan='5' class='h4'>No member(s) found.....</td>";
                echo "</tr>";

        }
    }

?>