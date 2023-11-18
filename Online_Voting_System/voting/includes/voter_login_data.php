<?php
        $reg_query="SELECT * FROM register WHERE phone='$phone'";
        $reg_data=mysqli_query($con,$reg_query);
        $result=mysqli_fetch_assoc($reg_data);
        
        $_SESSION['fname']=$result['fname'];
        $_SESSION['lname']=$result['lname'];
        $_SESSION['idnum']=$result['lname'];
        $_SESSION['phone']=$result['phone'];
        $_SESSION['idcard']=$result['idcard'];
        $_SESSION['verify']=$result['verify'];
        $_SESSION['password']=$result['password'];
        $_SESSION['status']=$result['status'];
        $_SESSION['otp']=null;

        if($_SESSION['phone']!=null or $resend==1)
        {
            if($phone==$_SESSION['phone'])
            {
                
                if($_SESSION['verify']=="yes")
                {
                    $_SESSION['userLogin']=1;
                    $_SESSION['error']="";

                    $err ="";
                    $ses = "";
                    $otp = rand(1111,9999);

                    $_SESSION['otp']=$otp;

                    if(preg_match("/^\d+\.?\d*$/",$phone) && strlen($phone)==10)
                    {

                        $fields = array(
                        "variables_values" => "$otp",
                        "route" => "otp",
                        "numbers" => "$phone",
                        );

                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 60,
                        CURLOPT_SSL_VERIFYHOST => 0,
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => json_encode($fields),
                        CURLOPT_HTTPHEADER => array(
                        "authorization: xbKfLvBOTiW67p3AkXgDZqMo8my9aCRPNGnuVscl02JwzhY41E4KXQ3gnFdRwHmbfDSZuahjIiP8OsAr",
                        "accept: */*",
                        "cache-control: no-cache",
                        "content-type: application/json"
                        ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) 
                        {
                            echo "
                                <script>
                                alert('sms not send! please check connection')
                                </script>
                            ";
                        }
                        else
                        {
                            $data = json_decode($response);
                            $sts = $data->return;
                            if ($sts == false)
                            {
                                $err = "Otp Not Send";
                            }
                            else
                            {
                                echo "
                                <script>
                                alert('OTP send on your phone')
                                </script>
                            ";
                            }
                        }


                    }
                    else
                    {
                        $err = "Invalied Mobile Number";
                    }

                }
            
                else
                {
                    echo "
                    <script>
                    alert('you are not verified by Admin')
                    location.href='index.php'
                    </script>
                    ";
                }
            }
        }
        else if($_SESSION['phone']==null)
        {
            echo "
                    <script>
                    alert('phone number not registered')
                    history.back()
                    </script>
                    ";
        }
