<?php 
    session_start();
    $temp=$_SESSION['uid'];
    $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
    $query="SELECT * FROM plan";
    $result=mysqli_query($conn,$query);
    //echo $var;
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <script type="text/javascript">
            function validate() {
                var name = document.forms["myform"]["name"].value;
                if(name==""){
                    alert("Please enter the name");
                    return false;
                }
                else{
                    var reg=/[^a-zA-Z\ ]+/;
                    if (reg.test(name)){
                        alert("Name should only contain characters and spaces!!");
                        return false;
                    }
                }

                var date = document.forms["myform"]["dob"].value;
                if(date==""){
                    alert("Please enter the date");
                    return false;
                }
                // else {
                //     var year = date.getYear();
                //     if(year>2022){
                //         alert("You are not yet born!!");
                //         return false;
                //     }
                // }

                var address = document.forms["myform"]["address"].value;
                if(address==""){
                    alert("Please enter the address");
                    return false;
                }

                var phone = document.forms["myform"]["phone"].value;
                if(phone==""){
                    alert("Please enter the phone");
                    return false;
                }
                else{
                    if(isNaN(phone)){
                        alert("Phone number not valid");
                        return false;
                    }
                    if(phone.length !== 10){
                        alert("Phone Number should be 10 digits!!")
                        return false;
                    }
                }

                var password = document.forms["myform"]["password"].value;
                if(password==""){
                    alert("Please enter the password");
                    return false;
                }
                else{
                    var reg=/[^a-zA-Z0-9\!\@\#\$]+/;
                    if (reg.test(password)){
                        alert("Password should not contain characters other than A-Z/a-z/0-9/!/@/#/$");
                        return false;
                    }
                }

                var password2 = document.forms["myform"]["password2"].value;
                if(password2==""){
                    alert("Please re-enter the password");
                    return false;
                }

                if(password!=password2){
                    alert("Passwords do not match!");
                    return false;
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


    <h1>Register New User</h1>

    <div><h2>Registration form</h2></div>

    <form name="myform" action="connect1.php" onsubmit="return validate()" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name"><br><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" name="dob" id="dob"><br><br>

        <label for="address">Address:</label><br>
        <input type="text" name="address" id="address"><br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" name="phone" id="phone"><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br><br>

        <label for="password2">Confirm Password:</label><br>
        <input type="password" name="password2" id="password2"><br><br>

        <input type="submit" name="submit" id="submit">
    </form>
    </div>
</body>
</html>