<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Wall</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <?php include 'db.php'; ?>
    <script>
        // JavaScript to handle sidebar toggle on mobile
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("-translate-x-full");
        }
    </script>
</head>
<body class="bg-gray-100 font-sans text-gray-900">
    <header class="bg-white shadow-md fixed w-full top-0 z-20 md:hidden">
        <div class="flex items-center justify-between px-6 py-4">
            <h1 class="text-2xl font-semibold">My To-Do's</h1>
            <button onclick="toggleSidebar()" class="text-gray-600 hover:text-blue-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
        </div>
    </header>
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg px-6 py-8 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-10">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-semibold">My To-Do's</h2>
            <button onclick="toggleSidebar()" class="text-gray-600 md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <input type="text" placeholder="Search" class="w-full p-3 rounded-lg border border-gray-300 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <nav class="space-y-6">
            <div>
                <h3 class="text-gray-500 uppercase tracking-wide text-xs font-semibold">Tasks</h3>
                <div class="mt-3 space-y-2">
                    <a href="#" class="block text-gray-800 hover:text-blue-500 transition">Upcoming</a>
                    <a href="#" class="block text-gray-800 hover:text-blue-500 transition">Today</a>
                    <a href="#" class="block text-gray-800 hover:text-blue-500 transition">Calendar</a>
                    <a href="#" class="block text-blue-600 font-semibold">Sticky Wall</a>
                </div>
            </div>

            <div>
                <h3 class="text-gray-500 uppercase tracking-wide text-xs font-semibold">Lists</h3>
                <div class="mt-3 space-y-2">
                    <a href="#" class="flex items-center justify-between text-gray-800 hover:text-blue-500 transition">
                        <span>Personal</span><span class="bg-blue-100 text-blue-600 text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>
                    <a href="#" class="flex items-center justify-between text-gray-800 hover:text-blue-500 transition">
                        <span>Work</span><span class="bg-blue-100 text-blue-600 text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>
                    <a href="#" class="flex items-center justify-between text-gray-800 hover:text-blue-500 transition">
                        <span>List 1</span><span class="bg-blue-100 text-blue-600 text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">+ Add New List</a>
                </div>
            </div>

            <div>
                <h3 class="text-gray-500 uppercase tracking-wide text-xs font-semibold">Tags</h3>
                <div class="mt-3 flex space-x-2">
                    <span class="px-3 py-1 text-sm bg-blue-200 text-blue-600 rounded-full">Tag 1</span>
                    <span class="px-3 py-1 text-sm bg-pink-200 text-pink-600 rounded-full">Tag 2</span>
                    <span class="px-3 py-1 text-sm bg-gray-200 text-gray-600 rounded-full">+ Add Tag</span>
                </div>
            </div>
        </nav>

        <div class="mt-auto pt-6 border-t">
            <a href="#" class="block text-gray-800 hover:text-blue-500 transition mb-2">Settings</a>
            <a href="login.php" class="block text-gray-800 hover:text-blue-500 transition">Sign out</a>
        </div>
    </aside>
    <main class="md:ml-64 p-10 pt-20 md:pt-10">
        <h1 class="text-4xl font-semibold mb-6">Sticky Wall</h1>
                <form method="POST" action="create.php" class="mb-8">
            <input type="text" name="title" placeholder="Note Title" required class="p-2 rounded-lg border mb-4 w-full">
            <textarea name="content" placeholder="Note Content" required class="p-2 rounded-lg border mb-4 w-full"></textarea>
            <select name="color" class="p-2 rounded-lg border mb-4 w-full" required>
                <option value="bg-yellow-100">Yellow</option>
                <option value="bg-blue-100">Blue</option>
                <option value="bg-pink-100">Pink</option>
                <option value="bg-orange-100">Orange</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Note</button>
        </form>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
                $stmt = $conn->query("SELECT * FROM sticky_notes ORDER BY created_at DESC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='p-6 rounded-lg shadow-lg {$row['color']} hover:shadow-xl transition-shadow'>";
                    echo "<h2 class='text-lg font-semibold text-gray-800 mb-2'>{$row['title']}</h2>";
                    echo "<p class='text-gray-700 text-sm'>{$row['content']}</p>";
                    echo "<div class='flex space-x-2 mt-4'>";
                    echo "<a href='edit.php?id={$row['id']}' class='text-blue-600'>Edit</a>";
                    echo "<a href='delete.php?id={$row['id']}' class='text-red-600'>Delete</a>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </main>
</body>
</html>
