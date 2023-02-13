<?php 
    //session_start();
    //$temp=$_SESSION['uid'];

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit1'])){
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

    if(isset($_POST['city'])&& isset($_POST['hotel']) && isset($_POST['travelvia'])){

        $q2="SELECT COUNT(*) FROM trip";
        $l1=mysqli_query($conn,$q2);
        $row5=mysqli_fetch_array($l1);
        $id=$row5[0]+1;
        $city=$_POST['city'];
        $hotel=$_POST['hotel'];
        $travelvia=$_POST['travelvia'];
        //$query="SELECT * FROM preferences WHERE uid='$temp'";
        $sql="INSERT INTO trip VALUES ('$id','$city','$hotel','$travelvia')";
        $q1=mysqli_query($conn,$sql);
        if($q1){
        header("Location: buildtrip.php");
        exit;
        }
        else{
            echo 'Some error occured!!';
        }
    }
    else{
        
        
        echo '<script> alert("Error in input")</script>';
        exit;
        // echo '<script> setTimeout(function(){
        //     alert("Error in input");
        // },3000)</script>';

        //header("Location: preference_usr.php");
        //exit;
        //header("Location : preference_usr.php");
        //echo 'There is some error in the entry';
    }
}
?>