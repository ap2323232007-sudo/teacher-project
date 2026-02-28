<?php
session_start();
include "db.php";

if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

$total_students = $conn->query("SELECT COUNT(*) as total FROM students")->fetch_assoc()['total'];
$total_marks = $conn->query("SELECT COUNT(*) as total FROM marks")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">
    <h2>Teacher Panel</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_student.php">Add Student</a>
    <a href="view_students.php">View Students</a>
    <a href="add_marks.php">Add Marks</a>
    <a href="view_marks.php">View Results</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">

<div class="header">
    <h2>Welcome, <?php echo $_SESSION['teacher']; ?></h2>
</div>

<div class="cards">
    <div class="card">
        <h3><?php echo $total_students; ?></h3>
        <p>Total Students</p>
    </div>

    <div class="card">
        <h3><?php echo $total_marks; ?></h3>
        <p>Total Marks Records</p>
    </div>
</div>

</div>

</body>
</html>