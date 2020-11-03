 <?php 
      session_start();
      if ($_SERVER["REQUEST_METHOD"] == "POST")
       {
       $link=@mysqli_connect("localhost", "gauhostu_Project", "Tanish","gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());
       echo "Connected successfully to the database.";
       
        //TITLE
        $title=$_POST["title"];
        $t=0;
        if(empty($title))
        {
            $m_title='<div style="color:red; font-size:20px;">The Title Field Is Empty!</div>';
            echo $m_title;
        }
        else{
            
            $t=1;                

        }
        
        //CONTENT
        $content=$_POST["content"];
        $c=0;
        if(empty($content))
        {
            $m_content='<div style="color:red; font-size:20px;">The Content Field Is Empty!</div>';
            echo $m_content;
        }
       else
        {   
            $c=1;                
        }
        
        //SOCIETY
       
        $dropdown=$_POST["range"];
        $d=0;
        if(empty($dropdown))
        {
            $m_drop='<div style="color:red; font-size:20px;">The Dropdown Field Is Empty!</div>';
            echo $m_drop;
        }
       else
        {   echo $dropdown;
            $d=1;                
        }
       
        //LATITUDE
       $latitude=$_POST["lati"];
       $la=0;
       if(empty($latitude))
        {
            $m_latitude='<div style="color:red; font-size:20px;">The Latitude Field Is Empty!</div>';
            echo $m_latitude;
        }
        else
        {
            $la=1;
        }
       
        //LONGITUDE
        $longitude=$_POST["longi"];
        $lo=0;
        if(empty($longitude))
        {
            $m_longitude='<div style="color:red; font-size:20px;">The Longitude Field Is Empty!</div>';
            echo $m_longitude;
        }
        else
        {
            $lo=1;
        }
        
        //IMAGE
        $target_file =  "../static/images/".($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          echo $check;
          if($check !== false) 
          {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } 
          else 
          {
            if($d==1 and $c==1 and $la==1 and $lo==1 and $t==1)
            {
            date_default_timezone_set("Asia/Kolkata");
            $Date=date("d M,Y");
            $Time=date("h:i:s A");
            $vot=0;
            $sol='n';
            $image='NULL';
            $uid=$_SESSION["uid"];
            $sql="INSERT INTO Complain(User_ID,Title,Content,Votes,Date,Time,Ran,Img,Latitude,Longitude,Solved) VALUES ('$uid','$title','$content','$vot','$Date','$Time','$dropdown','$image','$latitude','$longitude','$sol')";
            if(mysqli_query($link, $sql))
            {
                echo "<p>Complain Query Executed Successfully!</p>";   
                //header("location:mycomplain.php");
            }
            else
            {
                echo "ERROR: Unable to execute $sql1" . mysqli_error($link);   
            }
            }
             $uploadOk=0;
          }
        if($uploadOk==1)
        {
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
           
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } 
        else {
         if($d==1 and $c==1 and $la==1 and $lo==1 and $t==1)
         {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
          {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            $image=basename( $_FILES["fileToUpload"]["name"]);
            echo $image;
            date_default_timezone_set("Asia/Kolkata");
            $Date=date("d M,Y");
            $Time=date("h:i:s A");
            $vot=0;
            $sol='n';
            $uid=$_SESSION["uid"];
            $sql0="INSERT INTO Complain(User_ID,Title,Content,Votes,Date,Time,Ran,Img,Latitude,Longitude,Solved) VALUES ('$uid','$title','$content','$vot','$Date','$Time','$dropdown','$image','$latitude','$longitude','$sol')";
            if(mysqli_query($link, $sql0))
            {
                echo "<p>Complain Query Executed Successfully!</p>";  
                //header("location:mycomplain.php");
            }
            else
            {
                echo "ERROR: Unable to execute $sql1" . mysqli_error($link);   
            }
          }
          else 
          {
            echo "Sorry, there was an error uploading your file.";
          }
            
       }
        }
       }
       }

       header('Location:mycomplaints.php');

    
       
       
  ?>