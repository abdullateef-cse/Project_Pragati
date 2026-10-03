<?php
include __DIR__ . '/../config.php';

$sql = "SELECT * FROM volunteers ORDER BY created_at DESC";
$result = $conn->query($sql);

$data = [];

while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
