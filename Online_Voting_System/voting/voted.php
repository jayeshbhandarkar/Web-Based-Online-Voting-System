<?php
    session_start();
    error_reporting(0);

    if($_SESSION['userLogin']!=1)
    {
        header("location:index.php");
    }
    include "includes/all-select-data.php";

    $val_query="SELECT * FROM voting";
    $val_data=mysqli_query($con,$val_query);
    $val_result=mysqli_fetch_assoc($val_data);

    $vot_start_date=$val_result['vot_start_date'];
    $vot_end_date=$val_result['vot_end_date'];

    $_SESSION['status']='voted';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/chart.js"></script>
    <style>
         .result-box
        {
            display: none;
        }
        h4.heading
        {
            color: tomato;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="header">
            <span class="logo">Voting System</span>
            <span class="profile" onclick="showProfile()"><img src="<?php echo $_SESSION['idcard']; ?>" alt=""><label><?php echo$_SESSION['fname']." ".$_SESSION['lname'];?></label></span>
        </div>
        <div id="profile-panel">
            <span class="fa-solid fa-circle-xmark" onclick="hidePanel()"></span>
            <div class="dp"><img src="<?php echo $_SESSION['idcard'];?>" alt=""></div>
            <div class="info">
                <h2><?php echo$_SESSION['fname']." ".$_SESSION['lname'];?></h2>
            </div>
            <div class="link"><a href="includes/user-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
        </div>
    <h2 class="heading center">Your vote Submitted Successfully!</h2>
    <h4 class="heading">Result Show After Voting ends</h4>
    <div class="result-box">
                <h2 class="result-title">Voting Result</h2>
                <?php
                    $i=0;
                    while($i<$total_pos)
                    {
                        echo '
                        <div class="result"><canvas class="myChart"></canvas></div>
                        ';
                        $i++;
                    }
                ?>
            </div>
    </div>
    

    <script src="js/script.js"></script>
    <script>

        //php to js variable
        var vot_start_date="<?php echo $vot_start_date; ?>";
        var vot_end_date="<?php echo $vot_end_date; ?>";
        console.log(vot_end_date)
        

        //convert in millisecond
        var start_date=Date.parse(vot_start_date);
        var end_date=Date.parse(vot_end_date);

        var current_date=Date.parse(new Date());

        start_vot = start_date - current_date;
        end_vot = end_date - current_date;
        
        var vresult = document.getElementsByClassName("result-box");
        var heading = document.getElementsByClassName("heading");

         //start voting....
         setTimeout(()=>{
            vresult["0"].style.display="none";
        },start_vot)

        //end voting....
        setTimeout(()=>{
            vresult["0"].style.display="block";
            heading["1"].style.display="none";

        },end_vot)

        //voting result
        var ctx = [];
        var myChart = [];
        <?php
            include "includes/candidate_result.php";
        ?>
    </script>
</body>
</html>