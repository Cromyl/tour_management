<?php
$temp=isset($_POST['submit1']);
echo $temp;

    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    if(isset($_POST['name'])&&isset($_POST['password'])){

        //$tbl_name='client';
        $name=$_POST['name'];
        $password=$_POST['password'];
    
        $sql="SELECT count(*) FROM Client WHERE name='$name' AND password='$password'";
        $sql2="SELECT * FROM Client WHERE name='$name' AND password='$password'";
        
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);

        $query2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($query2);
        print_r($row);
      

        if($row[0]==1)
        {
        // Register $username, $password and redirect to file "login_success.php"
            session_start();
            $karo=print_r($row2[0],true);
            $_SESSION["uid"] = $karo;
            header("location:client_home.php");
        }
        else {
            $failed = 1;
            header("location:login.php?msg=failed");
        }
    }


?>