<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for a more modern feel */
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Hide horizontal scrollbar */
        .overflow-x-hidden {
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">To-Do App</h1>
            <div>
                <a href="login.php" class="text-gray-700 hover:text-blue-600 mx-2 transition duration-300">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-7xl mx-auto px-4 py-10 flex flex-col md:flex-row">
            <!-- Add Task Form -->
            <div class="bg-white rounded-lg shadow-xl flex-1 max-w-lg m-2 p-8 flex flex-col justify-center card">
                <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">Add a New Task</h2>
                <form action="add_task.php" method="POST" class="flex space-x-2">
                    <input type="text" name="task" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your task" required>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg">Add Task</button>
                </form>
            </div>

            <!-- Task List -->
            <div class="bg-white rounded-lg shadow-xl flex-1 max-w-lg m-2 p-8 flex flex-col card">
                <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">Your Tasks</h2>
                <div class="flex-1 overflow-y-scroll overflow-x-hidden">
                    <div class="flex justify-between mb-4">
                        <div class="flex items-center">
                            <label for="filter" class="text-gray-600 mr-2">Filter:</label>
                            <select id="filter" class="border border-gray-300 rounded-lg p-2">
                                <option value="all">All Tasks</option>
                                <option value="completed">Completed</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    <ul class="space-y-4">
                        <!-- Example Task Item -->
                        <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg transition-transform transform hover:scale-105 hover:shadow-lg">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-3" id="task1">
                                <label for="task1" class="text-gray-700">Buy groceries</label>
                            </div>
                            <button class="text-red-500 hover:text-red-700 transition duration-300">Delete</button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg transition-transform transform hover:scale-105 hover:shadow-lg">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-3" id="task2">
                                <label for="task2" class="text-gray-700">Walk the dog</label>
                            </div>
                            <button class="text-red-500 hover:text-red-700 transition duration-300">Delete</button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg transition-transform transform hover:scale-105 hover:shadow-lg">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-3" id="task3">
                                <label for="task3" class="text-gray-700">Finish homework</label>
                            </div>
                            <button class="text-red-500 hover:text-red-700 transition duration-300">Delete</button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg transition-transform transform hover:scale-105 hover:shadow-lg">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-3" id="task4">
                                <label for="task4" class="text-gray-700">Call the bank</label>
                            </div>
                            <button class="text-red-500 hover:text-red-700 transition duration-300">Delete</button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 p-4 rounded-lg transition-transform transform hover:scale-105 hover:shadow-lg">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-3" id="task5">
                                <label for="task5" class="text-gray-700">Prepare presentation</label>
                            </div>
                            <button class="text-red-500 hover:text-red-700 transition duration-300">Delete</button>
                        </li>
                        <!-- Add more task items dynamically here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
