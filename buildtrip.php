<?php 
    //session_start();
    //$temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query="SELECT * FROM trip ORDER BY tripid";
    $result=mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trips</h1>

    <br>
    <h3>Existing Trips</h3>
    <br>
    <table style="width:100%">
    <tr>
        <td>Trip Id</td>
        <td>City</td>
        <td>Hotel</td>
        <td>Travel Via</td>
    </tr>
    
    
        <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td>  <?php echo $row['tripid']?></td>
            <td>  <?php echo $row['city']?></td>
            <td>  <?php echo $row['hotel']?></td>
            <td>  <?php echo $row['travelvia']?></td>
           
    </tr>
    
            <?php
            }
        ?>
        </table>
        <form action="trip_entry.php" method="post">
        <h3>Build Trips</h3>
        <label for="">Travel Destination:</label><br>
        <input type="text" id="city" name="city">
        <br><br>
        <label for="">Lodging Hotel:</label><br>
        <input type="text" id="hotel" name="hotel">
        <br><br>
        <label for="">Travel Via:</label><br>
        <input type="text" id="travelvia" name="travelvia">
        <br><br>
        <input type="submit" name="submit1" id="submit1">
        </form>
    
</body>
</html>