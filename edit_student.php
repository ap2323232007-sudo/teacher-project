<?php
session_start();
include "db.php";

if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id='$id'");
$row = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $class = $_POST['class'];

    $conn->query("UPDATE students SET name='$name', class='$class' WHERE id='$id'");
    header("Location: view_students.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">Edit Student</div>

<div class="container">
<div class="card">

<form method="POST">
<input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
<input type="text" name="class" value="<?php echo $row['class']; ?>" required><br><br>
<button name="update">Update</button>
</form>

</div>
</div>

</body>
</html>