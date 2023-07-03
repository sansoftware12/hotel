<?php
session_start();
include('server.php');
include('function.php');
    $user_data = check_login($con);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  //something was posted
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($email) && !empty($password) && !is_numeric($email))
  {
    $query = "select * from login where email = '$email' limit 1";
    $result = mysqli_query($con, $query);
    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] == $password)
            {
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
    <title>hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h1 class="logo">Hotel</h1>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="booking.php">Booking </a>
                    </li>
                    
                    <li>
                        <a href='service.php'>Services</a>
                    </li>
                    <li>
                        <a href="aboutus.php">About</a>
                    </li>
                    <li>
                        <a href="contactus.php">Contact</a>
                    </li>
                    
                    
                </ul>
            </div>
            <div class="search">
            <form action="" method="GET">
            <input class="src" type="text" name="nhotel" value="<?php if(isset($_GET['nhotel'])){echo $_GET['nhotel'];} ?>">
                <button type="submit" class="btn">Search</button>
                </form>
            </div>
            <button class="btn2"> <a style="color: white; " href="index.php">Logout</a></button>
        </div>
        <div class="content">
            <?php 
            $con = mysqli_connect("localhost","root","","hotel");
            if(isset($_GET['nhotel']))
            {
                $nhotel = $_GET['nhotel'];
                $query = "SELECT * FROM booking WHERE nhotel='$nhotel'";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        // echo $row['nhotel'];
                        ?>
            <form action="" class="signupform">
            <label for="">Hotel</label></br>
            <input type="text" placeholder="hotel name" name="nhotel" value="<?= $row['nhotel'];?>"/></br>
            <label for="">Location</label></br>
            <input type="text" placeholder="Location" name="hlocation" value="<?= $row['hlocation'];?>"/></br>
            <label for="">Contact Person</label></br>
            <input type="text" placeholder="contact person" name="contactp" value="<?= $row['contactp'];?>"/></br>
            <label for="">Mobile Number</label></br>
            <input type="text" placeholder="Mobile Number" name="mobno" value="<?= $row['mobno'];?>"/></br>
            <label for="">Email</label></br>
            <input type="email" placeholder="email" name="email" value="<?= $row['email'];?>"/></br>
           </form>
           <?php 

                    }
                }
                else
                {
                    echo '<script> alert("No hotel found")</script>';
                }
            }
            ?>
           
        </div>
    </div>
</body>
</html>