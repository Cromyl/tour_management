<?php 
    //session_start();
    //$temp=$_SESSION['uid'];

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit1'])){
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());

    if(isset($_POST['planname'])&& isset($_POST['duration']) && isset($_POST['cost'])){

        $q2="SELECT COUNT(*) FROM plan";
        $l1=mysqli_query($conn,$q2);
        $row5=mysqli_fetch_array($l1);
        $id=$row5[0]+1;
        $cost=$_POST['cost'];
        $duration=$_POST['duration'];
        $planname=$_POST['planname'];
        //$query="SELECT * FROM preferences WHERE uid='$temp'";
        $sql="INSERT INTO plan VALUES ('$id','$cost','$duration','$planname')";
        $q1=mysqli_query($conn,$sql);
      //  if($q1){
        //    header("Location: buildplan.php");
       // exit;
       // }
     //   else{
      //      echo 'Some error occured!!';
       // }

        if((int)$_POST['trip1']!=0)
        {
            $var1=$_POST['trip1'];
            $sql2="INSERT INTO tripsinplan VALUES ('$id','$var1')";
            $q2=mysqli_query($conn,$sql2);
        }
        else {
            echo 'Trip 1 not set';
        }

        if((int)$_POST['trip2']!=0)
        {
            $var1=$_POST['trip2'];
            $sql2="INSERT INTO tripsinplan VALUES ('$id','$var1')";
            $q2=mysqli_query($conn,$sql2);
        }
        else{
            echo 'Trip 2 not set';
        }

        if((int)$_POST['trip3']!=0)
        {
            $var1=$_POST['trip3'];
            $sql2="INSERT INTO tripsinplan VALUES ('$id','$var1')";
            $q2=mysqli_query($conn,$sql2);
        }
        else {
            echo 'Trip 3 not set';
        }

        if((int)$_POST['trip4']!=0)
        {
            $var1=$_POST['trip4'];
            $sql2="INSERT INTO tripsinplan VALUES ('$id','$var1')";
            $q2=mysqli_query($conn,$sql2);
        }
        else{
            echo 'Trip 4 not set';
        }

        if((int)$_POST['trip5']!=0)
        {
            $var1=$_POST['trip5'];
            $sql2="INSERT INTO tripsinplan VALUES ('$id','$var1')";
            $q2=mysqli_query($conn,$sql2);
        }
        else{
            echo 'Trip 5 not set';
        }

        header("Location: buildplan.php");


    }
    else{
        
        
        echo 'Error hua';
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