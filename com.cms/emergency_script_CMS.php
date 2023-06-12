<?php
    session_start();
    $_SESSION['username'];
    $uid = $_SESSION['id'];
    include_once 'connectDB_CMS.php';


    if($_POST)
    {
        $request = mysqli_real_escape_string($conn , $_POST['em_num_search']);
        $query = "(SELECT helpline ,number ,'emer' as type FROM emergency_cms WHERE helpline LIKE '%".$request ."%' OR number LIKE '%".$request."%') 
        UNION 
        (SELECT helpline ,number ,'chen' as type FROM emergency_chennai WHERE helpline LIKE '%".$request."%' OR number LIKE '%".$request."%')
        UNION
        (SELECT helpline ,number, 'hosp' as type FROM chennai_hosp WHERE helpline LIKE '%".$request."%' OR number LIKE '%".$request."%')       
        ";

        $result = mysqli_query($conn , $query);
        $result_check = mysqli_num_rows($result);

        if($result_check > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<tr>';
                echo '<td>' .$row['helpline'].'</td>';
                echo '<td>' .$row['number']. '</td>';
                echo '</tr>';

            }
        }
        else
        {
                echo "<tr>";
                echo "<td colspan='5' class='h4'>No member(s) found.....</td>";
                echo "</tr>";
                    
            
        }
    }


?>