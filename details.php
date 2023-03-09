<?php
include('config/db_connect.php');

if(isset($_GET['id'])){
     
    $id = mysqli_real_escape_string($connect,$_GET['id']);

    $sql = "SELECT * FROM vendors WHERE id = $id";

    $result = mysqli_query($connect, $sql);

    $vendor = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($connect);



}


?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<div class="container center">
    <?php if($vendor): ?>

         <h4><?php echo htmlspecialchars($vendor['title']); ?></h4>
         <p>Created by : <?php echo htmlspecialchars($vendor['email']); ?></p>
         <p><?php echo date($vendor['created_at']); ?></p>
         <h5>Services:</h5>
         <p><?php echo htmlspecialchars($vendor['service']); ?></p>
         
            
         <!-- DELETE form -->
         <div class="modify">
       
           
         <form action="delete.php" method="POST" class="deleteForm">
            <input type="hidden" name="id_to_delete" value="<?php echo $vendor['Id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
         </form>
         
         
         <form action="update.php" method="POST" class="updateForm">
            <input type="hidden" name="id_to_update" value="<?php echo $vendor['Id'] ?>">
            <input type="submit" name="update" value="Update" class="btn brand z-depth-0">
         </form>
        
         </div>

    <?php else: ?>
        <h5>No such Vendor exists!</h5>

    <?php endif; ?>
</div>


<?php include('templates/footer.php'); ?>

</html>