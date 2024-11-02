<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="flex w-full max-w-5xl rounded-3xl shadow-lg overflow-hidden">
        <div class="flex-shrink-0 w-1/2 p-10 bg-white" style="min-height: 500px;">
            <h2 class="mb-6 text-4xl font-extrabold text-center text-gray-800">Log In</h2>

            <?php
            // Database connection 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "todo_app";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);     
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
                $stmt->bind_param("ss", $username, $username);
                $stmt->execute();
                
                $result = $stmt->get_result();
                $message = '';
                $icon = '';
                $redirectUrl = 'home.php'; // Update this to your actual homepage URL

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();

                    if (password_verify($password, $user["password"])) {
                        $message = 'Login successful!';
                        $icon = 'success';
                        // Trigger SweetAlert with redirect
                        echo "<script>
                            Swal.fire({
                                title: '" . addslashes($message) . "',
                                icon: '" . $icon . "',
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '" . $redirectUrl . "';
                                }
                            });
                        </script>";
                    } else {
                        $message = 'Invalid username or password';
                        $icon = 'error';
                    }
                } else {
                    $message = 'Invalid username or password';
                    $icon = 'error';
                }

                $stmt->close();
                $conn->close();

                // Trigger SweetAlert for error cases
                if ($icon === 'error') {
                    echo "<script>
                        Swal.fire({
                            title: '" . addslashes($message) . "',
                            icon: '" . $icon . "',
                            confirmButtonText: 'Okay'
                        });
                    </script>";
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
