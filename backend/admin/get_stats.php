<?php
include __DIR__ . '/../config.php';

// count villages
$village = $conn->query("SELECT COUNT(*) as total FROM village_requests")->fetch_assoc()['total'];

// count volunteers
$volunteer = $conn->query("SELECT COUNT(*) as total FROM volunteers")->fetch_assoc()['total'];

// static (for now)
$sessions = 30;
$investment = "₹50L+";

echo json_encode([
    "village" => $village,
    "volunteer" => $volunteer,
    "sessions" => $sessions,
    "investment" => $investment
]);
?>
