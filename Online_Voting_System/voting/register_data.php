<?php

    error_reporting(0);
    include "includes/all-select-data.php";
    $count=mysqli_num_rows($voter_data);

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $idname=$_POST['idname'];
    $idnum=$_POST['idnum'];
    $instidnum=$_POST['instidnum'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    if(isset($_POST['register']))
    {
            $con=mysqli_connect("localhost","root","","voting");
            $date1=new DateTime("$dob");
            $date2=new DateTime("now");
            $dateDiff=$date1->diff($date2);
           
            if(strlen($phone)!=10)
            {
                echo "<script> 
                        alert('Phone Number must 10 digit')
                        history.back()
                    </script>";
            }
            else if(!is_numeric($phone))
            {
                echo "<script> 
                        alert('Phone Number must numeric')
                        history.back()
                    </script>";
            }
            else if(strlen($idnum)>13)
            {
                echo "<script> 
                        alert('Enter valid Id number')
                        history.back()
                    </script>";
            }
            else if($dateDiff->days<6570)
            {
                echo "<script>
                        alert('Your age must above 18 years')
                        history.back()
                    </script>";
            }
            else
            {
                $filename=$_FILES["idcard"]["name"];
                $tempname=$_FILES["idcard"]["tmp_name"];
                $folder="img/".$count.$filename;
                move_uploaded_file($tempname,$folder);

                $query="INSERT INTO register(fname,lname,idname,idnum,idcard,inst_id,dob,gender,phone,address,status) VALUES('$fname','$lname','$idname','$idnum','$folder','$instidnum','$dob','$gender','$phone','$address','not voted')";
                $data=mysqli_query($con,$query);

                if($data)
                {
                   echo"<script>
                            alert('Registration Sussessfully!')
                            location.href='index.php'
                        </script>";
                }
                else
                {
                    echo "<script>
                            alert('mobile number or ID Number already exist!')
                            history.back()
                         </script>";
                }
            }
    }

?>