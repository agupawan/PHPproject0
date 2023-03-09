<?php

include('config/db_connect.php');

$email = $title = $service = '';
//$count = 0;
$errors = ['email' => "", 'company' => "", 'service' => ""];

if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        $errors['email'] = "email required <br>";
        //$count++;
    } else {
        $email = $_POST['email'];
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors['email'] = "valid email required <br>";
            //$count++;
        }
    }

    if (empty($_POST['company'])) {
        $errors['company'] = "company name required <br>";
        //$count++;
    } else {
        $title = $_POST['company'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['company'] = "title must be letters and spaces only <br>";
            //$count++;
        }
    }

    if (empty($_POST['service'])) {
        $errors['service'] = "enter service to be provided";
        //$count++;
    } else {
        $service = $_POST['service'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $service)) {
            $errors['service'] = "service must be a comma separated list ";
            //$count++;
        }
    }

    if(!array_filter($errors)){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $title = mysqli_real_escape_string($connect, $_POST['company']);
        $service = mysqli_real_escape_string($connect, $_POST['service']);

        $sql = "INSERT INTO vendors(email,title,service) VALUES('$email','$title','$service')";

        if(mysqli_query($connect, $sql)){
            header('Location: index.php');
        }
        else{
            echo 'query error:' . mysqli_error($connect);
        }
    }
    

}




?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php';?>

<section class="container grey-text">
    <h4 class="center">Add a Vendor</h4>
    <form action="add.php" class="white" method="POST">
        <label">Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label">Company name:</label>
        <input type="text" name="company" value="<?php echo htmlspecialchars($title); ?>">
        <div class="red-text"><?php echo $errors['company']; ?></div>
        <label">Service:</label>
        <input type="text" name="service" value="<?php echo htmlspecialchars($service); ?>">
        <div class="red-text"><?php echo $errors['service']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include 'templates/footer.php';?>


</html>







