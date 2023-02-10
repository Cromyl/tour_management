<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form action="connect2.php" method="POST">
        <label for="name">User Name :</label> <br>
        <input type="text" name='name' id='name' required> <br><br>

        <label for="password">Password :</label> <br>
        <input type="password" name='password' id='password' required> <br><br>

        <input type="submit" name="submit1" id="submit1">
    </form>
</body>
</html>