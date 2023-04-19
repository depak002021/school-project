<?php


$name= $_POST['name'];
$email = $_POST['email'];
$call_back_date = $_POST['call_back_date'];
$call_back_time =$_POST['call_back_time'];
$message = $_POST['message'];

$con = new mysqli("localhost","root","","evans-login");

if($con->connect_error){
    header("location:error1.html" . $con->connect_error);
}else{
    $stmt = $con->prepare("insert into commentors(name, email, call_back_date, call_back_time, message) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $call_back_date, $call_back_time, $message);
    $stmt->execute();
    header("Location: ./thankyou-pages/request-thankyou.html");
    $stmt->close();
    $con->close();
}

?>
