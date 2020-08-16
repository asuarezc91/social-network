<?php
$con = mysqli_connect("localhost", "root", "", "ese");

if (mysqli_connect_errno()) {

    echo "Failed to connect: " . mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES(NULL,'daniel')");

//Declaring variables to prevent errors

$fname = ""; //First NAme
$lname = ""; //Last Name
$em = ""; //email
$em2 = ""; //email2
$password = ""; //password
$password2 = ""; //password2
$date = ""; //Sign up date
$error_array = ""; //Holds error messages


// $test = $_POST['reg_fname'];
// echo "hola $test";



if (isset($_POST["register_button"])) {

    // //Registration form values

    //First Name 
    $fname = strip_tags($_POST['reg_fname']); //Remove html tags
    $fname = str_replace('', '', $fname); //Remove spaces
    $fname = ucfirst(strtolower($fname)); // Uppercase first letter


    //Last Name
    $lname = strip_tags($_POST['reg_lname']); //Remove html tags
    $lname = str_replace('', '', $lname); //Remove spaces
    $lname = ucfirst(strtolower($lname)); // Uppercase first letter


    //email
    $em = strip_tags($_POST['reg_email']); //Remove html tags
    $em = str_replace('', '', $em); //Remove spaces
    $em = ucfirst(strtolower($em)); // Uppercase first letter

    //email 2 
    $em2 = strip_tags($_POST['reg_email2']); //Remove html tags
    $em2 = str_replace('', '', $em2); //Remove spaces
    $em2 = ucfirst(strtolower($em2)); // Uppercase first letter

    //Password
    $password = strip_tags($_POST['reg_password']); //Remove html tags
    $password2 = strip_tags($_POST['reg_password2']); //Remove html tags


    $date = date("Y-m-d"); //Current date;


    if ($em == $em2) {
        echo "";

        if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $em =  filter_var($em, FILTER_VALIDATE_EMAIL);
        } else {

            echo "Invalid format";
        }
    } else {
        echo "Emails don't match";
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Nature</title>
</head>

<body>
    <!-- Send infomation to this page with acction -->
    <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" require>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" require>
        <br>
        <input type="email" name="reg_email" placeholder="Email" require>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" require>
        <br>
        <input type="password" name="reg_password" placeholder="Password" require>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" require>
        <br>
        <input type="submit" name='register_button' value="Registrer">
    </form>



</body>

</html>