<?php

    error_reporting(0);
    session_start();

    if($_SESSION['userLogin']!=1)
    {
        header("location:index.php");
    }
    elseif($_SESSION['status']=="voted")
    {
        header("location:voted.php");
    }

    include "includes/all-select-data.php";
    $i=0;
    while($pos_result=mysqli_fetch_assoc($pos_data))
    {
        $pos_name=$pos_result['position_name'];
        $can_id[]=$_POST[$pos_name];
        $id=$can_id[$i];

        $can_sel_query="select * from candidate where id='$id'";
        $can_sel_data=mysqli_query($con,$can_sel_query);
        $can_sel_res=mysqli_fetch_assoc($can_sel_data);

        $prev_votes=$can_sel_res['tvotes'];
        $total_votes=$prev_votes+1;
        echo $total_votes;
        $can_up_query="UPDATE candidate SET tvotes='$total_votes' WHERE id='$id'";
        $can_up_data=mysqli_query($con,$can_up_query);
        $i++;
    }

    $voter_up_query="UPDATE register SET status='voted' where phone='$_SESSION[phone]'";
    $voter_up_data=mysqli_query($con,$voter_up_query);

    if($voter_up_data)
    {
        $_SESSION['status']=="voted";

        echo "<script>
                location.href='voted.php'
            </script>

        ";
    }

?>