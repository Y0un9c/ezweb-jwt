<?php
require('db.php');
error_reporting(0);

$username = $_POST['username'];
$password = $_POST['password'];
$db = new DB();
$sql = "SELECT username FROM users WHERE username='$username'";
$result = $db->conn->query($sql);
if ($result->num_rows > 0) {
    echo "<script> alert('用户已存在');parent.location.href='signUp.html'; </script>";
}
$password = md5($password);
$sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";
if ($db->conn->query($sql) === TRUE) {
    echo "<script> alert('注册成功，即将跳转到登录页面');parent.location.href='index.html'; </script>";
}

?>