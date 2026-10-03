<?php
include __DIR__ . '/../config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$expertise = $_POST['expertise'];
$role = $_POST['role'];
$commitment = $_POST['commitment'];
$reason = $_POST['reason'];

$sql = "INSERT INTO volunteers \n(name, email, phone, expertise, role, commitment, reason)\nVALUES \n('$name', '$email', '$phone', '$expertise', '$role', '$commitment', '$reason')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
?>
