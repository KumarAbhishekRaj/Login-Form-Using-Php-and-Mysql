<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "success connecting to the database";


    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $des = $_POST['des'];

    $sql = "INSERT INTO `form`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `des`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$des', CURRENT_TIMESTAMP);";

    // echo "$sql";

    if ($con->query($sql) == true) {
        // echo "successfully inserted";
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
        // $not_insert = true;
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" </head> <body>
    <img class="bg" src="images/6.jpg" alt="library">
    <div class="container">
        <h1>Welcome to the Bihar Trip Form</h1>
        <p>Enter your details and submit your form to confirm your participation in the trip</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">

            <input type="email" name="email" id="email" placeholder="Enter Your email">

            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">

            <textarea name="des" id="des" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">submit</button>
        </form>
    </div>
    <script src="js/validate.js"></script>


    </body>

</html>