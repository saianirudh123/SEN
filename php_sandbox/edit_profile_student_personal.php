<?php
session_start();

?>
<?php
require 'connect.inc.php';
require_once 'change_pwd.php';
?>

<?php
$uploadDir = 'upload/';

if(isset($_POST['submit']))
{
$fileName = $_FILES['userfile']['name'];
$file_name= rand(1000,9999).md5($fileName).rand(1000,9999);
$tmpName = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$ext=strtolower(substr($fileName,strpos($fileName,'.')+1));
$filePath = $uploadDir . $file_name.'.'.$ext;
$max_size=80000000;

if( ($fileType=='image/jpeg' || $fileType=='image/jpg' || $fileType=='image/png') && $fileSize<=$max_size){

$result = move_uploaded_file($tmpName, $filePath);
if (!$result) {
echo "Error uploading file";
}

include '../library/config.php';
include '../library/opendb.php';

if(!get_magic_quotes_gpc())
{
$fileName = addslashes($fileName);
$filePath = addslashes($filePath);
}

$query = "INSERT INTO `upload2`(`uid`, `name`, `type`, `size`, `path`) VALUES ( '{$_SESSION['username']}' , '{$fileName}', '{$fileType}', '{$fileSize}', '{$filePath}') ";

$query_run=mysql_query($query) ;
if(!$query_run){
	
	$update_query="UPDATE `upload2` SET `name`='{$fileName}',`type`='{$fileType}',`size`='{$fileSize}',`path`='{$filePath}' WHERE `uid`={$_SESSION['username']}";
	$query_run1=mysql_query($update_query) ;
	if(!$query_run1){
		echo "failed uploading image";
	}
	
}

include '../library/closedb.php';

echo "<br>Files uploaded<br>";

}
else{
						echo 'Error:Images Only And Less than 10 Mb';
				}	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Profile Student</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>

    <link rel="stylesheet" href="css/mystyle.css"> 	
</head>

<?php
if(isset($_POST['submit'])){
	echo "hello";
	$uid = $_SESSION['username'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	
	$lname=$_POST['lname'];
	$desg=$_POST['desg'];
	$other_email=$_POST['otheremail'];
	$web_url=$_POST['weburl'];
	$sex=$_POST['sex'];
	$details=$_POST['details'];
	$yoj=$_POST['yoj'];
	$contact=$_POST['contact'];
	
	if($sex=="M"|| $sex=="m")
			$sex='1';
	else
			$sex='0';

	//Sending form data to sql db.
	//echo $uid . " " . $fname . " " . $mname . " " . $lname . $desg . $other_email . $web_url . $sex . $details ;
	$sql = "INSERT INTO info (uid, f_name, m_name, l_name, dsg, other_email, web_url, sex, details, contact, yoj) 
	VALUES ('$uid', '$fname', '$mname', '$lname', '$desg', '$other_email', '$web_url', '$sex', '$details', '$contact', '$yoj')";
	$query = mysql_query($sql);
	if(!$query)
	{
		echo "nonononononononooononono";
	}
	/*if(mysqli_query($connect, $sql)
	{
		echo" success";	
	}
	else{
		echo "no";
	}*/

	$halma=$_POST['halma'];
	$hyear=$_POST['hyear'];
	$ialma=$_POST['ialma'];
	$iyear=$_POST['iyear'];
	$ualma=$_POST['ualma'];
	$uyear=$_POST['uyear'];
	$palma=$_POST['palma'];
	$pyear=$_POST['pyear'];
	
	if($halma)
	{
		
		echo "High School";
		$sqlah = "INSERT INTO `sen`.`alma` (`uid`, `year`, `type`, `ins_name`, `des`) 
		VALUES ('$uid', '$hyear', '1', '$halma', 'adsa');";
		$query = mysql_query($sqlah);
			
		if(!$query)
		{
			echo "Insert failed";
			$sqlah="UPDATE  `sen`.`alma` SET  `year` =  '$hyear', `ins_name` =  '$halma' 
			WHERE  `alma`.`uid` = '$uid' AND  `alma`.`type` =1;";
			$query = mysql_query($sqlah);
			if(!$query)
				echo "Update failed too";
			
		}
	
	}
	
	if($ialma)
	{
		
		echo "intermidiate";
		$sqlai = "INSERT INTO `sen`.`alma` (`uid`, `year`, `type`, `ins_name`, `des`) 
		VALUES ('$uid', '$iyear', '2', '$ialma', 'adsa');";
		$query = mysql_query($sqlai);
			
		if(!$query)
		{
			echo "Insert failed";
			$sqlai="UPDATE  `sen`.`alma` SET  `year` =  '$iyear', `ins_name` =  '$ialma' 
			WHERE  `alma`.`uid` = '$uid' AND  `alma`.`type` =2;";
			$query = mysql_query($sqlai);
			if(!$query)
				echo "Update failed too";
			
		}
	
	}
	if($ualma)
	{
		
		echo " Undergrad enteres";
		
		$sqlau = "INSERT INTO `sen`.`alma` (`uid`, `year`, `type`, `ins_name`, `des`) 
		VALUES ('$uid', '$uyear', '3', 'ualma', 'adsa');";
		$query = mysql_query($sqlau);
	
		if(!$query)
		{
			echo "Undergrad Updating";	
			$sqlau="UPDATE  `sen`.`alma` SET  `year` =  '$uyear', `ins_name` =  '$ualma' 
			WHERE  `alma`.`uid` = '$uid' AND  `alma`.`type` =3;";
			$query = mysql_query($sqlau);
		}
	
	}
	if($palma)
	{
		
		echo "Postgrad ";
		$sqlap = "INSERT INTO `sen`.`alma` (`uid`, `year`, `type`, `ins_name`, `des`) 
		VALUES ('$uid', '$pyear', '4', '$palma', 'adsa');";
		$query = mysql_query($sqlap);
			
		if(!$query)
		{
			echo "Inser failed";
			$sqlap="UPDATE  `sen`.`alma` SET  `year` =  '$pyear', `ins_name` =  '$palma' 
			WHERE  `alma`.`uid` = '$uid' AND  `alma`.`type` =4;";
			$query = mysql_query($sqlap);
			if(!$query)
				echo "Update failed too";
			
		}
	
	}

	$aoi = $_POST['aoi'];
	$aoiin = explode(",", $aoi);
	for ($index = 0; $index < count($aoiin); $index++)
	{
        
   		echo $aoiin[$index] .",", "\n";
		$sqlaoi="INSERT INTO `sen`.`rel_uid_aoi` (`uid`, `int`) VALUES ('$uid', '$aoiin[$index]');";
		$query = mysql_query($sqlaoi);
   	}
}


	?>
	

<body>
	<div class="navbar navbar-inverse navbar-static-top" >
		
			<div class="container">
			
				<a href="#" class="navbar-brand">Online Academia</a> 						<!-- to write stuff on nav bar -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>

					
				</button>
				
				<div class ="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">					<!-- first two for styling and the next one for positioning -->
						<form class="navbar-form navbar-left" role="search">
						
							<div class="search_bar">
								<input type="text" class="form-control" placeholder="Search" id="Search_hider" class="aria-hidden" style="display:none">
								
								<button type="submit" id="Searcher" class="btn btn-default" onClick="$('#Search_hider').show(500);"><span class="glyphicon glyphicon-search" aria-hidden="true" ></span></button>

								
							</div>
						</form>
						
						<li><a href="homepage.php" class="navbar-brand">Home </a></li>
						<li class="active"><a href="#" class="navbar-brand" class="active">Profile</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
						  <ul class="dropdown-menu" id="dropdown_for_navbar" role="menu">
						    <li><a href="#" data-toggle="modal" data-target="#cp">Change Password</a></li>
						    <li><a href="edit_profile_student_personal.php">Edit Profile</a></li>
						    <li><a href="#">Something else here</a></li>
						  </ul>
						
						<li><a href="logout.php" class="navbar-brand">Logout</a></li>
						
					</ul>
				</div>
				
			</div>
			
	</div>


	<div class = "modal fade" id="cp" role="dialog">
		<div class = "modal-dialog">
			<div class = "modal-content">
				<form class="form-horizontal" action="" method="post">
					<div class="modal-header">
						<h1 align="center">Change Password</h1>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<div>
							<input type="password" class="form-control" name="old_pwd" id="op" placeholder="Enter Old Password">
							<br>
							<input type="password" class="form-control" name="new_pwd" id="np" placeholder="Enter New Password">
							<br>
							<input type="password" class="form-control" name="cnf_new_pwd" id="npp" placeholder="Confirm New Password">
							<button class="btn btn-primary" type="Submit" name="Modal_Submit_btn" value="Change_Pwd" ><b>Submit</b><br>
							<button class="btn btn-danger" type="Submit" value="Close" data-dismiss = "modal"><b>Close</b><br>
									
							</div>
						</div>
					</div>
						
					<!--div class="modal-footer">
						<a class = "btn btn-default" data-dismiss = "modal">Close</a>
						<a class = "btn btn-primary" type="submit">Submit</a>
					</div-->
				</form>
			</div>
		</div>
	</div>




	<div class="container" style="padding-top: 0px;">
	  	<h2 class="page-header">Edit Profile</h2>
	<div class="row">
  
    <!-- left column -->
      <form class="form-horizontal" role="form" style="padding:10px;" action = "" method="POST"  enctype="multipart/form-data" >

    <div class="col-md-4 ">
      <div class="text-center">
			<img src="images/default_profile_image.png" class="avatar img-circle img-thumbnail" alt="Display Pic">
			<h6><i>Change profile picture</i></h6>
			<input name="userfile" type="file" class="text-center center-block well well-sm">
      </div>
      
    </div>
	
    <!-- edit form column -->
    <div class="col-md-8 personal-info">
      <h2>Personal info</h2>
	  
        <div class="form-group" >
          <label class="col-lg-3 control-label">Designation :</label>
          <div class="col-lg-7">
				<input class="form-control" name="desg" placeholder="Dr/Prof/Er." type="text">
          </div>
        </div>
        <div class="form-group" >
          <label class="col-lg-3 control-label">First name<sup>*</sup>:</label>
          <div class="col-lg-7">
				<input class="form-control" name="fname" placeholder="Anup" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Middle name:</label>
          <div class="col-lg-7">
				<input class="form-control" name="mname" placeholder="Kumar" type="text">
          </div>
        </div>
		
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name<sup>*</sup>:</label>
          <div class="col-lg-7">
				<input class="form-control" name="lname" placeholder="Rai" type="text">
          </div>
        </div>
		
        <div class="form-group">
          <label class="col-lg-3 control-label">Gender<sup>*</sup>:</label>
          <div class="col-lg-7">
				<input class="form-control" name="sex" placeholder="M/F" type="text">
          </div>
        </div>
	
		
        <div class="form-group">
          <label class="col-lg-3 control-label">Webmail ID:</label>
          <div class="col-lg-7">
				<input class="form-control" name="uid" placeholder="9 digits" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Web Url:</label>
          <div class="col-lg-7">
				<input class="form-control" name="weburl" placeholder="Linkedin/Personal Home Page" type="text">
          </div>
        </div>
        
		 <div class="form-group">
          <label class="col-lg-3 control-label">Stream:</label>
          <div class="col-lg-6">
				<div class="ui-select">
					<select id="stream" class="form-control">
						<option placeholder=>B.Tech.(ICT)</option>
						<option placeholder=>B.Tech.(Honors)</option>
						<option placeholder=>M.Tech.(ICT)</option>
						<option placeholder=>M.Sc.(IT)</option>
						<option placeholder=>M.Des.(Communication Design)</option>
						<option placeholder=>M.Sc.(ICT in Agriculture and Rural Development)</option>
					
					</select>
				</div>
          </div>
        </div>
		
		 <div class="form-group">
          <label class="col-lg-3 control-label">Year of Joining:</label>
          <div class="col-lg-2">
				<input class="form-control" name="yoj" placeholder="20xx" type="number">
          </div>
        </div>
		
		
		 <div class="form-group">
          <label class="col-lg-3 control-label">Courses enrolled in:</label>
          <div class="col-lg-7">
				<input class="form-control" placeholder="Human Computer Interaction,Models of Computation" type="text">
          </div>
        </div>
	
		 
		<div class="form-group">
          <label class="col-lg-3 control-label">About Yourself:</label>
          <div class="col-lg-7">
				<textarea class="form-control" name = "details" type="text" rows="5"></textarea>
          </div>
        </div>
		
		 
		
		<div class="form-group">
          <label class="col-lg-3 control-label">Area of Interests:</label>
          <div class="col-lg-7">
				<textarea class="form-control" name = "aoi" type="text" rows="5" placeholder="Neural_Networks,Victorian_Literature,Graph_Theory" ></textarea>
          </div>
        </div>
		
		<!--<div class="form-group">
          <label class="col-lg-3 control-label">Research Fields:</label>
          <div class="col-lg-7">
				<input class="form-control" placeholder="Information retrieval,Artificial Intelligence" type="text">
          </div>
        </div> -->
		
        <div class="form-group">
          <label class="col-lg-3 control-label">Alternate Email:</label>
          <div class="col-lg-7">
            <input class="form-control" name="otheremail" placeholder="abc@abc.com" type="email">
          </div>
        </div>
		
		
        <div class="form-group">
          <label class="col-lg-3 control-label">Contact Number:</label>
          <div class="col-lg-7">
            <input class="form-control" name="contact" placeholder="10 digits" type="number">
          </div>
        </div>

        <hr>
		
		
		<h4>Alma Matter</h4>
			<div class="form-group">
				<label class="col-lg-3 control-label">High School</label>
				<div class="col-lg-7">
					<input class="form-control" name="halma" type="text">
				</div>
				<div class="col-lg-2">
					<input class="form-control" name="hyear" placeholder="Year" type="number">
				</div>
				
				<label class="col-lg-3 control-label">Intermediate/+2</label>
				<div class="col-lg-7">
					<input class="form-control" name="ialma" type="text">
				</div>
				<div class="col-lg-2">
					<input class="form-control" name="iyear" placeholder="Year" type="number">
				</div>
				
				<label class="col-lg-3 control-label">UG Institute</label>
				<div class="col-lg-7">
					<input class="form-control" name="ualma" type="text">
				</div>
				<div class="col-lg-2">
					<input class="form-control" name="uyear" placeholder="Year" type="number">
				</div>
				
				<label class="col-lg-3 control-label">PG Institute</label>
				<div class="col-lg-7">
					<input class="form-control" name="palma" type="text">
				</div>
				<div class="col-lg-2">
					<input class="form-control" name="pyear" placeholder="Year" type="number">
				</div>
				
			</div>
		
		
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-success" value="Save and Continue" type="Submit"  name = "submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
