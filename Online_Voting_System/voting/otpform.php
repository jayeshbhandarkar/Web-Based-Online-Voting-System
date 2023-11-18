<?php

error_reporting(0);
session_start();
$con = mysqli_connect("localhost", "root", "", "voting");
$phone = $_POST['phone'];

if($_SESSION['phone']==null)
{
    include "includes/voter_login_data.php";
}

echo $_SESSION['otp'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        #resend
        {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="heading">
            <h1>Online Voting System</h1>
        </div>
        <div class="form">
            <h4>OTP Verification</h4>
            <form action="voting-system.php" method="POST">
                <label class="label">OTP:</label>
                <input type="name" name="otp" class="input" placeholder="Enter OTP" required>

                <button class="button">Verify</button>
                <center><div class="timer"></div><?php echo "<a id='resend' href='includes/resend_otp.php?phone=$_SESSION[phone]'>Resend OTP</a>";?></center>
                <p class="error"><?php echo $_SESSION['error']; ?></p>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var timer = document.getElementsByClassName("timer");
        var link = document.getElementById("resend");
        sec=30;
         setInterval(() => {
            timer["0"].innerHTML="00:"+sec;
            sec--;
            if (sec<0) {
                timer["0"].style.display="none";
                link.style.display="block";
            }
        }, 1000)
    </script>
</body>

</html>