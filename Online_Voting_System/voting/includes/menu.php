<div id="menu">
    <h3 class="menu-header"><i class="fa-solid fa-file-lines"></i> Reports</h3>
    <div class="menu-item"><a href="admin-panel.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a></div>
           
    <h3 class="menu-header"><i class="fa-solid fa-bars-progress"></i> Manage</h3>
    <div class="menu-item"><a href="voters.php"><i class="fa-solid fa-users"></i> Voters</a></div>
    <div class="menu-item"><a href="candidates.php"><i class="fa-solid fa-user-group"></i> Candidates</a></div>
    <div class="menu-item"><a href="position.php"><i class="fa-solid fa-image-portrait"></i> Positions</a></div>
    <div class="menu-item"><a href="voter_request.php"><i class="fa-solid fa-file-invoice"></i> Voter Requests</a></div>
    

    <h3 class="menu-header"><i class="fa-solid fa-gear"></i> Voting</h3>
    <div class="menu-item"><a href="voting_schedule.php"><i class="fa-solid fa-calendar"></i> Voting Schedule</a></div>
    <div class="menu-item"><a href="voting-title.php"><i class="fa-solid fa-pen-to-square"></i> Voting-Title</a></div>
    <div class="menu-item"><a href="reset_voting.php" onClick='return resetconfirm()'><i class="fa-solid fa-rotate-right"></i> Reset-Voting</a></div>

</div>

<script>
    function resetconfirm()
    {
        return confirm('Do you want to Reset all voting!');
    }
</script>