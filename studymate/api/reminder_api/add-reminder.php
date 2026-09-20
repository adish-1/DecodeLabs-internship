<?php
session_start();
include("../../config/db.php");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
 if(!isset($_SESSION['id']))
    {
         $response=[
            "success"=> false,
            "message"=>"invalid accsess"
        ];
        echo json_encode($response);
        exit();
    }
    $userid=$_SESSION['id'];
    $json=file_get_contents("php://input");
    $data=json_decode($json,true);
    $content=trim($data["content"]);
    if($content===""){
         $response=[
            "success" => false,
            "message" => " Reminder Content Cannot Be Null"
        ];
        echo json_encode($response);
        exit();
    }
     $sql="insert into reminder(userid,content) values(?,?)";
     $stmt=mysqli_prepare($conn,$sql);
      mysqli_stmt_bind_param($stmt,"is",$userid,$content);
     $result=mysqli_stmt_execute($stmt);
     if($result){
        $response=[
            "success"=>true,
            "message"=>"Reminder Created"
        ];
     }
     else{
        $response=[
            "success"=>false,
            "message"=>"Reminder Creation Failed"
        ];
     }
     echo json_encode($response);

?>