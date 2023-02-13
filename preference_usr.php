<?php 
    session_start();
    $temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query="SELECT * FROM preferences WHERE uid='$temp'";
    $result=mysqli_query($conn,$query);
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

        <h1>Preference page</h1>
        <hr>
        <h2>Your preferences</h2>
        <br>
        <table style="width: 70%">
        <tr>
            <td>Budget</td>
            <td>Duration</td>
            <td>Destination</td>
        </tr>
        
        
        <?php
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td><?php echo $row['budget']?></td>
                    <td><?php echo $row['duration']?></td>
                    <td><?php echo $row['destination']?></td>
                
            </tr>
            
            <?php
                }
                ?>
            </table>
            <hr>
            <form action="preference_entry.php" method="post">
                <h3>Insert Preferences</h3>
            <label for="">Probable Budget:</label><br>
            <input type="number" id="budget" name="budget">
            <br><br>
            <label for="">Probable Duration:</label><br>
            <input type="number" id="duration" name="duration">
            <br><br>
            <label for="">Probable Destination:</label><br>
            <input type="text" id="destination" name="destination">
            <br><br>
            <input type="submit" name="submit1" id="submit1">
            </form>
    </div>
    
</body>
</html>