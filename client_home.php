
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function replacePage(){
    var newElement= '<input type='textbox' name='myTextbox'> \
    <h1> hello</h1>';
    document.body.innerHTML=newElement;
    }
</script>
</head>
<body>
    <div class="bgimg"></div>
    <div class="bgtext">
        <h1>Welcome <?php
            
             session_start();
             $temp=$_SESSION['uid'];
             $conn=mysqli_connect('localhost','root','','tour_management') or die("Connection failed" .mysqli_connect_error());
             $sql="SELECT name FROM Client WHERE Uid='$temp'";
             $query=mysqli_query($conn,$sql);
             $row=mysqli_fetch_array($query);
             echo $row[0];
        ?> !!</h1>
    
       
    
        <a href="preference_usr.php">User Preference</a>
        <br>
        <a href="select_a_plan.php">Select a Plan</a>
        <br>
        <a href="show_plan_details.php">Show Plan Details</a>

    </div>
    
    

    
</body>
</html>