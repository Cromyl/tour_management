<?php 
    //session_start();
    //$temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query2="SELECT * FROM trip ORDER BY tripid";
    $query="SELECT * FROM plan ORDER BY planid";
    $result=mysqli_query($conn,$query);
    $result2=mysqli_query($conn,$query2);
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
        <!-- <h1>Plan Page</h1>   -->
        <h3>Your Existing Plans</h3>
        <table style="width:100%">
        <tr>
            <td>Plan Id</td>
            <td>Plan Name</td>
            <td>Total Cost</td>
            <td>Duration</td>
        </tr>      
            <?php
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td>   <?php echo $row['planid']?></td>
                <td>  <?php echo $row['planname']?></td>
                <td>  <?php echo $row['duration']?></td>
                <td>  <?php echo $row['cost']?></td>
        </tr>
        
                <?php
                }
            ?>
            </table>
            <h3>Trips</h3>
            <table>
                <tr>
                    <td>Trip Id</td>
                    <td>Trip Destination</td>
                </tr>
    
                <?php
                    while($row2=mysqli_fetch_assoc($result2)){
    
                ?>
                <tr>
                    <td><?php echo $row2['tripid']?></td>
                    <td><?php echo $row2['city']?></td>
                </tr>
                <?php
                }
            ?>
            </table>    
            <form action="buildplan_entry.php" method="post">
            <h3>Build new Plan</h3>
            <label for="">Plan Name:</label><br>
            <input type="text" id="planname" name="planname">
            <br>
            <label for="">Cost:</label><br>
            <input type="number" id="cost" name="cost">
            <br>
            <label for="">Duration:</label><br>
            <input type="number" id="duration" name="duration">
            <br>
            <label for="">Trip#1:</label><br>
            <input type="number" id="trip1" name="trip1">
            <br>
            <label for="">Trip#2:</label><br>
            <input type="number" id="trip2" name="trip2">
            <br>
            <input type="submit" name="submit1" id="submit1">
            </form>
        
    </div>
</body>
</html>