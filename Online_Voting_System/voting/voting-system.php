<?php
error_reporting(0);
session_start();

include "includes/all-select-data.php";
$otp = $_POST['otp'];
if ((int)$_SESSION['otp'] == (int)$otp) 
{
    $_SESSION['userLogin'] = 1;

    if ($_SESSION['voted'] == 1) 
    {
        header("location:voted.php");
    } 
    else if ($_SESSION['status'] == "voted") 
    {
        header("location:voted.php");
    }
} 
else 
{
    $_SESSION['error']="Wrong OTP Enter";
    header("location:otpform.php");
}


$con = mysqli_connect("localhost", "root", "", "voting");
$val_query = "SELECT * FROM voting";
$val_data = mysqli_query($con, $val_query);
$val_result = mysqli_fetch_assoc($val_data);

$voting_title = $val_result['voting_title'];
$vot_start_date = $val_result['vot_start_date'];
$vot_end_date = $val_result['vot_end_date'];

if ($_SESSION['phone'] == null) {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/chart.js"></script>
    <style>
        .box {
            display: none;
        }
        .warning
        {
            color: tomato;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <span class="logo">Voting System</span>
            <span class="profile" onclick="showProfile()"><img src="<?php echo $_SESSION['idcard']; ?>" alt=""><label><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></label></span>
        </div>
        <div id="profile-panel">
            <i class="fa-solid fa-circle-xmark" onclick="hidePanel()"></i>
            <div class="dp"><img src="<?php echo $_SESSION['idcard']; ?>" alt=""></div>
            <div class="info">
                <h2><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></h2>
            </div>
            <div class="link"><a href="includes/user-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
        </div>
        <div class="main">

            <h1 class="heading">Welcome <?php echo $_SESSION['fname']; ?>!</h1>
            <h2 class="warning">Voting will start soon...</h2>

            <div class="box">
                <h4 class="heading">Start Voting</h4>
                <table>
                    <tr>
                        <td class="bold">Voting Title :</td>
                        <td><?php echo $voting_title; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Voting Start :</td>
                        <td><?php echo $vot_start_date; ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Voting End :</td>
                        <td><?php echo $vot_end_date; ?></td>
                    </tr>
                </table>
                <div class="link1"><a href="ballet.php?start=1">Start</a></div>
            </div>
        </div>

    </div>
    <script src="js/script.js"></script>
    <script>
        //logout user after 5 minutes
        setTimeout(() => {
            location.replace("includes/user-logout.php");
        }, 300000);

        //php to js variable
        var vot_start_date = "<?php echo $vot_start_date; ?>";
        var vot_end_date = "<?php echo $vot_end_date; ?>";


        //convert in millisecond
        var start_date = Date.parse(vot_start_date);
        var end_date = Date.parse(vot_end_date);

        var current_date = Date.parse(new Date());

        start_vot = start_date - current_date;
        end_vot = end_date - current_date;

        var box = document.getElementsByClassName("box");
        var warning = document.getElementsByClassName("warning");

        //start voting....
        setTimeout(() => {
            box["0"].style.display = "block";
            warning["0"].style.display="none";
        }, start_vot)

        //end voting....
        setTimeout(() => {
            box["0"].style.display = "none";
            warning["0"].style.display="block";
            warning["0"].innerHTML="No voting available!";
        }, end_vot)
    </script>
</body>

</html>