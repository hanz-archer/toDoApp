<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - My To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="flex w-full max-w-5xl rounded-3xl shadow-lg overflow-hidden">
        <div class="flex-shrink-0 w-1/2 p-10 bg-white" style="min-height: 500px;">
            <h2 class="mb-6 text-4xl font-extrabold text-center text-gray-800">Register</h2>
            <?php
            // Database connection details
            $servername = "localhost";
            $username = "root"; // Change if necessary
            $password = ""; // Default is often empty for XAMPP
            $dbname = "todo_app";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Handle form submission
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $password);

                if ($stmt->execute()) {
                    echo "<p class='mb-4 text-green-600 text-center font-semibold'>Registration Successful!</p>";
                } else {
                    echo "<p class='mb-4 text-red-600 text-center font-semibold'>Error: " . $stmt->error . "</p>";
                }

                // Close statement
                $stmt->close();  
            }

            // Close connection
            $conn->close();
            ?>

            <form action="" method="POST">
                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-300 ease-in-out" placeholder="Enter your username" required>
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-300 ease-in-out" placeholder="Enter your email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-300 ease-in-out" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="w-full px-4 py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out transform hover:scale-105">Register</button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-700">Already have an account? <a href="login.php" class="text-blue-600 hover:underline font-semibold transition duration-300">Log in</a></p>
            </div>
        </div>

        <div class="flex-shrink-0 w-1/2 bg-cover bg-center rounded-r-3xl" style="background-image: url('images/bg.png');">
        </div>
    </div>
</body>
</html>
