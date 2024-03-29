<?php
    if (isset($_GET['id'])){
        $travel_id = $_GET['id'];
        echo $travel_id;
        include "../travel.php";
        $travel = New Travel;
        $travel->delete($travel_id);
        header("Location: ../dashboard.php");
        exit();
    }
?>