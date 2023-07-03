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

        <div class="content mt-8 mx-4 min-h-screen">
            <h1 class="text-4xl font-bold mb-8">Hotel Services</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="service flex flex-col items-center justify-center bg-white rounded-lg p-8 shadow-lg">
                    <img src="img/foodie.jpg" alt="Room Service" class="h-16 w-16 mb-4">
                    <h2 class="text-xl font-bold mb-2">Food Reception</h2>
                    <p class="text-gray-700 text-center">Enjoy delicious meals and snacks delivered to your room.</p>
                </div>
                <div class="service flex flex-col items-center justify-center bg-white rounded-lg p-8 shadow-lg">
                    <img src="img/spa.jpg" alt="Spa" class="h-16 w-16 mb-4">
                    <h2 class="text-xl font-bold mb-2">Spa</h2>
                    <p class="text-gray-700 text-center">Relax and rejuvenate with a variety of spa treatments.</p>
                </div>
                <div class="service flex flex-col items-center justify-center bg-white rounded-lg p-8 shadow-lg">
                    <img src="img/gym.jpg" alt="Fitness Center" class="h-16 w-16 mb-4">
                    <h2 class="text-xl font-bold mb-2">Fitness Center</h2>
                    <p class="text-gray-700 text-center">Stay active in our state-of-the-art fitness center.</p>
                </div>
                <div class="service flex flex-col items-center justify-center bg-white rounded-lg p-8 shadow-lg">
                    <img src="fitness-icon.png" alt="Fitness Center" class="h-16 w-16 mb-4">
                    <h2 class="text-xl font-bold mb-2">Fitness Center</h2>
                    <p class="text-gray-700 text-center">Stay active in our state-of-the-art fitness center.</p>
                </div>
                <div class="service flex flex-col items-center justify-center bg-white rounded-lg p-8 shadow-lg">
                    <img src="fitness-icon.png" alt="Fitness Center" class="h-16 w-16 mb-4">
                    <h2 class="text-xl font-bold mb-2">Fitness Center</h2>
                    <p class="text-gray-700 text-center">Stay active in our state-of-the-art fitness center.</p>
                </div>
                <div class="service flex flex-col items-center justify-center bg-white rounded-lg p-8 shadow-lg">
                    <img src="fitness-icon.png" alt="Fitness Center" class="h-16 w-16 mb-4">
                    <h2 class="text-xl font-bold mb-2">Fitness Center</h2>
                    <p class="text-gray-700 text-center">Stay active in our state-of-the-art fitness center.</p>
                </div>
                <div class="service flex flex-col items-center justify-center bg-white rounded-lg p-8 shadow-lg">
                    <img src="fitness-icon.png" alt="Fitness Center" class="h-16 w-16 mb-4">
                    <h2 class="text-xl font-bold mb-2">Fitness Center</h2>
                    <p class="text-gray-700 text-center">Stay active in our state-of-the-art fitness center.</p>
                </div>
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