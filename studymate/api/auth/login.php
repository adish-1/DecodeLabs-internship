<?php
session_start();
include("../../config/db.php");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
$json=file_get_contents("php://input");
$data=json_decode($json,true);
if(isset($data["username"]) && isset($data["password"])){
    $username=$data["username"];
    $password=$data["password"];
    if($username==="" || $password===""){
        $response=[
            "success"=> false,
            "message"=> "Enter the values first"
        ];
         echo json_encode($response);
         exit();
    }
    $sql="select id,username,password from users where username=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) == 1){
        $row=mysqli_fetch_assoc($result);
        $hashedPass=$row["password"];
        if(password_verify($password,$hashedPass)){
            $_SESSION['username']=$username;
            $_SESSION['id']=$row['id']; 
            $response=[
                "success"=>true,
                "message"=>" Login Successfull!"
            ];
        }
        else{
             $response=[
                "success"=>false,
                "message"=>" Username Or Password Failed!"
            ];
        }
    }
    else{
        $response=[
            "success"=>false,
            "message"=>"user dosent exist"
        ];
    }
   echo json_encode($response);
}
?>