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
    <script type="text/javascript">
        function validate(){

            var city=document.forms["myform"]["city"].value;
            if(city==""){
                alert("Please enter travel destination");
                return false;
            }
            else{
                var reg=/[^a-zA-Z\ ]+/;
                if(reg.test(city)){
                    alert("Travel destination should only contain characters!!");
                    return false;
                }
            }
            
            var hotel=document.forms["myform"]["hotel"].value;
            if(hotel==""){
                alert("Please enter hotel name");
                return false;
            }
            else{
                var reg=/[^a-zA-Z\ ]+/;
                if(reg.test(hotel)){
                    alert("Hotel name should only contain characters!!");
                    return false;
                }
            }

            var travelvia=document.forms["myform"]["travelvia"].value;
            if(travelvia==""){
                alert("Please enter mode of travel");
                return false;
            }
            else{
                var reg=/[^a-zA-Z\ ]+/;
                if(reg.test(travelvia)){
                    alert("Mode of travel should only contain characters!!");
                    return false;
                }
            }
        }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bgimg"></div>
    <div class="bgtext">
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
        <form name="myform" action="trip_entry.php" onsubmit="return validate()" method="post">
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
        </div>
    
</body>
</html>