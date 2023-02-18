<?php
    $conn= mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

    $query3="SELECT planid FROM plan";
    $result3=mysqli_query($conn,$query3);
    $var=1;
    while($row3=mysqli_fetch_assoc($result3)){
        $var++;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript">
        
        function validate(){
            var mx=<?php 
            $conn= mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

            $query3="SELECT planid FROM plan";
            $result3=mysqli_query($conn,$query3);
            $var=1;
            while($row3=mysqli_fetch_assoc($result3)){
                $var++;
            }
            echo json_encode(strval($var),JSON_HEX_TAG);?>;
        
            var planid=document.forms["myform"]["planid"].value;
            planid=parseInt(planid);
            mx=parseInt(mx);
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


    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
            $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
            if(isset($_POST['planid'])){
                $pid=$_POST['planid'];
                $query="SELECT name  FROM userplan JOIN client ON userplan.userid=client.uid WHERE planid='$pid'";
                $result=mysqli_query($conn,$query);
                $count=0;
                while($row=mysqli_fetch_assoc($result)){ 
                    $count++;
                }
                ?>
                <script type="text/javascript">
                    var mx=<?php echo json_encode(strval($pid),JSON_HEX_TAG);?>;
                    var nx=<?php echo json_encode(strval($count),JSON_HEX_TAG);?>;
                    alert("Number of users in planid "+mx+" is/are "+nx);
                </script>
                <?php
            }
        }
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bgimg"></div>
    <div class="bgtext">

        <h1>Users in a plan</h1>
        <br><br>
        <form name="myform" action="users_in_a_plan.php" onsubmit="return validate()" method="POST">
            <label for="">Plan id :</label><br>
            <input type="number" id="planid" name="planid">
            <br><br>
            <input type="submit" id="submit" name="submit">
        </form> 
    
    
    
    
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
    
        
    </div>
</body>
</html>