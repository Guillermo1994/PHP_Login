<?php 
    session_start();
    require 'database.php';
    if (isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        $user = "";

        if (count($results)>0) {
               $user = $results; 
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to your App</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
        <br>Welcome. <?= $user['email'] ?>
        <br>you are Successfully logged In
        <a href="logout.php">logout</a>
     <?php else: ?>
    <h1>Please Login or SingUp</h1>

    <a href="login.php">Login</a> or 
    <a href="signup.php">Signup</a>
    <?php endif; ?>
</body>
</html>