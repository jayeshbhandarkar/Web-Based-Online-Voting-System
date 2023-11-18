<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <div class="container">
        <div class="heading"><h1>Online Voting System</h1></div>
        <div class="form">
            <h4>Registration Validity for Voting</h4>
            <form action="" method="POST">
                <label class="label">Valid From:</label>
                <input type="datetime-local" name="start" class="input" required>

                <label class="label">Valid To:</label>
                <input type="datetime-local" name="end" class="input" required>
                <button class="button" name="set">Set</button>
            </form>
        </div>
   </div>
</body>
</html>
<?php

    $con=mysqli_connect("localhost","root","","voting");
    if(isset($_POST['set']))
    {
        $starting = $_POST['start'];
        $ending = $_POST['end'];
        $query="UPDATE voting SET reg_start_date='$starting', reg_end_date='$ending'";
        $data=mysqli_query($con,$query);

        if(!$data)
        {
            echo "<script> alert('something went wrong!') </script>";
        }
        else
        {
            echo "<script> alert('Successfully update') </script>";
        }
    }
?>