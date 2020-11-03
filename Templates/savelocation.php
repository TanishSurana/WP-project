<?php
    session_start();
    function distance($lat1, $lon1, $lat2, $lon2) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $km = $dist * 60 * 1.1515 * 1.609344;
          return $km;
        }
      }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_SESSION['lati'] = $_POST['lati'];
        $_SESSION['longi'] = $_POST['longi'];
        // echo $_SESSION['lati'];
        $range = 'city';
        echo print_r($_SESSION  );
        // DISPLAY FOR CITY
        $link = @mysqli_connect("localhost", "gauhostu_Project", "Tanish", "gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());
        $sql = "SELECT * FROM Complain WHERE Ran='$range'";
        
        
        if($result = mysqli_query($link, $sql))
       { 
              if(mysqli_num_rows($result)>0)
              {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      $dist = distance($_SESSION['lati'], $_SESSION['longi'], $row['Latitude'], $row['Longitude']);
                      if($dist <= 5000)
                      {
                        echo "<br>"; 
                        echo "<br>";
                        echo "<br>";
                        echo "Distance: " . $dist;
                        echo "<br>";
                        echo print_r($row);
                        echo "<br>";
                        echo $row["Complain_ID"];
                        echo "<br>";
                        echo $row["Title"];echo "<br>";
                        echo $row["Content"];echo "<br>";
                        echo $row["Votes"];echo "<br>";
                        echo $row["Date"];echo "<br>";
                        echo $row["Time"];echo "<br>";
                        echo $row["Ran"];echo "<br>";
                        echo $row["Latitude"];echo "<br>";
                        echo $row["Longitude"];echo "<br>";
                        echo $row["Solved"];echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo $row["User_ID"];echo "<br>";echo "<br>";

                        $row2 = $row["User_ID"];

                        $sql2 = "SELECT * FROM User WHERE User_ID='$row2'";
                        // echo $sql2;
                        //  echo "mysqli_query($link, $sql2)";
                        if($re1 = mysqli_query($link, $sql2))
                        {
                            if(mysqli_num_rows($re1)>0)
                            {
                                $row3 = mysqli_fetch_assoc($re1);
                                echo $row3['Username'];
                            }
                            else{
                                echo 'no data';
                            }

                         }
                        else
                        {
                          echo "<p>Unable to excecute: error pizza shit $sql. " . mysqli_error($link) ."</p>";
                        }

                        // echo $row["Title"];
                        // echo $row["Content"];
                        // echo $row["Votes"];
                        // echo $row["Date"];
                        // echo $row["Time"];
                        // echo $row["Ran"];
                        // echo $row["Latitude"];
                        // echo $row["Longitude"];
                        // echo $row["Solved"];
                      }
                    }
              }
              else
              {
                    echo "<p>No complaints for the selected level</p><br>";
              }
        }
        else
        {
              echo "<p>Unable to excecute: $sql. " . mysqli_error($link) ."</p>";   
        }
        
        header("location:city.php");
    }
?>