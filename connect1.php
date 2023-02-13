<?php
    //echo 'aaya hu';
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
        if(isset($_POST['name'])&& isset($_POST['dob']) && isset($_POST['phone'])&& isset($_POST['address']) && isset($_POST['password'])){

            $name=$_POST['name'];
            $dob=$_POST['dob'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $password=$_POST['password'];
            $id=$name.$phone;
            if(strlen($phone)==10 && ctype_alpha($phone)==false && ctype_alpha($name)==true){
            $sql="INSERT INTO Client VALUES ('$id','$dob','$name','$address','$phone','$password')";
            //try{
            $query =mysqli_query($conn,$sql);
            if($query){
                
                header("Location: login.php");
            }
            else{
                echo 'Value exists';
            }
            //}catch(Exception $e)
            //{echo 'Value already exists';}
            
        }
        else{
            echo 'Invalid input';
        }
        }
    }