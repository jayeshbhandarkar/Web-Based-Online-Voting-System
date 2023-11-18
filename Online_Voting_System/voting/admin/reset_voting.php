<?php

$con=mysqli_connect("localhost","root","","voting");

$rst_cand_query = "UPDATE candidate SET tvotes=''";
$rst_cand_data = mysqli_query($con,$rst_cand_query);

$rst_voter_query = "UPDATE register SET status='not voted'";
$rst_voter_data = mysqli_query($con,$rst_voter_query);

if($rst_voter_data)
{
    echo "<script>

            alert('voting reseted!')
            history.back()

           </script>

    ";
}


?>