<?php
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

$key = "abc123";
if (isset($_COOKIE["token"])) {
    $token = $_COOKIE["token"];
    $decoded = JWT::decode($token, $key, array('HS256'));
    $decoded = (array) $decoded;
    $username = $decoded['name'];
    echo "hello ".$username.'<br>';
    if ($username === "admin") {
        echo 'great! give you flag';
        echo require('/flag');
    }
    else {
        echo "but you are not admin,I can't give you flag";
    }
}
else{
    header("location:index.html");
}

?>