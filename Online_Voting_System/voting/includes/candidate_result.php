<?php
        $i=0;
        while($pos_row=mysqli_fetch_assoc($pos_data))
        {
            $pos = $pos_row['position_name'];
            $can_query1="SELECT * FROM candidate WHERE position='$pos'";
            $can_data1=mysqli_query($con,$can_query1);

            echo "ctx[$i] = document.getElementsByClassName('myChart')[$i].getContext('2d');
                myChart[$i] = new Chart(ctx[$i], {
                    type: 'bar',
                    data: {
                        labels: ["; 
                        
                        while($can_row=mysqli_fetch_assoc($can_data1))
                        {
                            echo "'$can_row[cname]',";
                        }
                 

                        echo "],
                        datasets: [{
                            label: '$pos',
                            data: [";
                            $can_query2="SELECT * FROM candidate WHERE position='$pos'";
                            $can_data2=mysqli_query($con,$can_query2);
                            while($can_row1=mysqli_fetch_assoc($can_data2))
                            {
                                echo "$can_row1[tvotes],";
                            }
                            echo" ],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                });
            ";
            $i++;
        }
    ?>