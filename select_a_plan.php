<?php 
    session_start();
    $temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query="SELECT * FROM plan";
   // echo 'User id = '.$temp;
    $query2="SELECT * FROM plan NATURAL JOIN userplan WHERE userid='$temp'";
    $result=mysqli_query($conn,$query);
    $result2=mysqli_query($conn,$query2);
    $query3="SELECT planid FROM plan";
    $result3=mysqli_query($conn,$query3);
    $var=1;
    while($row3=mysqli_fetch_assoc($result3)){
        $var++;
    }
    //echo $var;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript">
        var mx=<?php echo json_encode(strval($var),JSON_HEX_TAG);?>;
        function validate(){
            var planid=document.forms["myform"]["planid"].value;
            planid = parseInt(planid);
            mx = parseInt(mx);
            if(planid>=mx){
                alert("Invalid plan id");
                return false;
            }
            else if(planid<=0){
                alert("Invalid plan id");
                return false;
            }
        }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Plan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bgimg"></div>
    <div class="bgtext">
    <h1>Select Plan Page</h1>

    <br>

    <h3>Available Plans</h3>
    <br>

    <table style="width:100%">

    <tr>
    <td>Plan Id</td>
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

<h3>Opted Plan</h3>

<table style="width:100%">
    <tr>
        
        <td>Plan Id</td>
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

    <form name="myform" action="insert_user_plan.php" onsubmit="return validate()" method="POST">
        <h3>Select Plan </h3>
        <label for="">Enter plan id:</label><br>
        <input type="number" id="planid" name="planid">
        <br><br>
        <input type="submit" name="submit2" id="submit2">
    </form>


<?php } ?>


</div>  


    
</body>
</html>