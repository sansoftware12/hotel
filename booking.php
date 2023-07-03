

<?php
session_start();
include('server.php');
include('function.php');
include('data.php');
$user_data = check_login($con);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "select * from login where email = '$email' limit 1";
        $result = mysqli_query($con, $query);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] == $password) {
                    $_SESSION['email'] = $user_data['email'];
                    header("Location: home.php");
                    die;
                }
            }
        }
        echo '<script>alert("wrong username or password")</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .src {
            width: 200px;
        }

        .btn {
            padding: 0.5rem 1rem;
        }

        .btn2 {
            padding: 0.5rem 1rem;
            background-color: #e53e3e;
        }

        .nms {
            margin-left: 1rem;
        }

        .navbar {
            transition: background-color 0.3s ease;
        }

        .scrolled {
            background-color: #333;
        } 
        body {
      min-height: 100vh;
    }
    </style>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="main">
        <nav id="navbar" class="navbar bg-gray-800 py-4 px-6 fixed w-full top-0 z-10">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center">
                    <a href="#" class="text-lg font-semibold text-white mr-4">Logo</a>
                    <a href="home.php" class="text-white hover:text-gray-300 mr-4">Home</a>
                    <a href="service.php" class="text-white hover:text-gray-300 mr-4">Services</a>
                    <a href="booking.php" class="text-white hover:text-gray-300 mr-4">Booking</a>
                    <a href="aboutus.php" class="text-white hover:text-gray-300 mr-4">About</a>
                    <a href="contactus.php" class="text-white hover:text-gray-300 mr-4">Contact</a>

                </div>
                <div class="flex items-center">
                    <span class="text-gray-300 text-sm mr-2">Logged in as:
                        <?php echo $user_data['name1']; ?>
                    </span>
                    <input type="text" placeholder="Search"
                        class="px-4 py-2 rounded-lg bg-gray-700 text-white focus:outline-none focus:bg-gray-600">
                </div>
            </div>
        </nav>

        <div class="content mt-8 mx-4 min-h-screen min-w-full">
        <h1 class="text-3xl text-center font-bold mb-6 mt-24">Hotel Booking</h1>
        <div class="w-full justify-center flex items-center content-center">

            <form class="w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-700" method="POST"
            action="handlebooking.php">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300" for="name">
                    Name:
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-gray-200"
                    id="name" name="name" type="text" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300" for="email">
                    Email:
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-gray-200"
                    id="email" name="email" type="email" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300" for="checkin">
                    Check-in Date:
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-gray-200"
                    id="checkin" name="checkin" type="date" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300" for="checkout">
                    Check-out Date:
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-gray-200"
                    id="checkout" name="checkout" type="date" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300" for="roomtype">
                    Room Type:
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-gray-200"
                    id="roomtype" name="roomtype" required>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <div class="flex items-center justify-center mt-6">
                <button
                    class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-700 dark:hover:bg-blue-900"
                    type="submit">
                    Book Now
                </button>
            </div>
        </form>
            </div>
        </div>
    </div>
    <footer class="bg-black py-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <h3 class="text-xl font-bold mb-2 text-white">Hotel Booking</h3>
                    <p class="text-gray-400">Book the perfect hotel for your next stay.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2 text-white">Contact</h3>
                    <ul class="text-gray-400">
                        <li>123 Main Street</li>
                        <li>City, Country</li>
                        <li>Phone: 123-456-7890</li>
                        <li>Email: info@example.com</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2 text-white">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-gray-700 my-6">
            <p class="text-center text-gray-400">© 2023 Hotel Booking. All rights reserved.</p>
        </div>
    </footer>
    <script>
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.pageYOffset > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>