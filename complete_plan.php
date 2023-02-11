<?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

        if(isset($_POST['planid'])){
            $temp=$_POST['planid'];
            $q1="DELETE FROM userplan WHERE planid='$temp'";
            $l1=mysqli_query($conn,$q1);
            echo 'Users of the PlanId '.$temp.'  deleted';
        }
    }
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
    <h1>Trip Complete</h1>

    <br><br>

    <form action="complete_plan.php" method="post">
        <Label>Enter the planID of the completed plan :</Label><br>
        <input type="number" id="planid" name="planid"><br>
        <br><br>
        <input type="submit" id="submit" name="submit">

    </form>
    
</body>
</html>