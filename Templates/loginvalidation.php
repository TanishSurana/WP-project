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
 $username=$_POST["username"];
 $password=$_POST["password"];  
 $link = @mysqli_connect("localhost", "gauhostu_Project", "Tanish", "gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());
 
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {    
      $n=1;
      $p=1;
      //Username
      if(empty($username))
      {
            $m_username='<div style="color:red; font-size:20px;">The Username Field Is Empty!</div>';
            echo $m_username;
            $n=0;
      }
      //Password
      if(empty($password))
      {
            $m_password='<div  style="color:red; font-size:20px;">The Password Field Is Empty!</div>';
            echo $m_password;
            $p=0;
      }
      if($n==0 or $p==0)
      {   
          $message=$m_username."<br>".$m_password;
          echo "<script>alert('$message');</script>";
      }
      
      $sql = "SELECT * FROM User WHERE Username='$username' AND Password='$password'";
      if($result = mysqli_query($link, $sql))
      {

            if(mysqli_num_rows($result)>0)
            {     

                  $row = mysqli_fetch_assoc($result);
                  $_SESSION["uid"] = $row["User_ID"];
                  $_SESSION["username"] = $username;
                  header("location:city.php");
            }
            else
            {
                echo"<br><br><br>";
                $message="User Doesn't Exist";
                echo "<div class='home'>$message</div>";
                echo "<a href='city.php' class='home'><h2>Go Back</h2></a></div>";
            }
      }
      else
      {
            echo "<p>Unable to excecute: $sql. " . mysqli_error($link) ."</p>";   
      }
    

     
 }

?>
</body>
</html>