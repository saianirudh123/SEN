<!DOCTYPE html>
<?php
session_start();
?>

<?php
require 'connect.inc.php';
require_once 'change_pwd.php';
?>


<?php
function is_prof($uid)
{
	if(substr_compare((string)$uid, "00", 4, 2) == 0)
	   return true;
	  else
	  return false;
  
}
?>

<?php
  if (isset($_POST['Save']))
  {
	  if (isset($_POST['title'])) {
		$Title = $_POST['title'];
		$Authors =   $_POST['Authors'];
		$Abstract =  $_POST['Abstract'];

		$date = $_POST['Date'];
		$Journal =  $_POST['Journal'];


    	$Conference = $_POST['Conference'];
	    $Link = strip_tags($_POST['Link']);
		$time =  date("h:i:s");  
		$insert = "INSERT INTO `publications` (`authors`, `topic`, `abstract`, `link`, `conference`, `date`, `journel`, `pub_type`, `time_stp`) VALUES ('$Authors', '$Title', '$Abstract', '$Link', '$Conference', '$date',  '$Journal', 1, '$time')";
					$set = mysql_query($insert);
					$aff = mysql_affected_rows();
							if($aff==0){
					echo mysql_error();
  }
	else if($aff == 1)
	{
	  
	   // $insert = "INSERT INTO `publications_user` (`uid`, `pub_id`) VALUES ('$_SESSION['username']', '$pub_id')";
	  //$set = mysql_query($insert);
		//			$aff = mysql_affected_rows();
			//				if($aff==0){
				//	echo mysql_error();
							  }
	
	if(is_prof($_SESSION['username']))
			{
					header("Location: http://localhost/php_sandbox/Prof_profile_view.php"); /* Redirect browser */
			}	else
					header("Location: http://localhost/php_sandbox/Student_profile_view_v0.0.php"); /* Redirect browser */

exit;
				
}
  }
?>

<html lang="en">
<head>
  <title>Edit Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mystyle.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
	
</head>

<body>
<div class="navbar navbar-inverse navbar-static-top" >
		
			<div class="container">
			
				<a href="#" class="navbar-brand">Online Academia</a> 
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					
				</button>
				
				<div class ="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">					<!-- first two for styling and the next one for positioning -->
						<form class="navbar-form navbar-left" role="search">
						
							<div class="search_bar">
								<input type="text" class="form-control" placeholder="Search">
								<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

							</div>
						</form>
						
						<li><a href="homepage.html" class="navbar-brand">Home</a></li>
						<li><a href="view_profile.html" class="navbar-brand">Profile</a></li>


						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
						    <li><a href="#">Change Password</a></li>
						    <li><a href="#">Edit Profile</a></li>
						    <li><a href="#">Something else here</a></li>
						    <li class="divider"></li>
						    <li><a href="#">Separated link</a></li>
						    <li class="divider"></li>
						    <li><a href="#">One more separated link</a></li>
						  </ul>
						</li>
			
						</li>
						<li><a href="index.html" class="navbar-brand">Logout</a></li>
						
					</ul>
				</div>
				
			</div>
			
		</div>


    

	<div class="container" style="padding-top: 0px;">
		<h2 class="page-header">Edit Profile</h2>
	<div class="row">

  
	
    <!-- edit form column -->
    <div>
		<h2>Publications</h2>
		<h3>Research Paper</h3>
			
				<form method="post" class="form-horizontal" role="form" style="padding:10px;">
	  
						<div class="form-group" >
							<label class="col-md-3 control-label">Title:</label>
							<div class="col-md-7">
								<input required class="form-control" name="title" placeholder="Angry Bird Bot" type="text">
							</div>
						</div>

						<div class="form-group" >
							<label class="col-md-3 control-label">Authors:</label>
							<div class="col-md-7">
								<input class="form-control" name="Authors" placeholder="anil roy,amit bhat" type="text">
							</div>
						</div>
						
						<div class="form-group" >
							<label class="col-md-3 control-label">Abstract:</label>
							<div class="col-md-7">
								<textarea class="form-control" name="Abstract" placeholder="Simulated an artificially intelligent bot for the popular game Angry birds which could compete with human players." type="text" rows="5"></textarea>
							</div>
						</div>
						
						
						
						
						
						<div class="form-group" >
							<label class="col-lg-3 control-label">Date of Publication:</label>
							<div class="col-lg-2">
								<input class="form-control" name="Date" placeholder="" type="Date">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Journal:</label>
							<div class="col-lg-7">
								<input class="form-control" name="Journal" value="" type="text">
							</div>
		  
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Conference:</label>
							<div class="col-lg-7">
								<input class="form-control" name="Conference" value="" type="text">
							</div>
		  
							
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Status:</label>
							<div class="col-lg-2">
								<div class="ui-select">
									<select id="Status" class="form-control ">
										<option placeholder="">Pending</option>
										<option placeholder="">Approved</option>
										<option placeholder="">Published</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Link:</label>
							<div class="col-lg-7">
								<input class="form-control" name="Link" value="" type="link">
							</div>
		  
							
						</div>
						<div class="col-md-8 col-md-offset-7 ">
									
									<button name="Save" type="submit" class="btn btn-primary ">Save and Finish</button>
									</form>
									<input class="btn btn-default " value="Cancel" type="reset">
					</div>

						
					
								
				</div>			
			</div>
	
	</div>							
		
  
					  </div>
  </div>
		
</body>
</html>
