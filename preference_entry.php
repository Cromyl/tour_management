<?php 
    session_start();
    $temp=$_SESSION['uid'];

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit1'])){
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

    if(isset($_POST['budget'])&& isset($_POST['duration']) && isset($_POST['destination']) && ctype_alpha($_POST['destination'])){

        $budget=$_POST['budget'];
        $duration=$_POST['duration'];
        $destination=$_POST['destination'];
        //$query="SELECT * FROM preferences WHERE uid='$temp'";
        $sql="INSERT INTO preferences VALUES ('$temp','$budget','$duration','$destination')";
        $q1=mysqli_query($conn,$sql);
        if($q1){
        header("Location: preference_usr.php");
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