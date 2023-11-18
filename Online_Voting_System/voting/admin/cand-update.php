<?php
$cn=$_GET['cn'];
$sy=$_GET['sy'];
$ps=$_GET['ps'];
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
                <h4>Candidate Information Update</h4>
                <label class="label">Candidate Name:</label>
                <input type="text" name="cname" id="" class="input" value="<?php echo $cn; ?>">

                <label class="label">Candidate Symbol Name:</label>
                <input type="text" name="symbol" id="" class="input" value="<?php echo $sy; ?>">
                
                <label class="label">Candidate Position:</label>
                <select name="position" class="input">
                    <?php
                    
                    include "../includes/all-select-data.php";

                    echo "<option value='$ps'>$ps (already selected)</option>";
                    while($result=mysqli_fetch_assoc($pos_data))
                    {
                        echo "<option value='$result[position_name]'>$result[position_name]</option>";
                    }
                    
                    ?>
                </select>

                <button class="button" name="update">Update</button>
            </div>
        </form>
   </div> 

   <?php
   
    if(isset($_POST['update']))
    {
        $cname=$_POST['cname'];
        $symbol=$_POST['symbol'];
        $position=$_POST['position'];

        echo $cname;

        $query="UPDATE candidate SET cname='$cname',symbol='$symbol',position='$position' where symbol='$sy'";

        $data=mysqli_query($con,$query);

        if($data)
        {
            echo "<script>
                    alert('Candidate updated successfully')
                    location.href='candidates.php'
                </script>";
        }
    }
   
   ?>