<?php 
    session_start();
    $temp=$_SESSION['uid'];
    
    
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit1'])){
        $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
        $query= "DELETE FROM userplan WHERE userid='$temp'";
        $q1=mysqli_query($conn,$query);
        header("Location: select_a_plan.php");
    }
?>