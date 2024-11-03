<?php
include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $color = $_POST['color'];

    $stmt = $conn-> prepare("INSERT INTO sticky_notes (title, content, color) VALUES (?, ?, ?)");
    $stmt->execute([$title, $content, $color]);

    header("Location: home.php");
    exit();
}