<?php
session_start();
include "db.php";

if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['add'])){
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    $sql = "INSERT INTO marks(student_id, subject1) VALUES('$student_id','$marks')";

    mysqli_query($conn, $sql);

    echo "<p style='color:green; text-align:center;'>Marks Added Successfully!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Marks</title>
    <style>
        body{
            margin:0;
            font-family:'Segoe UI',sans-serif;
            background: linear-gradient(135deg,#667eea,#764ba2);
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
            background:linear-gradient(135deg,#667eea,#764ba2);
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

    <h2>Add Marks</h2>

    <form method="POST">

        <input type="text" name="student_id" placeholder="Enter Student ID" required>
        <input type="text" name="subject" placeholder="Enter Subject Name" required>
        <input type="number" name="marks" placeholder="Enter Marks" required>

        <button type="submit" name="add" class="btn">Add Marks</button>

    </form>

</div>

</body>
</html>