<?php
    session_start();
    error_reporting(0);
    $_SESSION["adminLogin"]=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .error
        {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="heading"><h1>Online Voting System</h1></div>
        <div class="form">
            <h4>Admin Login</h4>
            <form action="admin_welcome.php" method="POST">
                <label class="label">Email Id:</label>
                <input type="email" name="email" class="input" placeholder="Enter Email id" required>

                <label class="label">Password:</label>
                <input type="password" name="password" class="input" placeholder="Enter Password" required>

                <button class="button" name="login">Login</button>
            </form>
            <p class="error"><?php echo $_SESSION['error']; ?></p>
        </div>
   </div>
</body>
</html>