<?php 
    session_start();
    $temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query="SELECT * FROM plan";
   // echo 'User id = '.$temp;
    $query2="SELECT * FROM plan NATURAL JOIN userplan WHERE userid='$temp'";
    $result=mysqli_query($conn,$query);
    $result2=mysqli_query($conn,$query2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Plan</title>
</head>
<body>
    <h1>Select PLan Page</h1>

    <br>

    <h3>Available PLans</h3>
    <br>

    <table style="width:100%">

    <tr>
    <td>Plaan Id</td>
        <td>Plan Name</td>
        <td>Duration</td>
        <td>Total Cost</td>
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

<br>

<h3>Opted PLan</h3>

<table style="width:100%">
    <tr>
        
        <td>Plaan Id</td>
        <td>Plan Name</td>
        <td>Duration</td>
        <td>Total Cost</td>
        
    </tr>

    <?php 
    $count=0;
        while($row2=mysqli_fetch_assoc($result2)){
            $count++;
            ?>
            
            <tr>
                <td><?php echo $row2['planid']?></td>
                <td>  <?php echo $row2['planname']?></td>
            <td>  <?php echo $row2['duration']?></td>
            <td>  <?php echo $row2['cost']?></td>
            </tr>
            <?php
        }
    ?>
</table>

<br>

<?php
    //echo 'Count = '.$count;
    if($count==1){
        ?>
        <h3>Cancel Plan</h3>
        <form action="delete_user_plan.php" method="POST">
            <input type="submit" name="submit1" id="submit1">
        </form>
        <?php
    }
    else{
?>

    <form action="insert_user_plan.php" method="POST">
        <h3>Select PLan </h3>
        <label for="">Enter plan id:</label><br>
        <input type="number" id="planid" name="planid">
        <br><br>
        <input type="submit" name="submit2" id="submit2">
    </form>


<?php } ?>





    
</body>
</html>