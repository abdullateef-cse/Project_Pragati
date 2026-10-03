<?php
include __DIR__ . '/../config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$organization = $_POST['organization'];
$message = $_POST['message'];

$sql = "INSERT INTO partners (name, email, organization, message)\nVALUES ('$name', '$email', '$organization', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
?>
