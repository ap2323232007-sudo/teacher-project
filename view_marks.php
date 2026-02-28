<?php
session_start();
include "db.php";

if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

$query = "
SELECT students.id, students.name, students.class,
       SUM(marks.marks) as total_marks,
       AVG(marks.marks) as avg_marks
FROM marks
JOIN students ON marks.student_id = students.id
GROUP BY students.id
";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">Student Result Summary</div>

<div class="container">
<div class="card">

<table>
<tr>
    <th>Name</th>
    <th>Class</th>
    <th>Total Marks</th>
    <th>Average</th>
    <th>Grade</th>
</tr>

<?php while($row = $result->fetch_assoc()) { 
    $grade = "F";
    if($row['avg_marks'] >= 90) $grade = "A";
    elseif($row['avg_marks'] >= 75) $grade = "B";
    elseif($row['avg_marks'] >= 50) $grade = "C";
?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['class']; ?></td>
    <td><?php echo $row['total_marks']; ?></td>
    <td><?php echo round($row['avg_marks'],2); ?></td>
    <td><?php echo $grade; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</div>
</div>

</body>
</html>