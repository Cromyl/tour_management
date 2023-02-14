<?php
$conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

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
            $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

            $query3="SELECT planid FROM plan";
            $result3=mysqli_query($conn,$query3);
            $var=1;
            while($row3=mysqli_fetch_assoc($result3)){
                $var++;
            }
            echo json_encode(strval($var),JSON_HEX_TAG);?>;

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


    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
            $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
            if(isset($_POST['planid'])){
                $temp=$_POST['planid'];
                $q1="DELETE FROM userplan WHERE planid='$temp'";
                $l1=mysqli_query($conn,$q1);
                ?>
                <script type="text/javascript">
                    var mx=<?php echo json_encode(strval($temp),JSON_HEX_TAG);?>;
                    alert("Users of planid "+mx+" deleted!");
                </script>
                <?php
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bgimg"></div>
    <div class="bgtext">
    <h1>Trip Complete</h1>

    <br><br>

    <form name="myform" action="complete_plan.php" onsubmit="return validate()" method="post">
        <Label>Enter the planID of the completed plan :</Label><br>
        <input type="number" id="planid" name="planid"><br>
        <br><br>
        <input type="submit" id="submit" name="submit">

    </form>
    </div>  
</body>
</html>