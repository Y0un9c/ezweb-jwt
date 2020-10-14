<?php
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

$key = "Din0";
if (isset($_COOKIE["token"])) {
    $token = $_COOKIE["token"];
    $decoded = JWT::decode($token, $key, array('HS256'));
    $decoded = (array) $decoded;
    $username = $decoded['name'];
    $mark = $decoded['admin'];
    echo "hello ".$username.'<br>';
    if ($mark === true) {
        echo 'great! give you flag'.'<br>';
        $flag =  readfile('/flag');
	echo $flag;
    }
    else {
        echo "but you are not admin,I can't give you flag";
    }
}
else{
    header("location:index.html");
}

?>
