<?php
require_once "db.php";

$RigName = isset($_POST['RigName']) ? $_POST['RigName'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

$sqlInsert = "INSERT INTO scheduler (RigName,start,end) VALUES ('".$title."','".$start."','".$end ."')";

$result = mysqli_query($conn, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}
?>