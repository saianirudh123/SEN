
<?php
 

$tbl_name="fquestions"; // Table name 
 
// Connect to server and select database.
//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");
$servername = "localhost";
$username = "arra"; 
$password = "";
$dbname = "sen_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// get data that sent from form 
$topic=strip_tags($_POST['topic']);
$detail=strip_tags($_POST['detail']);
$name=strip_tags($_POST['name']);
$email=strip_tags($_POST['email']);
 
$datetime=date("d/m/y h:i:s"); //create date time
 
$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($conn,$sql);
 
if($result){
echo "Successful<BR>";
echo "<a href=main_forum.php>View your topic</a>";
}
else {
echo "ERROR";
}
mysqli_close($conn);
?>