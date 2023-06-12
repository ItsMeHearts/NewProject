<?php 
    session_start();
    include_once "connectDB_CMS.php";
    $username = $_SESSION['username'];
    $uid = $_SESSION['id'];


    $retrieve_query = "SELECT * FROM contacts_cms WHERE _id = '$uid'";
    $query = mysqli_query($conn, $retrieve_query);
    $result_check = mysqli_num_rows($query);
    if($result_check > 0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            
            echo "<tr>";
            
            echo "<td>".ucwords($row['contact_name'])."</td>";
            echo "<td>".$row['mobile_num']."</td>";
            echo "<td>".ucwords($row['address'])."</td>";
            echo "</tr>";
            //echo "<tbody>";
        }
    }
    
    



?>