<?php
session_start();
include("../../config/db.php");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

if (!isset($_SESSION['id'])) {
    echo json_encode(["success" => false, "message" => "Unauthorized access."]);
    exit();
}

$userid = $_SESSION['id'];
$response = ["success" => true, "notes" => []];

$sql = "SELECT content FROM notes WHERE userid = ? ORDER BY created_at DESC LIMIT 3";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $response["notes"][] = $row["content"];
}

mysqli_stmt_close($stmt);
echo json_encode($response);
?>
