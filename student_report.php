<?php
session_start();
include "db.php";

if(!isset($_SESSION['teacher'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$student = $conn->query("SELECT * FROM students WHERE id='$id'")->fetch_assoc();

$marks_query = $conn->query("
SELECT subject, marks 
FROM marks 
WHERE student_id='$id'
");

$total = 0;
$count = 0;
$date = date("d-m-Y");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Report Card</title>
    <link rel="stylesheet" href="style.css">

<style>
@media print {
    .no-print {
        display: none;
    }
}
.report-header {
    text-align: center;
    margin-bottom: 20px;
}
.signature {
    margin-top: 50px;
    display: flex;
    justify-content: space-between;
}
</style>

</head>
<body>

<div class="container">
<div class="card">

<div class="report-header">
    <h2>ABC Higher Secondary School</h2>
    <h3>Student Report Card</h3>
    <p>Date: <?php echo $date; ?></p>
</div>

<hr>

<p><b>Name:</b> <?php echo $student['name']; ?></p>
<p><b>Class:</b> <?php echo $student['class']; ?></p>

<table>
<tr>
    <th>Subject</th>
    <th>Marks</th>
</tr>

<?php while($row = $marks_query->fetch_assoc()) { 
    $total += $row['marks'];
    $count++;
?>
<tr>
    <td><?php echo $row['subject']; ?></td>
    <td><?php echo $row['marks']; ?></td>
</tr>
<?php } ?>

</table>

<?php
$average = $count > 0 ? $total / $count : 0;

$grade = "F";
if($average >= 90) $grade = "A";
elseif($average >= 75) $grade = "B";
elseif($average >= 50) $grade = "C";
?>

<br>
<h4>Total Marks: <?php echo $total; ?></h4>
<h4>Average: <?php echo round($average,2); ?></h4>
<h4>Final Grade: <?php echo $grade; ?></h4>

<div class="signature">
    <div>
        _____________________<br>
        Class Teacher Signature
    </div>
    <div>
        _____________________<br>
        Principal Signature
    </div>
</div>

<br><br>

<div class="no-print">
    <button onclick="window.print()">Print Report</button>
    <br><br>
    <a href="view_students.php">Back</a>
</div>

</div>
</div>

</body>
</html>