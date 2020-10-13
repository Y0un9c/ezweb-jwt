<?php
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;
require('db.php');


$username = $_POST['username'];
$password = $_POST['password'];
$key = "abc123";
$flag = false;
$db = new DB();

$sql = "SELECT password FROM users WHERE username='$username'";
$result = $db->conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (md5($password) === $row['password']) {
        if ($username === 'admin') {
            $flag = true;
        }
        $payload = array(
            "name" => $username,
            "admin" => $flag
        
        );
        $jwt = JWT::encode($payload,$key);
        setcookie("token", $jwt);
        header("location:index.php");
    }
}
else{
    echo "<script> alert('用户名或密码错误');parent.location.href='index.html'; </script>";
}
        

?>