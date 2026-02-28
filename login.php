<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM teachers WHERE username='$username'");
    $row = $result->fetch_assoc();

    if($row && password_verify($password,$row['password'])){
        $_SESSION['teacher']=$username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid Login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
body{
    margin:0;
    font-family: Arial;
    background: linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.login-box{
    background:white;
    padding:40px;
    border-radius:10px;
    width:300px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
.login-box h2{
    margin-bottom:20px;
}
.login-box input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
}
.login-box button{
    width:100%;
    padding:10px;
    background:#667eea;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
.login-box button:hover{
    background:#5563c1;
}
</style>
<style>
body{
    margin:0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.login-box{
    background:white;
    padding:40px;
    border-radius:10px;
    width:350px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.login-box h2{
    margin-bottom:25px;
    font-size:24px;
    color:#333;
}

.login-box input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
}

.login-box button{
    width:100%;
    padding:10px;
    background:#667eea;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

.login-box button:hover{
    background:#5563c1;
}
</style>
</head>
<body>
<div class="login-box">
    <h2>Teacher Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>
</div>
</body>
</html>