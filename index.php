<?php
if(isset($_POST['name'])){
    $db_hostname = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "trip";

    $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
    if (!$conn) {
        echo "Connection failed: " . mysqli_connect_error();
        exit;
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip` (`Name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img class="bg" src="college.png" alt="Sinhgad College">
        <h1>Welcome to Singad College Kashmir Trip Form</h1>
        
        <p>Enter Your Detail and Submit this form to confirm your participation in the trip</p>
        
        <?php if(isset($_POST['name'])): ?>
            <p class="thank">Thanks for submitting your form. We are happy to see you joining for the Trip</p>
        <?php endif; ?>

        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="text" name="phone" id="phone" placeholder="enter your phone">
            <textarea name="desc" id="desc" cols="10" rows="10" placeholder="enter any other information here"></textarea>
            <button type="submit" class="btn">Submit</button>

        </form>

    </div>
    <script src="index.js"></script>
</body>
</html>
