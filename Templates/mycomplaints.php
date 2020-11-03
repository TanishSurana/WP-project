<?php
// Start the session
session_start();
// $_SESSION['uid'] = '5'; // testing 
// echo print_r($_SESSION);
if(!isset($_SESSION["lati"]))
{
    header("location:home.php");
}
if(!isset($_SESSION['uid']))
{
    //echo "<script>alert('login required');</script>";
    header("location:city.php");
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/hood/static/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name='author' content="tanish">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>HoodHassles</title>
</head>
<body>
    <div class="wrapper">

    
    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="home.php"><img src="../static/logogrlow.webp" style='max-height: 35px;'><span style="display: inline-block; transform: translate(2px,3px);">HoodHassles</span></a>
            <!-- only thing taken from bootstrap -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="city.php">Forum <span class="sr-only">(current)</span></a>
                </li>   
                <li class="nav-item  msel">
                    <a class="nav-link" href="mycomplaints.php">My Complaints</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link newcomplain" href="#">New Complaint</a>
                </li>
                </ul>

                <?php
                    if(isset($_SESSION["uid"]))
                    {
                        $username = $_SESSION['username'];
                        echo "<span style='display: inline-block; font-size: large; padding-right: 10px'>Hi, $username |</span>";
                        echo '<a class="lag" href="logout.php">Logout</a>';
                    }
                    else{
                        echo '<a href="#" class="lag blogin">Login</a>';
                    }
                ?>
       
            </div>
        </nav>


        <!--

          <nav>
              <div class="container">
                <div class="row mynav">
                    <div class="col-lg-4 col-sm-12 logo">
                        <div><a href="#" class="logo">HoodHassles</a></div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                      <a href="#" class='nlink active'>Forum</a>
                      <a href="#">My Complain</a>
                  </div>
                  <div class="col-lg-4 col-sm-12 logs">
                    <?php
                            // if(isset($_SESSION["uid"]))
                            // {
                            //     echo '<a href="tp.php">Logout</a>';
                            // }
                            // else{
                            //     echo '<a href="#" class="blogin">Login/register</a>';
                            // }
                    ?>
                  </div>
                </div>
              </div>

          </nav>

                        -->
    </header>



    <main>

        <div style="background-color: rgb(66, 85, 109); color: rgb(66, 85, 109); height: 24px;">
                                .
        </div>

        <div class="forum-nav" style="display: none;">
            
        </div>

 

        
        <div class="container">
            <div class="imghead" style='background-image: url("../static/my.jpg")'>
                <div class="link-img">
                    My complaints
                </div>
            </div>
        </div>
                
        <div class="container">
            <div class="complains">
            <ul class="list-group">

            <?php
                $link = @mysqli_connect("localhost", "gauhostu_Project", "Tanish", "gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());
                $uid = $_SESSION['uid'];
                $flag = 0;
                $sql = "SELECT * FROM Complain WHERE User_ID='$uid' ORDER BY Complain_ID DESC";

                if($result = mysqli_query($link, $sql))
           { 
                  if(mysqli_num_rows($result)>0)
                 { 
                        while($row = mysqli_fetch_assoc($result))
                        {
                          //$dist = distance($_SESSION['lati'], $_SESSION['longi'], $row['Latitude'], $row['Longitude']);
                          if(true)
                          {

                            $title = $row["Title"];
                            $votes = $row["Votes"];
                            $content = $row["Content"];
                            $solved = $row["Solved"];
                            $date = $row["Date"];
                            $time = $row["Time"];
                            $owner = $row["User_ID"];
                            $cid = $row["Complain_ID"];
                            $image = $row['Img'];
                            $lati = $row['Latitude'];
                            $longi = $row['Longitude'];
                            $range = $row['Ran'];
    
                            $row2 = $row["User_ID"];
                            
                            $sql2 = "SELECT * FROM User WHERE User_ID='$row2'";
                            // echo $sql2;
                            //  echo "mysqli_query($link, $sql2)";
                            if($re1 = mysqli_query($link, $sql2))
                            {
                                if(mysqli_num_rows($re1)>0)
                                {
                                    $row3 = mysqli_fetch_assoc($re1);
                                    $ownerName = $row3["Username"];
                                    $flag = 1;
                                    echo "<li class='list-group-item'>
                                    <div class='complaint'>
                                        <div class='row'>
                                            <div class='col-lg-1 upvotes'>
                                                <form action='updatecomplain.php' method='post'>
                                                    <input type='text' name ='cid' style='display: none;' value='$cid'>
                                                    <button type='submit'><i class='fa fa-chevron-up'></i></button>
                                                </form>
                                                <div>$votes</div>
                                            </div>
                
                
                                            <div class='col-lg-8 col-sm-12 content'>
                                                <div class='row'>
                                                    <div class='col-lg-9' style='padding: 0;'>
                                                        <div class='comtitle' style='word-wrap: break-word; display: inline;'>
                                                            $title
                                                        </div>
                                                        <span class='comuser'>
                                                            by $ownerName
                                                        </span>
                                                    </div>
                                                    <div class='col-lg-3'>
                                                        <span style='float: right;'>
                                                            <form action='deletecomplain.php' method='POST' style='display: inline;'>
                                                                <input type='text' name ='cid' style='display: none;' value='$cid'>
                                                                <button class='btn' type='submit' style='font-size: smaller; padding: 4px; background-color:rgb(45, 53, 63); color: white; margin-right: 20px;'>Delete</button> 
                                                            </form>";        
                                                            if($solved == 'n')
                                                            {
                                                                echo"
                                                                <form action='solvedupdatecomplain.php' method='POST' style='display: inline;'>
                                                                    <input type='text' name ='cid' style='display: none;' value='$cid'>
                                                                    <button class='btn' type='submit' style='font-size: smaller; padding: 4px;background-color:rgb(45, 53, 63); color: white;'>Solve</button>
                                                                </form>";
                                                            }                                                    
                                                       
                                                        echo "</span>
                                                    </div>
                
                                                </div>
                                                <div class='row'>
                                                    <p class='description'>
                                                        $content
                                                    </p>
                                                </div>
                
                                                <div class='row'>
                                                    <div class='col-lg-9 dt' style='padding: 0;'>
                                                        <span style='margin-right: 20px;'>
                                                            Date: $date
                                                        </span>
                                                        <span>
                                                            Time: $time
                                                        </span>
                                                        <br>
                                                        <span>
                                                            In $range
                                                        </span>
                                                        <br>
                                                        <span class='comuser'>
                                                        Location: $lati, $longi
                                                        </span>
                                                        
                                                    </div>
                                                    <div class='col-lg-3'>
                                                        <span class = 'tick' style='float: right;'>
                                                        ";
                                                            if($solved == 'y')
                                                            {
                                                                echo "<i class='fa fa-check ' aria-hidden='true'></i>";
                                                            }
                                                            
                                                        echo "
                                                        </span>
                                                    </div>
                                                </div>
                
                
                                            </div>
                                            <div class='col-lg-3 col-sm-12'>";
                                            if ($image != 'NULL')
                                            {
                                            echo "
                                                <figure>
                                                    <img src = '../static/images/$image' alt='Complainttttttttt image' style='width:100%;'>
                                                </figure>";
                                            }
                                            else
                                            {
                                                echo"<div style='font-style: italic; color: gray;'>No Image.</div>";
                                            }
                                            echo"
                                            </div>
                                        </div>
                                    </div>
                                </li>";

                                }
                                   else{
                                    echo 'no data';
                                }
    
                             }
                            else
                            {
                              echo "<p>Unable to excecute: error pizza shit $sql. " . mysqli_error($link) ."</p>";
                            }
    
    
                          }
                        }
                  }
                  if($flag == 0)
                  {
                        echo "<p>You have no complaints , thats good.</p><br>";
                  }
            }

            ?>
                

                
               
                
            </ul>
            
        </div>
        </div>
        
  



            
        <div class="bg-modal">
            <div class="modal-content">
                <div class="close closelogin">+</div>
                <div class="modal-card-header">
                    Log in
                </div>
                <hr>
                 <div class="card-body">
                    <form action="loginvalidation.php" method="post" onsubmit="return checklogin();">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" class="form-control" id="lusername" placeholder="Enter Username" onkeyup="checkempty('#lusername','#emessage0', 'username')">
                          <div id="emessage0" class="error">sdfsda</div>
                        </div>
                        <div class="form-group">
                          <label for="pass">Password</label>
                          <input type="password" name="password" class="form-control" id="lpass" onkeyup='checkempty("#lpass","#emessage","password");' placeholder="Password">
                          <div id="emessage" class="error"></div>
                        </div>
                        <input type="submit" class="btn btn-dark bb" value="Login">
                        <h3 id="results"></h3>
                      </form>
                      <div style="text-align: center;">
                        <a href="#" class="lr">Don't have an account? Sign up</a>
                      </div>
                </div>
            </div>
        </div>

        
        <div class="bg-modal-r">
            <div class="modal-content">
                <div class="close closereg">+</div>
                <div class="modal-card-header">
                    Register
                </div>
                <hr>
                <div class="card-body">
                    <form action="registervalidation.php" method="post" onsubmit="return checkreg()">
                        <div class="form-group">
                          <label for="emailr">Email address</label>
                          <input type="email" class="form-control" name="email" id="emailr" placeholder="Enter email" onkeyup="checkemail('#emailr','#ee')">
                          <div id="ee" class="error"></div>
                        </div>


                        <div class="form-group">
                            <label for="rusername">Username</label>
                            <input type="text" class="form-control" name="username" id="rusername" placeholder="Enter Username" onkeyup="checkempty('#rusername','#eu','username')">
                            <div id="eu" class='error'></div>
                        </div>


                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup="checkpass('#password', '#ep')">
                          <div class="error" id="ep"></div>
                        </div>

                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Password" onkeyup="checkpassmatch('#password','#cpassword','#ecp')">
                            <div class="error" id="ecp"></div>
                        </div>

                        <button type="submit" class="btn btn-dark bb">Sign up</button>
                      </form>

                      <div style="text-align: center;">
                        <a href="#" class="rl">Have an account? Log in</a>
                      </div>
                      
                </div>
            </div>
        </div>

        
        <div class="bg-modal-n">
            <div class="modal-content">
                <div class="close closenew">+</div>
                <div class="modal-card-header">
                    New complain
                </div>
                <hr>
                <div class="card-body">
                    <form action="addcomplain.php" class='newc' method="post" enctype="multipart/form-data">                   
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" required class="form-control" maxlength="64" name="title" id="title" placeholder="Enter a Title" onkeyup="">
                          <div id="ee" class="error"></div>
                        </div>

                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea type="text" required class="form-control-file" maxlength="600" name="content" id="content" placeholder="Describe your issue" rows="3" onkeyup=""></textarea>
                          <div id="ee" class="error"></div>
                        </div>
        
                        <div class="form-group">
                            <label for="fileToUpload">Add an image(optional)</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>

                        <div class="form-group">
                            <label for="range">Select level of Complain</label>
                            <select class="form-control" name="range" id='range'>
                                <option  value="society">Society</option>
                                <option value="neighborhood">Neighborhood</option>
                                <option value="locality">Locality</option>  
                                <option value="city">City</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <input style='padding: 0 10px 0 0 ; margin: 0'  type="checkbox" value="" id="userloc" onclick="checkclick();">
                            <label for="userloc">Check to enter location other than your default</label>
                            <div class="row" id='locs' >
                                <div class="col-12"><input class="form-control" required style='display: none' <?php $lati = $_SESSION['lati']; echo "value='$lati'" ?> step="0.0000001" name="lati" id='lati' type="number" placeholder="Enter latitude (19.213508)" min='-180' max="180"></div><br><br>
                                <div class="col-12"><input class="form-control" required style='display: none' <?php $longi = $_SESSION['longi']; echo "value='$longi'" ?> step="0.0000001" name="longi" id='longi' type="number" placeholder="Enter longitude (72.874696)" min='-180' max="180"></div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-dark bb">Post New Complaint</button>
                      </form>
                </div>
            </div>
        </div>

                    
    </main>
    </div>
    


<script>

</script>

    <footer class='footer'>
        <div class="container">
            <div class="row" style="padding: 0; margin: 0">
                <div class='footcontent col-lg-4 col-md-12 col-sm-12 liner'>
                    <div class="footerhead">
                        Contact Us
                    </div>
                    <div class='footcontact'>
                            <a href="mailto:gshipurkar708@gmail.com">gshipurkar708@gmail.com</a><br>
                        <a href="mailto:rishilsheth01@gmail.com">rishilsheth01@gmail.com</a><br>
                        <a href="mailto:tanishsurana05@gmail.com">tanishsurana05@gmail.com</a>
                        
                    </div>     
                </div>
                <div class='footcontent  col-lg-4 col-md-12 col-sm-12 liner'>
                    <div class='footerhead l'>
                        Follow us on
                    </div>
                    <div class="icon">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-instagram"></a>
                    </div>
                </div>
                <div class='footcontent col-lg-4 col-md-12 col-sm-12'>
                    <div class="footerhead">
                        About us
                    </div>
                    <div class='footnames'>
                
                            <div>Gaurav Shipurkar</div>
                            <div>Rishil Sheth</div>
                            <div>Tanish Surana</div>
                      
                    </div>
                </div>
        </div>
        </div>

    </footer>
    <script src = "/hood/static/index.js"></script>
</body>
</html>
