<?php
include __DIR__ . '/../config.php';

$id = $_POST['id'];

$sql = "DELETE FROM partners WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
?>
