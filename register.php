<!DOCTYPE html>
<html lang="en">
<head>
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
    
        <form action="connect1.php" method="POST">
            <label for="name">Name:</label><br>
            <input  type="text" name="name" id="name" required placeholder="Name"><br><br>
    
            <label for="dob">Date of Birth:</label><br>
            <input type="date" name="dob" id="dob" required placeholder="DD-MM-YYYY"><br><br>
    
            <label for="address">Address:</label><br>
            <input type="text" name="address" id="address" required placeholder="Address"><br><br>
    
            <label for="phone">Phone:</label><br>
            <input type="text" name="phone" id="phone" required placeholder="Phone"><br><br>
    
            <label for="password">Password:</label><br>
            <input type="text" name="password" id="password" required placeholder="Password"><br><br>
    
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
</body>
</html>