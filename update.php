<?php

include("config/db_connect.php");

if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($connect, $_POST['id_to_update']);

    $sql = "UPDATE vendors SET created_at = default WHERE id = $id";

    if(mysqli_query($connect, $sql)){
        header("Location: details.php?id=$id");
    }
    else{
        echo "query error" . mysqli_error($connect);
    }
}

?>