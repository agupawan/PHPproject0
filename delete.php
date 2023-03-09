<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){
    $id = mysqli_real_escape_string($connect, $_POST['id_to_delete']);

    $sql = "DELETE FROM vendors WHERE id = $id" ;

    if(mysqli_query($connect,$sql)){
        header('Location: index.php');
    }
    else{
        echo "query error:" . mysqli_error($connect);
    }
}

?>