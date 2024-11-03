<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM sticky_notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $color = $_POST['color'];

    $stmt = $conn->prepare("UPDATE sticky_notes SET title = ?, content = ?, color = ? WHERE id = ?");
    $stmt->execute([$title, $content, $color, $id]);

    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Note</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="title" value="<?= $note['title'] ?>" required>
        <textarea name="content" required><?= $note['content'] ?></textarea>
        <select name="color" required>
            <option value="bg-yellow-100" <?= $note['color'] == 'bg-yellow-100' ? 'selected' : '' ?>>Yellow</option>
            <option value="bg-blue-100" <?= $note['color'] == 'bg-blue-100' ? 'selected' : '' ?>>Blue</option>
            <option value="bg-pink-100" <?= $note['color'] == 'bg-pink-100' ? 'selected' : '' ?>>Pink</option>
            <option value="bg-orange-100" <?= $note['color'] == 'bg-orange-100' ? 'selected' : '' ?>>Orange</option>
        </select>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
