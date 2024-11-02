<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Wall</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        // JavaScript to handle sidebar toggle on mobile
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("-translate-x-full");
        }
    </script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <!-- Mobile Header with Sidebar Toggle Button -->
    <header class="bg-white shadow-lg fixed w-full top-0 z-20 md:hidden">
        <div class="flex items-center justify-between px-6 py-4">
            <h1 class="text-2xl font-semibold">My To-Do's</h1>
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg px-6 py-8 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-10">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-semibold">My To-Do's
            </h2>
            <button onclick="toggleSidebar()" class="text-gray-500 md:hidden">
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
                    <a href="#" class="block text-gray-700 hover:text-blue-500 transition">Upcoming</a>
                    <a href="#" class="block text-gray-700 hover:text-blue-500 transition">Today</a>
                    <a href="#" class="block text-gray-700 hover:text-blue-500 transition">Calendar</a>
                    <a href="#" class="block text-gray-700 font-semibold text-blue-500">Sticky Wall</a>
                </div>
            </div>

            <div>
                <h3 class="text-gray-500 uppercase tracking-wide text-xs font-semibold">Lists</h3>
                <div class="mt-3 space-y-2">
                    <a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-500 transition">
                        <span>Personal</span><span class="bg-gray-200 text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>
                    <a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-500 transition">
                        <span>Work</span><span class="bg-gray-200 text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>
                    <a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-500 transition">
                        <span>List 1</span><span class="bg-gray-200 text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>
                    <a href="#" class="text-blue-500 font-semibold hover:underline">+ Add New List</a>
                </div>
            </div>

            <div>
                <h3 class="text-gray-500 uppercase tracking-wide text-xs font-semibold">Tags</h3>
                <div class="mt-3 flex space-x-2">
                    <span class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded-full">Tag 1</span>
                    <span class="px-3 py-1 text-sm bg-pink-100 text-pink-600 rounded-full">Tag 2</span>
                    <span class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-full">+ Add Tag</span>
                </div>
            </div>
        </nav>

        <div class="mt-auto pt-6 border-t">
            <a href="#" class="block text-gray-700 hover:text-blue-500 transition mb-2">Settings</a>
            <a href="login.php" class="block text-gray-700 hover:text-blue-500 transition">Sign out</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-10 pt-20 md:pt-10">
        <h1 class="text-3xl font-semibold mb-6">Sticky Wall</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Sticky Note Card -->
            <div class="p-6 rounded-lg shadow-md bg-yellow-50 hover:shadow-lg transition-shadow">
                <h2 class="text-lg font-semibold text-yellow-800 mb-2">Social Media</h2>
                <ul class="text-gray-700 text-sm space-y-1">
                    <li>- Plan social content</li>
                    <li>- Build content calendar</li>
                    <li>- Plan promotion and distribution</li>
                </ul>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-blue-50 hover:shadow-lg transition-shadow">
                <h2 class="text-lg font-semibold text-blue-800 mb-2">Content Strategy</h2>
                <p class="text-gray-700 text-sm">
                    Need time for insights (goals, personas, budget), then focus on team assembly and brainstorm tooling.
                </p>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-pink-50 hover:shadow-lg transition-shadow">
                <h2 class="text-lg font-semibold text-pink-800 mb-2">Email A/B Tests</h2>
                <ul class="text-gray-700 text-sm space-y-1">
                    <li>- Subject lines</li>
                    <li>- Sender</li>
                    <li>- CTA</li>
                    <li>- Sending times</li>
                </ul>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-orange-50 hover:shadow-lg transition-shadow">
                <h2 class="text-lg font-semibold text-orange-800 mb-2">Banner Ads</h2>
                <ul class="text-gray-700 text-sm space-y-1">
                    <li>- Sizing matters</li>
                    <li>- Choose distinctive imagery</li>
                    <li>- Landing page must match the display ad</li>
                </ul>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors cursor-pointer">
                <span class="text-gray-500 text-3xl font-semibold">+</span>
            </div>
        </div>
    </main>
</body>
</html>
