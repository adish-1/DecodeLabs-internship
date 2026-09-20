<?php
session_start();
include("../../config/db.php");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");

if (!isset($_SESSION['id'])) {
    echo json_encode(["success" => false, "message" => "Invalid access."]);
    exit();
}

$userid = $_SESSION['id'];
$json = file_get_contents("php://input");
$data = json_decode($json, true);

if (isset($data["content"])) {
    $content = trim($data["content"]);

    $sql = "DELETE FROM notes WHERE userid = ? AND content = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "is", $userid, $content);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo json_encode(["success" => true, "message" => "Note deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Deletion process failed."]);
    }
    mysqli_stmt_close($stmt);
}
?>
