<?php
session_start();
if($_SESSION['adminLogin']!=1)
{
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="heading"><h1>Online Voting System</h1></div>
            <div class="form">
                <h4>Candidate Registraton</h4>
                <label class="label">Candidate Name:</label>
                <input type="text" name="cname" id="" class="input" placeholder=" Enter Candidate Name" required>

                <label class="label">Symbol Name:</label>
                <input type="text" name="csymbol" id="" class="input" placeholder="Enter Candidate Symbol Name" required>

                <label class="label">Choose symbol Image:</label>
                <input type="file" accept="image/*" name="cphoto" class="input" required>

                <label class="label">Select Position:</label>
                <select name="position" class="input">
                    <?php
                    
                        include "../includes/all-select-data.php";

                        while($result=mysqli_fetch_assoc($pos_data))
                        {
                            echo "<option value='$result[position_name]'>$result[position_name]</option>";
                        }
                    
                    ?>
                </select>

                <button class="button" name="register">Register</button>
            </div>
        </form>
        </form>
   </div>
</body>
</html>

<?php

    if(isset($_POST['register']))
    {
        $con=mysqli_connect("localhost","root","","voting");
        $cname=$_POST['cname'];
        $csymbol=$_POST['csymbol'];
        $position=$_POST['position'];
        $filename=$_FILES["cphoto"]["name"];
        $tempname=$_FILES["cphoto"]["tmp_name"];
        $folder="symbol/".$filename;
        move_uploaded_file($tempname,$folder);

        $query="INSERT INTO candidate(cname,symbol,symphoto,position) VALUES('$cname','$csymbol','$folder','$position')";

        $data=mysqli_query($con,$query);

        if($data)
        {
            echo "<script>
                    alert('Candidate Registered successfully')
                    location.href='candidates.php'
                </script>";
        }
        else
        {
            echo "<script> alert('Candidate Symbol Name already exist!') </script>";
        }
    }

?>