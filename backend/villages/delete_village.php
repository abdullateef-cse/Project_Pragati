<?php
include __DIR__ . '/../config.php';

$id = $_POST['id'];

$conn->query("DELETE FROM village_requests WHERE id=$id");

echo "success";
?>
