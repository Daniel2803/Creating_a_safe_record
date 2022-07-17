<?php

function createRows(){
if(isset($_POST['submit'])){
    global $connection;
   $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password, $hashF_and_salt);
    
    
    $connect = mysqli_connect('localhost', 'root', '', 'loginapp');
    
    if($connect){
        echo "We are connected";
    } else{
        die("Database connection failed");
    }
    
    $query = "INSERT INTO users(username, password) "; 
    $query .= "VLAUES ('$username', 'password')";
    
        $result = msqli_query($connection, $query);
    
    if(!$result){
        die("Query FAILED" . mysqli_error());
    } else { echo "Record Create"; }
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 <div class="container">
  <div class="col-xs-6">
   <form action="login.php" method="post">
       <label for="name">Enter Username:</label>
       <input type="text" class="form-control" name="username">
       <label for="name">Enter Password:</label>
       <input type="password" class="form-control" name="password">
       <input type="submit" name="submit">
       
   </form>
   </div>
   </div>

    
</body>
</html>