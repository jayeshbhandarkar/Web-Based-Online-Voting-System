<?php
$psnm=$_GET['psnm'];
$id=$_GET['id'];
?>


<!DOCTYPE html>
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
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form">
                <h4>Candidate Position Update</h4>

                <label class="label">Candidate Position:</label>
                <input type="text" name="position" id="" class="input" value="<?php echo $psnm; ?>">

                <button class="button" name="update">Update</button>
            </div>
        </form>
   </div> 

   <?php
   
    if(isset($_POST['update']))
    {
        $position=$_POST['position'];
        $con=mysqli_connect("localhost","root","","voting");
        $query="UPDATE can_position SET position_name='$position' where id='$id'";

        $data=mysqli_query($con,$query);

        if($data)
        {
            echo "
                <script>
                    alert('position update succefully!')
                    location.href='position.php'
                </script>
            ";
        }
    }
   
   ?>