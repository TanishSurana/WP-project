<?php
    session_start();

    $link=@mysqli_connect("localhost", "gauhostu_Project", "Tanish","gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());
    echo "Connected successfully to the database.";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $Complain_ID = $_POST['cid'];
        $uid=$_SESSION["uid"];
        $sql1="SELECT * FROM Vote WHERE Complain_ID='$Complain_ID' AND User_ID='$uid'";
        if($result=mysqli_query($link,$sql1))
        {
            if(mysqli_num_rows($result)>0)
            {
                echo"<p>You Cannot UpVote </p>";
            }
            else
            {
                $sql2="INSERT INTO Vote(Complain_ID,User_ID) VALUES('$Complain_ID','$uid')";
                //add
                if($result2 = mysqli_query($link, $sql2))
                {
                    echo 'user inserted into votes table';
                }
                else{
                    echo "<p>Error: Unable to excecute: $sql2. " . mysqli_error($link) ."</p>";
                }

                $sql="UPDATE Complain SET Votes=Votes+1 WHERE Complain_ID='$Complain_ID'";

                if($result=mysqli_query($link,$sql))
                {
                        echo "<p>Query Excecuted: aka upvoted</p>";
                }
                else
                {
                    echo "<p>Unable to excecute: $sql. " . mysqli_error($link) ."</p>";
                }
                // $sql0="SELECT * FROM Complain WHERE Complain_ID='$Complain_ID'";
                // if($result=mysqli_query($link,$sql0))
                // {
                //         if(mysqli_num_rows($result)>0)
                //         {
                //             $row=mysqli_fetch_assoc($result);
                //             echo $row['Votes'];
                //         }
                //         else
                //         {
                //             echo "<p>Row Returning Problem: $sql. " . mysqli_error($link) ."</p>";
                //         }
                // }
                // else
                // {
                //     echo "<p>Unable to excecute: $sql. " . mysqli_error($link) ."</p>";
                // }

                
            }
        } 
        else
        {
            echo "<p>Unable to excecute: $sql. " . mysqli_error($link) ."</p>";
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }
 
 
 
?>