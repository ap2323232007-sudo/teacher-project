<?php
session_start();
include "db.php";

if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $class = $_POST['class'];

    $sql = "INSERT INTO students(name,class) VALUES('$name','$class')";
    mysqli_query($conn, $sql);

    echo "<p style='color:green; text-align:center;'>Student Added Successfully!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body{
            margin:0;
            font-family:'Segoe UI',sans-serif;
            background: linear-gradient(135deg,#4facfe,#00f2fe);
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            background:white;
            padding:35px;
            width:400px;
            border-radius:12px;
            box-shadow:0 15px 30px rgba(0,0,0,0.2);
        }

        .card h2{
            text-align:center;
            margin-bottom:20px;
        }

        .card input{
            width:100%;
            padding:12px;
            margin:12px 0;
            border:1px solid #ddd;
            border-radius:8px;
            font-size:14px;
        }

        .card input:focus{
            border-color:#4facfe;
            outline:none;
            box-shadow:0 0 5px rgba(79,172,254,0.4);
        }

        .btn{
            width:100%;
            padding:12px;
            margin-top:10px;
            background:linear-gradient(135deg,#4facfe,#00c6ff);
            color:white;
            border:none;
            border-radius:8px;
            font-size:15px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            transform:scale(1.03);
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
        }

        .back-btn{
            display:inline-block;
            margin-bottom:15px;
            text-decoration:none;
            background:#eee;
            padding:6px 12px;
            border-radius:6px;
            font-size:13px;
            color:#333;
            transition:0.3s;
        }

        .back-btn:hover{
            background:#ddd;
        }
    </style>
</head>

<body>

<div class="card">

    <a href="dashboard.php" class="back-btn">← Back</a>

    <h2>Add Student</h2>

    <form method="POST">

        <input type="text" name="name" placeholder="Enter Student Name" required>
        <input type="text" name="class" placeholder="Enter Class" required>
        <inout type="text" name="id" placeholder="Enter student id"required>

        <button type="submit" name="add" class="btn">Add Student</button>

    </form>

</div>

</body>
</html>