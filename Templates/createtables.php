<?php
$link = @mysqli_connect("localhost", "gauhostu_Project", "Tanish", "gauhostu_Project") or die("ERROR: Unable to connect: " . mysqli_connect_error());

echo "<p>Connected successfully to the database.</p>";

$sql0 = "CREATE TABLE IF NOT EXISTS User(User_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,Username VARCHAR(100) NOT NULL, Password VARCHAR(100) NOT NULL,Email VARCHAR(64) NOT NULL)";
if(mysqli_query($link, $sql0))
{
    echo "<p>User Table Created Successfully!</p>";   
}
else
{
    echo "ERROR: Unable to execute $sql0" . mysqli_error($link);   
}

$sql1="CREATE TABLE IF NOT EXISTS Complain(Complain_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,User_ID INT NOT NULL ,Title VARCHAR(64) NOT NULL ,Content VARCHAR(600),Votes BIGINT NOT NULL,Date VARCHAR(64) NOT NULL,Time VARCHAR(64) NOT NULL, Ran VARCHAR(64) NOT NULL,Img VARCHAR(64) NOT NULL,Latitude VARCHAR(64) NOT NULL,Longitude VARCHAR(64) NOT NULL,Solved CHAR(64) NOT NULL)";

if(mysqli_query($link, $sql1))
{
    echo "<p>Complain Table Created Successfully!</p>";   
}
else
{
    echo "ERROR: Unable to execute $sql1" . mysqli_error($link);   
}

$sql3="CREATE TABLE IF NOT EXISTS Vote(Complain_ID INT NOT NULL,User_ID INT NOT NULL)";
if(mysqli_query($link, $sql3))
{
    echo "<p>Vote Table Created Successfully!</p>";   
}
else
{
    echo "ERROR: Unable to execute $sql3" . mysqli_error($link);   
}
?>