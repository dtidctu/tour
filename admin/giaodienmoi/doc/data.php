<?php include('../doc/include/config.php') ?>
<?php
    if(isset($_POST['id'])){
        $id_location = $_POST['id'];
        $sql_hotel = mysqli_query($conn,"SELECT * from tlbhotel where location_id = '$id_location'");

        $output = '';
        
        $output = '<option>-- Hotel --</option>';

            while($row_hotel = mysqli_fetch_array($sql_hotel)){
                $output.='<option value="'.$row_hotel['id'].'">'.$row_hotel['name_hotel'].'</option>';
        }
    }
    echo $output;
?>
