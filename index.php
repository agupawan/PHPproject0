<?php

// connect to database

include 'config/db_connect.php';

// write query
$sql = 'SELECT title,service,id  FROM vendors ORDER BY id';

// get result
$result = mysqli_query($connect, $sql);

// fetch the resulting rows as an array
$vendors = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($connect);

//  print_r($vendors);

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php';?>

<h4 class="center grey-text">Vendors</h4>

<div class="container">
   <div class="row">

   <?php foreach ($vendors as $vendor): ?>
         <div class="col s6 md3">

            <div class="card z-depth-0">
               <div class="card-content center">
                  <h6><?php echo htmlspecialchars($vendor['title']); ?></h6>
                  <ul>
                     <?php foreach (explode(',', $vendor['service']) as $serv): ?>
                        <li><?php echo htmlspecialchars($serv); ?></li>
                     <?php endforeach;?>
                  </ul>
               </div>
               <div class="card-action right-align">
                  <a href="details.php?id=<?php echo htmlspecialchars($vendor['id']); ?>" class="brand-text">more info</a>
               </div>
            </div>
                     </div>
      <?php endforeach;?>
   </div>
</div>

 <?php include 'templates/footer.php';?>


</html>


