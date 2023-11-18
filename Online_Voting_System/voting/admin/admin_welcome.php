<?php

    error_reporting(0);
    session_start();
    $_SESSION['error']="";

    include "../includes/all-select-data.php";

        $email=$_POST['email'];
        $con=mysqli_connect('localhost','root','','voting');

        $query="SELECT * FROM admin where email='$email'";
        $data=mysqli_query($con,$query);

        $result=mysqli_fetch_assoc($data);

        $_SESSION['email']=$result['email'];
        $_SESSION['password']=$result['password'];
        $_SESSION['name']=$result['name'];

        if($_POST['email']==$_SESSION['email'] & $_POST['password']==$_SESSION['password'])
        {
            if($_SESSION['email']!=null and $_SESSION['password']!=null)
            {
                $_SESSION['adminLogin']=1;
            }
        }

    if($_SESSION['adminLogin']!=1)
    {
        header("location:index.php");
        $_SESSION['error']="wrong password!";
    }
    else
    {
        header("location:admin-panel.php");
    }

?>