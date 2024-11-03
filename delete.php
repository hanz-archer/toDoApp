<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM sticky_notes WHERE id = ?");
$stmt->execute([$id]);

header("Location: home.php");
exit();