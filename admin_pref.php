<?php 
    session_start();
    $temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query="SELECT * FROM preferences ORDER BY destination";
    
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
    <h1>Preference of the Users</h1>
    <br><br>

    <table style="width:100%">
    <tr>
        <td>User-ID</td>
        <td>Budget</td>
        <td>Duration</td>
        <td>Destination</td>
    </tr>
    
    
        <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td>  <?php echo $row['uid']?></td>
            <td>  <?php echo $row['budget']?></td>
            <td>  <?php echo $row['duration']?></td>
            <td>  <?php echo $row['destination']?></td>
           
    </tr>
    
            <?php
            }
        ?>
        </table>

</body>
</html>