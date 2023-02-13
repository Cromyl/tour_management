<?php 
    session_start();
    $temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    
    
    if(isset($_POST['planid']) && isset($_POST['submit2'])){
        $pid=$_POST['planid'];
        $query="INSERT INTO userplan VALUES ('$temp','$pid')";
        $q1=mysqli_query($conn,$query);
        header("Location: select_a_plan.php");
    } 
?>