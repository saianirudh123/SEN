<!DOCTYPE html>
<?php
session_start();
?>  

<?php
require_once 'connect.inc.php';
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

<html lang="en">
<head>
  <title>View Profile</title>
  <title>View Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mystyle.css"> 
  <link rel="stylesheet" href="css/sidebar_styles.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
	
</head>

<body class="side_bar">

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
						
						<li><a href="homepage.php" class="navbar-brand">Home</a></li>
						<li><a href="<?php if(is_prof($_SESSION['username']))
									  { echo "edit_profile_prof_personal.php";}
									  else{ echo"Student_profile_view_v0.0.php";}
									  ?>" class="navbar-brand">Profile</a></li>


						  <li class="dropdown" >
						  <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
						  <ul class="dropdown-menu" id="dropdown_for_navbar" role="menu">
						    <li><a href="#" data-toggle="modal" data-target="#cp">Change Password</a></li>
						    <li><a href="<?php if(is_prof($_SESSION['username']))
									  { echo "edit_profile_prof_personal.php";}
									  else{ echo"edit_profile_student_personal.php";}
									  ?>">Edit Profile</a></li>
						    <li><a href="#">Something else here</a></li>
						  </ul>
						</li>
			
						</li>
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


<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Side Bar</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
					<ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="Student_profile_view_v0.0.php">View Profile</a></li>
						<li><a href="edit_profile_student_personal.php">Edit Profile</a></li>					
					</ul>
				</li>
		
				
				<li ><a href="view_course.php">Course Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a></li>


				<li><a href="#">Discussion Forum<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span></a></li>
				
				<li ><a href="#">Groups<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-tent"></span></a></li>

				<li ><a href="#">Notifications<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-bell"></span></a></li>
				
				

					<!-- <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
					<ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="#">Change Password</a></li>
						<li><a href="#">Another action</a></li>					
					</ul>
				</li> -->

			</ul>
		</div>
	</div>

</nav>

<br>
<br>		
<div class="container">
	<br>
	<br>

	 <center>	<h1>Courses Offered At DA-IICT</h1> </center>



  <!--/row--> 
