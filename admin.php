<?php 
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query1="SELECT COUNT(*) FROM client";
    $query2="SELECT COUNT(*) FROM userplan";
    $query3="SELECT COUNT(*) FROM plan";
    $result1=mysqli_query($conn,$query1);
    $result2=mysqli_query($conn,$query2);
    $result3=mysqli_query($conn,$query3);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bgimg"></div>
    <div class="bgtext">
    <h1>Admin Side</h1>
     <hr>
    <h2>Registered users = <?php echo mysqli_fetch_assoc($result1)['COUNT(*)'];?></h2><hr>
    <h2>Bookings = <?php echo mysqli_fetch_assoc($result2)['COUNT(*)'];?></h2><hr>
    <h2>Packages = <?php echo mysqli_fetch_assoc($result3)['COUNT(*)'];?></h2><hr>
    

    <a href="admin_pref.php">Preferences of users</a><br>
    <a href="buildtrip.php">Build Trip</a><br>
    <a href="buildplan.php">Build Plan</a><br>
    <a href="users_in_a_plan.php">People in a PLan</a><br>
    <a href="complete_plan.php">Plan Completed</a><br>
</div>
</body>
</html>