<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
     
   
    <form action="proses_login.php" method="post">
        <table>
        <tr>
                <td><h1>Halaman Login</h1></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
                <tr>
                <td></td>
                <td><p>Belum punya akun? <a href="register.php">Daftar di sini</p></td>
       
            </tr>
        </table>
    </form>
</body>
</html>