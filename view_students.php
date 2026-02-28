<?php
session_start();
include "db.php";

if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        body{
            font-family:'Segoe UI',sans-serif;
            background:#f4f6f9;
            padding:20px;
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

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:8px;
            overflow:hidden;
        }

        th, td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #ddd;
        }

        th{
            background:#667eea;
            color:white;
        }

        tr:nth-child(even){
            background:#f1f2f6;
        }
    </style>
</head>

<body>

<a href="dashboard.php" class="back-btn">← Back to Dashboard</a>

<h2>View Students</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
    </tr>
    <?php while($row=mysqli_fetch_assoc($result)){ ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['class']; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>