<div class="row">
    <div class="col-md-12">

		<div class="well-lg panel panel-default" id="toggable_box">
		
			<div class="panel-body" >
			<!--	<p> here comes the navigation bar</p> -->
				<div role="tabpanel">

             <!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">

						<li role="presentation" class="active"><a href="#it" aria-controls="it" role="tab" data-toggle="tab"><font size="4">Information Tech</font></a></li>
						<li role="presentation" ><a href="#el" aria-controls="el" role="tab" data-toggle="tab"><font size="4">Electronics</font></a></li>
						<li role="presentation" ><a href="#ct" aria-controls="ct" role="tab" data-toggle="tab"><font size="4">Communication Tech</font></a></li>
						<li role="presentation" ><a href="#hm" aria-controls="hm" role="tab" data-toggle="tab"><font size="4">Humanities</font></a></li>
						<li role="presentation" ><a href="#sc" aria-controls="sc" role="tab" data-toggle="tab"><font size="4">Science</font></a></li>
						<li role="presentation" ><a href="#pc" aria-controls="pc" role="tab" data-toggle="tab"><font size="4">Other</font></a></li>
					</ul>

					  <!-- Tab panes -->
					<div class="tab-content">
						<!--About tab-->
					  				    	
					    <div role="tabpanel" class="tab-pane active" id="it">

							
							<div class="col-md-10 col-md-offset-1">
				      			
				      			<form class="form-horizontal" role="form" style="padding:10px;">
								
								<?php 
								$sql = "SELECT * FROM  `course` WHERE  `course_code` LIKE  'IT%'";
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
									?>    
				      				<div class="panel ">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" 
											 data-toggle="collapse" data-parent="#accordion"
											 href="#collapseP<?=$i?>">
												<?php echo $row['course_code']; echo ':'; echo $row['course_name'];
									?></h4> 
											</a>
										</div>
										<div id="collapseP<?=$i?>" class="panel-collapse collapse out">
											<div class="panel-body">
												
														<?php
														echo"<label class=\"col-lg-4\">Instructor:</label><p class=\"col-lg-8\">{$row['instructor']}</p><label class=\"col-lg-4\">Teaching Assistant:</label><p class=\"col-lg-8\">{$row['TAs']}</p><label class=\"col-lg-4\">Semester:</label><p class=\"col-lg-8\">{$row['semester']}</p><label class=\"col-lg-4\">Credits:</label><p class=\"col-lg-8\">{$row['credits']}</p><label class=\"col-lg-4\">Description:</label><p class=\"col-lg-8\">{$row['description']}</p><label class=\"col-lg-4\">Material Link:</label><p class=\"col-lg-8\"><a href=\"{$row['link']}\">{$row['link']}</a></p>";
														?>
											</div>
										</div>
								   </div>            
													<?php } ?>


				       			</form>


			      			</div>
				       </div>


				       <div role="tabpanel" class="tab-pane" id="el">

							
							<div class="col-md-10 col-md-offset-1">
				      			
				      			<form class="form-horizontal" role="form" style="padding:10px;">
								<?php 
								$sql = "SELECT * FROM  `course` WHERE  `course_code` LIKE  'EL%'";
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
									?>    
				      				<div class="panel ">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" 
											 data-toggle="collapse" data-parent="#accordion"
											 href="#collapseE<?=$i?>">
												<?php echo $row['course_code']; echo ':'; echo $row['course_name'];
									?></h4> 
											</a>
										</div>
										<div id="collapseE<?=$i?>" class="panel-collapse collapse out">
											<div class="panel-body">
												
														<?php
														echo"<label class=\"col-lg-4\">Instructor:</label><p class=\"col-lg-8\">{$row['instructor']}</p><label class=\"col-lg-4\">Teaching Assistant:</label><p class=\"col-lg-8\">{$row['TAs']}</p><label class=\"col-lg-4\">Semester:</label><p class=\"col-lg-8\">{$row['semester']}</p><label class=\"col-lg-4\">Credits:</label><p class=\"col-lg-8\">{$row['credits']}</p><label class=\"col-lg-4\">Description:</label><p class=\"col-lg-8\">{$row['description']}</p><label class=\"col-lg-4\">Material Link:</label><p class=\"col-lg-8\"><a href=\"{$row['link']}\">{$row['link']}</a></p>";
														?>
											</div>
										</div>
								   </div>            
													<?php } ?>


				       			</form>


			      			</div>
				       </div>
				       <div role="tabpanel" class="tab-pane" id="ct">

							
							<div class="col-md-10 col-md-offset-1">
				      			
				      			<form class="form-horizontal" role="form" style="padding:10px;">
								<?php 
								$sql = "SELECT * FROM  `course` WHERE  `course_code` LIKE  'CT%'";
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
									?>    
				      				<div class="panel ">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" 
											 data-toggle="collapse" data-parent="#accordion"
											 href="#collapseC<?=$i?>">
												<?php echo $row['course_code']; echo ':'; echo $row['course_name'];
									?></h4> 
											</a>
										</div>
										<div id="collapseC<?=$i?>" class="panel-collapse collapse out">
											<div class="panel-body">
												
														<?php
														echo"<label class=\"col-lg-4\">Instructor:</label><p class=\"col-lg-8\">{$row['instructor']}</p><label class=\"col-lg-4\">Teaching Assistant:</label><p class=\"col-lg-8\">{$row['TAs']}</p><label class=\"col-lg-4\">Semester:</label><p class=\"col-lg-8\">{$row['semester']}</p><label class=\"col-lg-4\">Credits:</label><p class=\"col-lg-8\">{$row['credits']}</p><label class=\"col-lg-4\">Description:</label><p class=\"col-lg-8\">{$row['description']}</p><label class=\"col-lg-4\">Material Link:</label><p class=\"col-lg-8\"><a href=\"{$row['link']}\">{$row['link']}</a></p>";
														?>
											</div>
										</div>
								   </div>            
													<?php } ?>


				       			</form>


			      			</div>
				       </div>
				       <div role="tabpanel" class="tab-pane" id="hm">

							
							<div class="col-md-10 col-md-offset-1">
				      			
				      			<form class="form-horizontal" role="form" style="padding:10px;">
								<?php 
								$sql = "SELECT * FROM  `course` WHERE  `course_code` LIKE  'HM%'";
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
									?>    
				      				<div class="panel ">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" 
											 data-toggle="collapse" data-parent="#accordion"
											 href="#collapseH<?=$i?>">
												<?php echo $row['course_code']; echo ':'; echo $row['course_name'];
									?></h4> 
											</a>
										</div>
										<div id="collapseH<?=$i?>" class="panel-collapse collapse out">
											<div class="panel-body">
												
														<?php
														echo"<label class=\"col-lg-4\">Instructor:</label><p class=\"col-lg-8\">{$row['instructor']}</p><label class=\"col-lg-4\">Teaching Assistant:</label><p class=\"col-lg-8\">{$row['TAs']}</p><label class=\"col-lg-4\">Semester:</label><p class=\"col-lg-8\">{$row['semester']}</p><label class=\"col-lg-4\">Credits:</label><p class=\"col-lg-8\">{$row['credits']}</p><label class=\"col-lg-4\">Description:</label><p class=\"col-lg-8\">{$row['description']}</p><label class=\"col-lg-4\">Material Link:</label><p class=\"col-lg-8\"><a href=\"{$row['link']}\">{$row['link']}</a></p>";
														?>
											</div>
										</div>
								   </div>            
													<?php } ?>


				       			</form>


			      			</div>
				       </div>
				       <div role="tabpanel" class="tab-pane" id="sc">

							
							<div class="col-md-10 col-md-offset-1">
				      			
				      			<form class="form-horizontal" role="form" style="padding:10px;">
								<?php 
								$sql = "SELECT * FROM  `course` WHERE  `course_code` LIKE  'SC%'";
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
									?>    
				      				<div class="panel ">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" 
											 data-toggle="collapse" data-parent="#accordion"
											 href="#collapseS<?=$i?>">
												<?php echo $row['course_code']; echo ':'; echo $row['course_name'];
									?></h4> 
											</a>
										</div>
										<div id="collapseS<?=$i?>" class="panel-collapse collapse out">
											<div class="panel-body">
												
														<?php
														echo"<label class=\"col-lg-4\">Instructor:</label><p class=\"col-lg-8\">{$row['instructor']}</p><label class=\"col-lg-4\">Teaching Assistant:</label><p class=\"col-lg-8\">{$row['TAs']}</p><label class=\"col-lg-4\">Semester:</label><p class=\"col-lg-8\">{$row['semester']}</p><label class=\"col-lg-4\">Credits:</label><p class=\"col-lg-8\">{$row['credits']}</p><label class=\"col-lg-4\">Description:</label><p class=\"col-lg-8\">{$row['description']}</p><label class=\"col-lg-4\">Material Link:</label><p class=\"col-lg-8\"><a href=\"{$row['link']}\">{$row['link']}</a></p>";
														?>
											</div>
										</div>
								   </div>            
													<?php } ?>


				       			</form>


			      			</div>
				       </div>
				       <div role="tabpanel" class="tab-pane" id="pc">

							
							<div class="col-md-10 col-md-offset-1">
				      			
				      			<form class="form-horizontal" role="form" style="padding:10px;">
								<?php 
								$sql = "SELECT * FROM  `course` WHERE  `course_code` LIKE  'PC%'";
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
									?>    
				      				<div class="panel ">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" 
											 data-toggle="collapse" data-parent="#accordion"
											 href="#collapsePC<?=$i?>">
												<?php echo $row['course_code']; echo ':'; echo $row['course_name'];
									?></h4> 
											</a>
										</div>
										<div id="collapsePC<?=$i?>" class="panel-collapse collapse out">
											<div class="panel-body">
												
														<?php
														echo"<label class=\"col-lg-4\">Instructor:</label><p class=\"col-lg-8\">{$row['instructor']}</p><label class=\"col-lg-4\">Teaching Assistant:</label><p class=\"col-lg-8\">{$row['TAs']}</p><label class=\"col-lg-4\">Semester:</label><p class=\"col-lg-8\">{$row['semester']}</p><label class=\"col-lg-4\">Credits:</label><p class=\"col-lg-8\">{$row['credits']}</p><label class=\"col-lg-4\">Description:</label><p class=\"col-lg-8\">{$row['description']}</p><label class=\"col-lg-4\">Material Link:</label><p class=\"col-lg-8\"><a href=\"{$row['link']}\">{$row['link']}</a></p>";
														?>
											</div>
										</div>
								   </div>            
													<?php } ?>


				       			</form>


			      			</div>
				       </div>
					   
					</div>


				</div>

			</div>
		</div>
	</div>
  </div>
</div>
<!--/container-->
</body>
</html>-