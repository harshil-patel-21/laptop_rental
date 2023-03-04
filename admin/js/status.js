    function confirm(){
        <?php mysqli_query($conn, "UPDATE `tblbooking` SET status = '1' WHERE id = '$bid' ");?>
        alert(<?php echo "booking confirm"?>);
    }


     function cancel(){
        <?php mysqli_query($conn, "UPDATE `tblbooking` SET status = '2' WHERE id = '$bid' ");?>
        alert(<?php echo "booking cancel"?>);
    }
