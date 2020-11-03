<?php
    session_start();

    $link = @mysqli_connect("localhost", "gauhostu_Project", "Tanish", "gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());
    echo "<p>Connected successfully to the database.</p>";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $Complain_ID = $_POST['cid'];



        $sql="DELETE FROM Complain WHERE Complain_ID='$Complain_ID'";
        if($result = mysqli_query($link, $sql))
        {
            if(mysqli_num_rows($result)>0)
            {
                echo "<p>The Query Wasn't Executed</p><br>";
            }
            else
            {
                echo "<p>The Complain Was Deleted</p><br>";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            echo "<p>Unable to excecute: $sql. " . mysqli_error($link) ."</p>";
        }
    }
    else
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
?>