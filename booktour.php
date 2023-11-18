<?php 
    include('./includes/config.php'); 
?>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/admin.css" rel='stylesheet' type='text/css' />
<div class="main-content">
            <div class="wrapper">
                <table>
 <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tour</th>
                            <th class="text-center">From date</th>
                            <th class="text-center">Full name</th>

                            
                       
<tr>

</div>
</div>

        <?php
        $stt=1;
            $uid = $_SESSION['user_id'];
            $sql = "SELECT * FROM tblbill where user_id= $uid";
            $res = mysqli_query($conn, $sql);
            $count1 = mysqli_num_rows($res);

            if($res==true){
                $count1 = mysqli_num_rows($res);
                if($count1>0){
                    while($rows=mysqli_fetch_assoc($res)){
                    $code_bill = $rows['code_bill'];   
                    $user_id = $rows['user_id'];
                    $status_bill = $rows['bill_status'];
                    $id_bill = $rows['id_bill'];
                    $_SESSION['idbill']=$rows['id_bill'];
                    
                    ?>
        
            <tr>
                <td><?=$stt++?></td>
                <td><?=$_SESSION['idbill']?></td>
                <td><?=$user_id?></td>
                <td><?=$status_bill?></td>
            </tr>
            <?php
                    }
                }
            }
        

?>
</table>


