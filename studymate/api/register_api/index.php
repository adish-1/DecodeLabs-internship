<?php
include("../../config/db.php");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
$usernameExist=false;
$mailExist=false;
$mobileExist=false;
$json=file_get_contents("php://input");
 $data=json_decode($json,true);
if ($data !== null && 
    isset($data['name']) && 
    isset($data['username']) && 
    isset($data['email']) && 
    isset($data['age']) && 
    isset($data['mobile']) && 
    isset($data['password'])) {

    $name = trim($data['name']);
    $username = trim($data['username']);
    $email = trim($data['email']);
    $age = intval($data['age']);
    $mobile = trim($data['mobile']);
    $password = $data['password'];
     if ($name === "" || $username === "" || $email === "" || $mobile === "" || $password === "" || $age <= 0) {
        $response = [
            "success" => false,
            "message" => "Please fill in all registration fields."
        ];
        echo json_encode($response);
        exit();
     }
    $hashedPass=password_hash($password,PASSWORD_BCRYPT);
    $sql="select username from users where username=?";
    $stmt=mysqli_prepare($conn,$sql);
     mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if($row=mysqli_num_rows($result) > 0){
       $usernameExist=true;
    }
    $sql="select email from users where email=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if($row=mysqli_num_rows($result) > 0){
       $mailExist=true;
    }
    $sql="select mobile from users where mobile=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$mobile);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if($row=mysqli_num_rows($result) > 0){
       $mobileExist=true;
    }
    if(!$usernameExist && !$mailExist && !$mobileExist){

    $sql="insert into users(name,username,email,age,mobile,password) values(?,?,?,?,?,?)";
    $stmt=mysqli_prepare($conn,$sql);
   mysqli_stmt_bind_param($stmt,"ssssss",$name,$username,$email,$age,$mobile,$hashedPass);
    $result=mysqli_stmt_execute($stmt);
    if($result){
        $response=[
            "success"=>true,
             "message"=> "Thank You For Join with Us!"
        ];
    }
    }
    else if($usernameExist){
        $response=[
            "success"=>false,
            "message"=>"Username Exist"
        ];
    }
    else if($mailExist){
         $response=[
            "success"=>false,
            "message"=>"Mail Exist"
        ];
    }
    else if($mobileExist){
         $response=[
            "success"=>false,
            "message"=>"Mobile Exist"
        ];
    }
    }
    echo json_encode($response);
?>