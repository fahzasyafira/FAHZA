<?php

session_start();
include 'connect.php';


if(isset($_POST["login"])){
    $username =  mysqli_real_escape_string($koneksi,$_POST['username']);
    $password =  mysqli_real_escape_string($koneksi,$_POST['password']);
    

    $sql = "SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."' ";
    $result = mysqli_query($koneksi,$sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)> 0){
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        
        $_SESSION['login'] = true;

        if($_SESSION['login'] == true){
            header("location: index.php");}

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <link rel = "stylesheet" href="login.css">
</head>
<body>

    <div class="container">
        <div class="myform">
            <form method = "post" action="#">
                <h2>ADMIN LOGIN</h2>
                <input type="text" placeholder="Username" name='username'>
                <input type="password" placeholder="Password" name="password">
                <button type="submit"  name='login' >LOGIN </button>
            </form>
        </div>  
        <div class="image">
            <img src="image.jpeg" >
        </div>   
    </div>
    
</body>
</html>