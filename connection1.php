<?php


$name= $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$con = new mysqli("localhost","root","","contact-data");

if($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}else{
    $stmt = $con->prepare("insert into contact(name, email, subject, message) values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    header("Location: ./thankyou-pages/request-thankyou.html");
    $stmt->close();
    $con->close();
}

?>
