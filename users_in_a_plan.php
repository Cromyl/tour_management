


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Users in a plan</h1>
    <br><br>
    <form action="users_in_a_plan.php" method="POST">
        <label for="">Plan id :</label><br>
        <input type="number" id="planid" name="planid">
        <br><br>
        <input type="submit" id="submit" name="submit">
    </form>



<br><br>




<?php
    //session_start();
   // $temp=$_SESSION['uid'];
    

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) && isset($_POST['planid'])){
        $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
        $pid=$_POST['planid'];
        ?> <h3>Plan Id =  <?php echo $pid; ?></h3> <?php
        $query="SELECT name  FROM userplan JOIN client ON userplan.userid=client.uid WHERE planid='$pid'";
        $result=mysqli_query($conn,$query);
        $count=0;
        ?>
        <table style="width:100%">
            <tr>
                <td>User Names</td>
            </tr>
        <?php
            while($row=mysqli_fetch_assoc($result)){ 
                $count++;
                ?>
                <tr>
                <td><?php echo $row['name']?></td>
                </tr>

            
        </table>
        <?php
            }
            ?>
            
            <h2>Number of people = <?php echo $count ?></h2>
            <?php
    }
    
?>

    
</body>
</html>