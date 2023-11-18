<?php
    session_start();
    error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .msg
        {
            text-align: center;
            color: red;
            margin: 1rem;
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="heading"><h1>Online Voting System</h1></div>
        <div class="msg"><b>Note:</b> Fill this form for change phone number. SMS send regarding to change phone number on your new phone number after verify your details.</div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form">
                <h4>Mobile Number Change Request</h4>
                <label class="label"><sup class="req_symbol">*</sup>Name:</label>
                <input type="text" name="name" class="input" placeholder=" Enter Your Name" required>

                <label class="label"><sup class="req_symbol">*</sup>Choose ID Proof:</label>
                <select name="idname" id="myselect" class="input" onchange="idproof()">
                    <option value="Aadhar">Aadhar</option>
                    <option value="Pan Card">Pan Card</option>
                    <option value="Voter Card">Voter Card</option>
                    <option value="Passport">Passport</option>
                    <option value="other Id Proof">Other Id Proof</option>
                </select>

                <label class="label" id="myid"><sup class="req_symbol">*</sup>Aadhar:</label>
                <input type="file" accept="image/*" name="idphoto" id="myfile" class="input" required>

                <label class="label"><sup class="req_symbol">*</sup>Date of Birth:</label>
                <input type="date" name="dob" class="input" required>

                <label class="label"><sup class="req_symbol">*</sup>Old Phone Number:</label>
                <input type="text" name="oldphno" class="input" placeholder="Enter Old/Lost Phone Number" required>

                <label class="label"><sup class="req_symbol">*</sup>New Phone Number:</label>
                <input type="text" name="newphno" class="input" placeholder="Enter New Phone Number" required>

                
                <button class="button" name="submit">Send Request</button>    
            </div>
        </form>
   </div>
   <script>
       function idproof()
       {
            var x=document.getElementById("myselect").value;
            document.getElementById("myid").innerHTML=x+":";
            document.getElementById("myid1").innerHTML=x+" No:";
       }
   </script>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {

        $con=mysqli_connect("localhost","root","","voting");

        $name=$_POST['name'];
        $idname=$_POST['idname'];
        $dob=$_POST['dob'];
        $oldphno=$_POST['oldphno'];
        $newphno=$_POST['newphno']; 

        $filename=$_FILES["idphoto"]["name"];
        $tempname=$_FILES["idphoto"]["tmp_name"];
        $folder="phnochange/".$filename;
        move_uploaded_file($tempname,$folder);

        echo $folder;

        $query="INSERT INTO phno_change(vname, idname, idcard, dob, old_phno, new_phno) VALUES('$name','$idname','$folder','$dob','$oldphno',$newphno)";
        $data=mysqli_query($con,$query);

        if($data)
        {
           echo 
           "
                <script>
                    alert('request send successfully')
                </script>
           ";
        }
    }

?>