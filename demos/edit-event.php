<?php
require_once "db.php";

$id = $_POST['id'];
$RigName = $_POST['RigName'];
$start = $_POST['start'];
$end = $_POST['end'];

$sqlUpdate = "UPDATE scheduler SET RigName='" . $RigName . "',start='" . $start . "',end='" . $end . "' WHERE id=" . $id;
mysqli_query($conn, $sqlUpdate)
mysqli_close($conn);

?>