<?php 
    session_start();
    $temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    
    $query="SELECT planid  FROM userplan WHERE userid='$temp'";
    $result=mysqli_query($conn,$query);
    //print_r($result);
    $temppp=mysqli_fetch_assoc($result);
    @$tempp=$temppp['planid'];
    //echo 'Temppp'.$tempp;
    $query2="SELECT * FROM tripsinplan NATURAL JOIN trip WHERE planid='$tempp'";
    $result2=mysqli_query($conn,$query2);
    $query3="SELECT * FROM plan WHERE planid='$tempp'";
    $result3=mysqli_query($conn,$query3);
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

    <h1>Plan Details</h1>
    <br>
    <br>
    <h2>Plan Name :</h2>
    <h3><?php @$row=mysqli_fetch_assoc($result3);
                if($row!=NULL)
              echo $row['planname'];  ?></h3>

    <br>
    <h2>Duration :</h2>
    <h3><?php if($row!=NULL) echo $row['duration'];   ?> days</h3>

    <br>
    <h2>Total Cost :</h2>
    <h3><?php if($row!=NULL) echo $row['cost'];?></h3>

    <table style="width:100%">

    <tr>
        <td>Location</td>
        <td>Hotel</td>
        <td>Travel Via</td>
    </tr>

    <?php
            while($row2=mysqli_fetch_assoc($result2)){
            ?>
            <tr>
            <td>   <?php echo $row2['city']?></td>
            <td>  <?php echo $row2['hotel']?></td>
            <td>  <?php echo $row2['travelvia']?></td>
            
           
    </tr>
    
            <?php
            }
        ?>

    </table>

    
</body>
</html>