<?php 
    //session_start();
    //$temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query2="SELECT * FROM trip ORDER BY tripid";
    $query="SELECT * FROM plan ORDER BY planid";
    $result=mysqli_query($conn,$query);
    $result2=mysqli_query($conn,$query2);
    $query3="SELECT tripid FROM trip";
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
            var mx=<?php echo json_encode(strval($var),JSON_HEX_TAG);?>;
            function validate() {
                var planname = document.forms["myform"]["planname"].value;
                if(planname==""){
                    alert("Please enter the planname");
                    return false;
                }
                else{
                    var reg=/[^a-zA-Z\ ]+/;
                    if (reg.test(planname)){
                        alert("planname should only contain characters and spaces!!");
                        return false;
                    }
                }

                var cost = document.forms["myform"]["cost"].value;
                if(cost==""){
                    alert("Please enter the cost");
                    return false;
                }
                else{
                    if(cost<=0){
                        alert("Cost should be greater than zero!!")
                        return false;
                    }
                }

                var duration = document.forms["myform"]["duration"].value;
                if(duration==""){
                    alert("Please enter the duration");
                    return false;
                }
                else{
                    if(duration<=0){
                        alert("Duration should be greater than zero!!")
                        return false;
                    }
                    if(duration>20){
                        alert("Duration should be less than 20 days!")
                        return false;
                    }
                }

                var trip1 = document.forms["myform"]["trip1"].value;
                if(trip1==""){
                    alert("Enter atleast 1 trip!");
                    return false;
                }
                else if(trip1>=mx){
                    alert("Invalid trip1 id");
                    return false;
                }
                else if(trip1<=0){
                    alert("Invalid trip1 id");
                    return false;
                }

                var trip2 = document.forms["myform"]["trip2"].value;
                if(trip2==""){
                }
                else if(trip2>=mx){
                    alert("Invalid trip2 id");
                    return false;
                }
                else if(trip2<=0){
                    alert("Invalid trip2 id");
                    return false;
                }
                else if(trip1==trip2) {alert("Trip2 cannot be equal to Trip1"); return false;}

                var trip3 = document.forms["myform"]["trip3"].value;
                if(trip3==""){
                }
                else if(trip3>=mx){
                    alert("Invalid trip3 id");
                    return false;
                }
                else if(trip3<=0){
                    alert("Invalid trip3 id");
                    return false;
                }
                else if(trip3==trip1) {alert("Trip3 cannot be equal Trip1"); return false;}
                else if(trip3==trip2) {alert("Trip3 cannot be equal Trip2"); return false;}

                
                var trip4 = document.forms["myform"]["trip4"].value;
                if(trip4==""){
                }
                else if(trip4>=mx){
                    alert("Invalid trip4 id");
                    return false;
                }
                else if(trip4<=0){
                    alert("Invalid trip4 id");
                    return false;
                }
                else if(trip4==trip1) {alert("Trip4 cannot be equal Trip1"); return false;}
                else if(trip4==trip2) {alert("Trip4 cannot be equal Trip2"); return false;}
                else if(trip4==trip3) {alert("Trip4 cannot be equal Trip3"); return false;}

                var trip5 = document.forms["myform"]["trip5"].value;
                if(trip5==""){
                }
                else if(trip5>=mx){
                    alert("Invalid trip5 id");
                    return false;
                }
                else if(trip5<=0){
                    alert("Invalid trip5 id");
                    return false;
                }
                else if(trip5==trip1) {alert("Trip5 cannot be equal Trip1"); return false;}
                else if(trip5==trip2) {alert("Trip5 cannot be equal Trip2"); return false;}
                else if(trip5==trip3) {alert("Trip5 cannot be equal Trip3"); return false;}
                else if(trip5==trip4) {alert("Trip5 cannot be equal Trip4"); return false;}
                
                
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
    <!-- <h1>Plan Page</h1> -->

    <!-- <br> -->
    <h3>Your Existing Plans</h3>
    <!-- <br> -->
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

        <!-- <br> -->
        <h3>Trips</h3>

        <table>
            <tr>
                <td>Trip Id</td>
                <td>Trip Destination</td>
            </tr>

            <?php
                while($row2=mysqli_fetch_assoc($result2)){

            ?>
            <tr>
                <td><?php echo $row2['tripid']?></td>
                <td><?php echo $row2['city']?></td>
            </tr>
            <?php
            }
        ?>
        </table>



        <form name="myform" action="buildplan_entry.php" onsubmit="return validate()" method="post">
        <h3>Build new Plan</h3>
        <label for="planname">Plan Name:</label><br>
        <input type="text" id="planname" name="planname">
        <br>
        <label for="cost">Cost:</label><br>
        <input type="number" id="cost" name="cost">
        <br>
        <label for="duration">Duration:</label><br>
        <input type="number" id="duration" name="duration">
        <br>
        <label for="trip1">Trip#1:</label><br>
        <input type="number" id="trip1" name="trip1">
        <br>
        <label for="trip2">Trip#2:</label><br>
        <input type="number" id="trip2" name="trip2">
        <br>
        <label for="trip3">Trip#3:</label><br>
        <input type="number" id="trip3" name="trip3">
        <br>
        <label for="trip4">Trip#4:</label><br>
        <input type="number" id="trip4" name="trip4">
        <br>
        <label for="trip5">Trip#5:</label><br>
        <input type="number" id="trip5" name="trip5">
        <br>
        <input type="submit" name="submit1" id="submit1">
        </form>
        </div>
</body>
</html>