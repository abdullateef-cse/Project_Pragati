<?php
include __DIR__ . '/../config.php';

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE partners SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
?>
