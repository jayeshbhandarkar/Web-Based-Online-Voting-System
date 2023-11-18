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
        <div class="heading"><h1>Online Voting System</h1></div>
        <div class="form">
            <h4>Add Positions</h4>
            <form action="" method="POST">
                <label class="label">Position Name:</label>
                <input type="text" name="position" class="input" placeholder="Enter position" required>

                <button class="button" name="add">Add</button>
            </form>
        </div>
   </div>
</body>
</html>

<?php
    $con=mysqli_connect("localhost","root","","voting");

    if(isset($_POST['add']))
    {

        $pos_name=$_POST['position'];
        echo $pos_name;
        $query="INSERT INTO can_position (position_name) VALUES ('$pos_name')";
        $data=mysqli_query($con,$query);

        if($data)
        {
            echo "
            <script>
                alert('position added successfully')
                location.href='position.php'
            </script>";
        }
        else
        {
            echo "
            <script>
                alert('position already added !')
                history.back()
            </script>";
        }
    }
?>