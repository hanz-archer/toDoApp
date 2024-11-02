<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="flex w-full max-w-5xl rounded-3xl shadow-lg overflow-hidden">
        <div class="flex-shrink-0 w-1/2 p-10 bg-white" style="min-height: 500px;">
            <h2 class="mb-6 text-4xl font-extrabold text-center text-gray-800">Log In</h2>

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
                    <input type="text" id="username" name="username" class="w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-300 ease-in-out" placeholder="Enter your username or email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-300 ease-in-out" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="w-full px-4 py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out transform hover:scale-105">Log In</button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-700">Don't have an account? <a href="register.php" class="text-blue-600 hover:underline font-semibold transition duration-300">Register</a></p>
            </div>
            <div class="mt-4 text-center">
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline transition duration-300">Forgot Password?</a>
            </div>
        </div>

        <div class="flex-shrink-0 w-1/2 bg-cover bg-center rounded-r-3xl" style="background-image: url('images/bg.png');">
        </div>
    </div>
</body>
</html>