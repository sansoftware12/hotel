<?php
session_start();
include('server.php');
include('function.php');
include('data.php');
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional CSS styles for the About Us page */
        .about-section {
            padding: 8rem 0;
            background-color: #f9fafb;
        }

        .about-heading {
            @apply text-4xl font-bold mb-8;
        }

        .about-text {
            @apply text-gray-700;
            @apply line-height[1.6];
        }

        .team-card {
            @apply bg-white rounded-lg p-8 shadow-lg transition-all duration-300 ease-in-out;
        }

        .team-card:hover {
            @apply transform[-translate-y-1] shadow-md;
        }

        .team-card img {
            @apply object-cover h-40 w-full rounded-t-lg;
        }

        .team-card .team-details {
            @apply py-4;
        }

        .team-card h3 {
            @apply text-xl font-bold mb-2;
        }

        .team-card p {
            @apply text-gray-700;
            @apply line-height[1.4];
        }
    </style>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="main">
        <!-- Navigation Bar -->
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

        <!-- About Section -->
        <section class="about-section">
            <div class="container mx-auto px-4">
                <h1 class="text-center about-heading">About Us</h1>
                <div class="flex flex-col lg:flex-row">
  <div class="lg:w-1/3">
    <img src="img/eldoret.jpg" alt="Side Image" class="h-auto lg:h-full w-full object-cover" />
  </div>
  <div class="lg:w-2/3">
    <p class="text-lg text-gray-800 mb-4">
      Welcome to our hotel booking website. We provide a convenient and reliable platform for you to book the perfect hotel for your next stay. Whether you're traveling for business or pleasure, we have a wide range of hotels to suit your needs.
    </p>
    <p class="text-lg text-gray-800 mb-4">
      Our mission is to make the hotel booking process seamless and hassle-free. We offer a user-friendly interface, detailed hotel information, and secure booking options. With our extensive database of hotels, you can easily find the ideal accommodation that meets your preferences and budget.
    </p>
    <p class="text-lg text-gray-800 mb-4">
      We strive to provide exceptional customer service and ensure your satisfaction throughout the booking process. Our dedicated team is available to assist you with any inquiries or concerns you may have. We value your trust and aim to deliver a seamless and enjoyable hotel booking experience.
    </p>
    <p class="text-lg text-gray-800">
      Thank you for choosing our hotel booking site. We look forward to serving you and making your stay a memorable one.
    </p>
  </div>
</div>


                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Team Member 1 -->
                    <div class="team-card">
                        <img src="team-member-1.jpg" alt="Team Member 1">
                        <div class="team-details">
                            <h3>John Doe</h3>
                            <p>Frontend Developer</p>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="team-card">
                        <img src="team-member-2.jpg" alt="Team Member 2">
                        <div class="team-details">
                            <h3>Jane Smith</h3>
                            <p>Backend Developer</p>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="team-card">
                        <img src="team-member-3.jpg" alt="Team Member 3">
                        <div class="team-details">
                            <h3>Mike Johnson</h3>
                            <p>UI/UX Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
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

        <!-- JavaScript code -->
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
    </div>
</body>

</html>
