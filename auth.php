<?php
$login = filter_var(trim($_POST['login'],FILTER_SANITIZE_STRING));
$pass = filter_var(trim($_POST['pass'],FILTER_SANITIZE_STRING));
$pass = md5($pass."fgjaldjvndj57fja8934");
$mysqli = new mysqli('localhost','root','','autorization');
$result = $mysqli->query("SELECT * FROM users WHERE login = '$login' AND pass = '$pass'");
$user = $result->fetch_assoc();
if (count($user) == 0) {
    echo "Такой пользователь не найден";
    exit();
}
setcookie('login',$user['login'],time()+3600,'/');
setcookie('user',$user['name'],time()+3600,'/');
$mysqli->close();
header("Location:/index.php");



