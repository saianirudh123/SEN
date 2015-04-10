<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
$servername = "localhost";
$username = "arra"; 
$password = "";
$dbname = "sen_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if (isset($_POST['title'])) {
$title = strip_tags($_POST['title']);
//$typ = strip_tags($_POST['res']);
$description = strip_tags($_POST['description']);

$guide = strip_tags($_POST['guide']);
$fund = strip_tags($_POST['fund']);


$from = strip_tags($_POST['from']);
$to = strip_tags($_POST['to']);
}

$status = $_POST['stat'][0];
echo "<br>\"".$title."\"Its the t<br>";

$typ = $_POST['res'][0];
echo "<br>\"".$typ."\"Its the Typ<br>";

/*$aoi = $_POST['aoi'];
$aoiin = explode(",", $aoi);
for ($index = 0; $index < count($aoiin); $index++)
{
       
  echo $aoiin[$index] .",", "\n";
//$sqlaoi="INSERT INTO `sen`.`rel_uid_aoi` (`uid`, `int`) VALUES ('$uid', '$aoiin[$index]');";
//$query = mysql_query($sqlaoi);}
}*/

if($typ = "BTP")
{
  $prtype = 1;
  echo $prtype;
}
else if($typ = "SRI")
{
  $prtype = 2;    
  echo $prtype;
}
else if($typ = "RI")
{
  $prtype = 3;
  echo $prtype;
}
for($i=0;$i<count($_POST['associates']);$i++)  
{  
echo "associates $i = ".$_POST['associates'][$i]."<br>";  
}


echo "<stong>Name: </strong> ".$title."<br>";	
echo "<stong>Type: </strong> ".$typ."<br>"; 
echo "<stong>Description: </strong> ".$description."<br>";	
echo "<stong>Status: </strong> ".$status."<br>";
echo "<stong>Guide: </strong> ".$guide."<br>";	
echo "<stong>Funding Organization: </strong> ".$fund."<br>";	

echo "<stong>From: </strong> ".$from."<br>";	
echo "<stong>To: </strong> ".$to."<br>";

date_default_timezone_set('Asia/Kolkata');
$time =  date("h:i:s");

$sql = " INSERT INTO project (`title`,`des`,`fro`,`to`,`guide`,`funding_org`,`time`,`status`,`pro_type`) 
        VALUES ('{$title}','{$description}','{$from}','{$to}','{$guide}','{$fund}','{$time}','{$status}','{$prtype}')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo "time<br>".$time;
$q = " SELECT * FROM project WHERE time = '$time';";

$result = mysqli_query($conn,$q);
			if(!$result)
			 {
 				 die('Could not get data: ' . mysql_error());
			 }
$row = mysqli_fetch_array(mysqli_query($conn, $q), MYSQL_ASSOC);
$id = $row['pro_id'];
for($i=0;$i<count($_POST['associates']);$i++)  
{
	$var = $_POST['associates'][$i];  
  $l = " INSERT INTO rel_proj_login (`pid`,`uid`) VALUES ($id,$var)";
  if (mysqli_query($conn, $l)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $l . "<br>" . mysqli_error($conn);
}
  echo "associates $i = ".$_POST['associates'][$i]."<br>";  
}


mysqli_close($conn);


?>

	
</body>
</html>

