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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-900">
    <main class="flex items-center justify-center min-h-screen p-6 bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300">
        <div class="w-full max-w-md bg-white p-10 rounded-2xl shadow-lg transform hover:shadow-2xl transition duration-300">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Edit Note</h1>
            <form method="POST">
                <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
                <input type="text" name="title" id="title" value="<?= htmlspecialchars($note['title']) ?>" 
                       required class="w-full px-4 py-3 mb-6 rounded-lg border border-gray-300 focus:border-blue-400 focus:ring-2 focus:ring-blue-200 transition duration-200">
                
                <label class="block text-gray-700 font-medium mb-2" for="content">Content</label>
                <textarea name="content" id="content" required 
                          class="w-full px-4 py-3 mb-6 rounded-lg border border-gray-300 focus:border-blue-400 focus:ring-2 focus:ring-blue-200 transition duration-200"><?= htmlspecialchars($note['content']) ?></textarea>
                
                <label class="block text-gray-700 font-medium mb-2" for="color">Color</label>
                <select name="color" id="color" required 
                        class="w-full px-4 py-3 mb-8 rounded-lg border border-gray-300 focus:border-blue-400 focus:ring-2 focus:ring-blue-200 transition duration-200">
                    <option value="bg-yellow-100" <?= $note['color'] == 'bg-yellow-100' ? 'selected' : '' ?>>Yellow</option>
                    <option value="bg-blue-100" <?= $note['color'] == 'bg-blue-100' ? 'selected' : '' ?>>Blue</option>
                    <option value="bg-pink-100" <?= $note['color'] == 'bg-pink-100' ? 'selected' : '' ?>>Pink</option>
                    <option value="bg-orange-100" <?= $note['color'] == 'bg-orange-100' ? 'selected' : '' ?>>Orange</option>
                </select>
                
                <button type="submit" 
                        class="w-full bg-blue-500 text-white px-5 py-3 font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-200">Save Changes</button>
            </form>
        </div>
    </main>
</body>
</html>
