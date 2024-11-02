<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 to-purple-200">
    <div class="w-full max-w-md p-8 bg-white border border-gray-200 rounded-xl shadow-xl transform transition duration-500 hover:shadow-2xl">
        <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">My To-Do App</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == 'user' && $password == 'password') {
                echo "<p class='mb-4 text-green-600 text-center font-semibold'>Login successful!</p>";
            } else {
                echo "<p class='mb-4 text-red-600 text-center font-semibold'>Invalid username or password</p>";
            }
        }
        ?>
        <form action="" method="POST">
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username or Email</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:border-blue-400 focus:ring focus:ring-blue-200 transition duration-300 ease-in-out" placeholder="Enter your username or email" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:border-blue-400 focus:ring focus:ring-blue-200 transition duration-300 ease-in-out" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="w-full px-4 py-3 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 transition duration-300 ease-in-out">Login</button>
        </form>
        <div class="mt-6 text-center">
            <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
        </div>
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-700">Don’t have an account? <a href="#" class="text-blue-500 hover:underline font-semibold">Sign up</a></p>
        </div>
    </div>
</body>
</html>
