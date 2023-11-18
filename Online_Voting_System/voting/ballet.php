<?php

    session_start();
    error_reporting(0);
    if($_SESSION['userLogin']!=1)
    {
        header("location:index.php");
    }
    include "includes/all-select-data.php";

    $start=$_GET['start'];

    if($_SESSION['voted']==1)
    {
        header("location:voted.php");
    }
    elseif($_SESSION['status']=="voted")
    {
        header("location:voted.php");
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
    <style>
        .table
        {
            margin-top: 1rem;
        }
        .button
        {
            width: 15rem;
            margin: auto;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="heading"><h1>Online Voting System</h1></div>
    <div class="header">
            <span class="logo">Voting System</span>
            <span class="profile" onclick="showProfile()"><img src="<?php echo $_SESSION['idcard']; ?>" alt=""><label><?php echo$_SESSION['fname']." ".$_SESSION['lname'];?></label></span>
        </div>
        <div id="profile-panel">
            <i class="fa-solid fa-circle-xmark" onclick="hidePanel()"></i>
            <div class="dp"><img src="<?php echo $_SESSION['idcard'];?>" alt=""></div>
            <div class="info">
                <h2><?php echo$_SESSION['fname']." ".$_SESSION['lname'];?></h2>
            </div>
            <div class="link"><a href="includes/user-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
        </div>
        <div class="main">
            <table class="table">
                <thead>
                    <th>Vote</th>
                    <th>Voting Symbol</th>
                    <th>Candidate Name</th>
                    <th>position</th>
                </thead>
                <tbody>
                    <form action="cal_vote.php" method="POST">
                <?php 
                
                    while($pos_result=mysqli_fetch_assoc($pos_data))
                    {
                        echo "<tr><td colspan='4'><h2>".$pos_result['position_name']."</h2></td></tr>";
                        $query="SELECT * FROM candidate WHERE position='$pos_result[position_name]'";
                        $data=mysqli_query($con,$query);
                        while($result=mysqli_fetch_assoc($data))
                        {
                            echo "
                            <tr>
                                <td>
                                    <input type='radio' name='".$pos_result['position_name']."' value='".$result['id']."' class='vote' required>
                                    <label class='check'>&#10004;</label>
                                </td>
                                    <td>
                                        <div class='symbol'>
                                            <a href='admin/".$result['symphoto']."'><img src='admin/".$result['symphoto']."'></a>
                                            <div class='bold'>".$result['symbol']."</div>
                                        </div>
                                    </td>
                                    <td class='large-font'>".$result['cname']."</td>
                                    <td class='large-font'>".$pos_result['position_name']."</td>
                            </tr>";
                        }
                    }
                ?>
                <td colspan="4"><button class="button" name="vote">Vote</button></td>
                </form>
                </tbody>
            </table>
        </div>
    </div>
   <script>
        //logout user after 5 minutes
        setTimeout(() => {
            location.replace("includes/user-logout.php");
        }, 300000);

    </script>
    <script src="js/script.js"></script>
</body>
</html>