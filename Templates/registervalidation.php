      <?php
        session_start();
      ?>
      
      
      <html>
      <head>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="/hood/static/error.css">
        <script src = "/hood/static/index.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name='author' content="tanish">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      </head>
      <body>
      <?php 
       $link=@mysqli_connect("localhost", "gauhostu_Project", "Tanish","gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());

       //Query
       $username=$_POST["username"]; 
       $password=$_POST["password"];
       $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
       $n=0;
       $p=0;
       $e=0;
       if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //Username
            if(empty($username))
            {
                $m_username='<div style="color:red; font-size:20px;">The Username Field Is Empty!</div>';

            }
            else
            {
                $n=1;                

            }

           //Password
            if(empty($password))
            {
                $m_password='<div  style="color:red; font-size:20px;">The Password Field Is Empty!</div>';

            }
            else if(strlen($password) < '6')
            {
                $m_password='<div  style="color:red; font-size:20px;">The Length Of The Password Should Be At Least 6!</div>';

            }
            else if(!preg_match("#[A-Z]+#",$password))
            {
                $m_password='<div  style="color:red; font-size:20px;">The Password Must Contain At Least One Capital Letter!</div>';

            }
            else if(!preg_match("#[a-z]+#",$password))
            {
               $m_password='<div  style="color:red; font-size:20px;">The Password Must Contain At Least One Small Letter!</div>';

            }
            else{
                $p=1;
            }

           //Email

             if(empty($email))
             {
                 $m_email="<div  style='color:red; font-size:20px;'>The Email Field Cannot be Left Empty!</div>";
                 echo $m_email;
             }
             else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
             {
                 $m_email = "<div style='color:red; font-size:20px;'>Invalid Email Format</div>";
                 echo $m_email;
             }
            else{
                $e=1;
            }


           if($e==1 and $p==1 and $n==1)
           {

               //Query
               $sql = "SELECT * FROM User WHERE Username='$username'";
               if($result = mysqli_query($link, $sql))
               {

                    if(mysqli_num_rows($result)>0)
                    {               
                        echo"<br><br><br>";
                        $message="The Username Is Already Taken";
                        echo "<div class='home'>$message</div>";
                        echo "<a href='city.php' class='home'><h2>Go Back</h2></a>";
                    }
                    else
                    {
                       $sql0= "INSERT INTO User(Username,Password,Email) VALUES ('$username', '$password', '$email')";
                       if(mysqli_query($link, $sql0))
                       {
                        $resultMessage = '<div>Data added successfully to the database table</div>';
                        echo $resultMessage;
                        $sql1 = "SELECT * FROM User WHERE Username='$username'";
                        $result1 = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result1);
                        $_SESSION["uid"] = $row["User_ID"];
                        $_SESSION["username"] = $username;
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        }
                       else
                       {
                        $resultMessage = '<div>ERROR: Unable to excecute: ' .$sql. '. ' . mysqli_error($link). '</div>';
                        echo $resultMessage;
                        }

                    }
               }
               else
               {
                    echo "<p>Unable to excecute: $sql. " . mysqli_error($link) ."</p>";   
               }

           }
           else
           {
               $message=$m_username."<br>".$m_password."<br>".$m_email;
               echo "<script>alert('$message');</script>";
           }
       }
?>
</body>
</html>  