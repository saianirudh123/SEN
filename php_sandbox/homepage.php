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
						     <li><a href="project_edit.php">Add Project</a></li>
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
						<li><a href="<?php if(is_prof($_SESSION['username']))
									  { echo "Prof_profile_view.php";}
									  else{ echo"Student_profile_view_v0.0.php";}
									  ?>">View Profile</a></li>
						<li><a href="<?php if(is_prof($_SESSION['username']))
									  { echo "edit_profile_prof_personal.php";}
									  else{ echo"edit_profile_student_personal.php";}
									  ?>">Edit Profile</a></li>					
					</ul>
				</li>
		
				
				<li ><a href="view_course.php">Course Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a></li>


				<li><a href="main_forum.php">Discussion Forum<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span></a></li>
				
				<li ><a href="#">Groups<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-tent"></span></a></li>

				<li ><a href="#">Notifications<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-bell"></span></a></li>
				<?php
				if(is_prof($_SESSION['username']))
				{ echo'<li ><a href="edit_course.php">Edit Course<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-bell"></span></a></li>';
				}
				?>
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
<div class="main">
<!-- Content Here -->
	<div class="container">

		<div class="row">
			<div class="col-lg-8">


    <div class="panel panel-primary">

        <div class="panel-heading">

            <h3 class="panel-title">Recent Projects</h3>

        </div>
		
							<div class="col-md-10 col-md-offset-1">
				      			
				      			<form class="form-horizontal" action="" method="post" role="form" style="padding:10px;">
								
								<?php
								if(isset($_POST['Next'])){
								  $_SESSION["turn"]++;
								}
								else if(isset($_POST['Prev'])){
								  $_SESSION["turn"]--;
								}
								else
								{
								  $_SESSION["turn"] = 0;
								}
								
								$sql = "SELECT * FROM  `project` order by timestamp desc";
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
									//$_SESSION["turn"] = $i ;
									//$_SESSION["turn"]++;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
									?>    
				      				<div class="panel ">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle" 
											 data-toggle="collapse" data-parent="#accordion"
											 href="#collapseP<?=$i?>">
												<?php
														if($i >= $_SESSION["turn"]*10 && ($i <= $_SESSION["turn"]*10 + 10))
												{echo $row['title'];
													  echo $_SESSION["turn"];
												}?></h4> 
											</a>
										</div>
										<div id="collapseP<?=$i?>" class="panel-collapse collapse out">
											<div class="panel-body">
														<?php
														    //$name = $_POST['Next'];
															
														if($i >= $_SESSION["turn"] && ($i <= $_SESSION["turn"]*10 + 10))
													{
													  echo $_SESSION["turn"];
														echo"<label class=\"col-lg-4\">Project Title:</label><p class=\"col-lg-8\">{$row['title']}</p><label class=\"col-lg-4\">Guide:</label><p class=\"col-lg-8\">{$row['guide']}</p><label class=\"col-lg-4\">Funding Organisation:</label><p class=\"col-lg-8\">{$row['funding_org']}</p>";
											//<!--<label class=\"col-lg-4\">Credits:</label><p class=\"col-lg-8\">{$row['credits']}</p><label class=\"col-lg-4\">Description:</label><p class=\"col-lg-8\">{$row['description']}</p><label class=\"col-lg-4\">Material Link:</label><p class=\"col-lg-8\"><a href=\"{$row['link']}\">{$row['link']}</a></p>";-->
													}	?>
											</div>
										</div>
								   </div>            
													<?php } ?>
								<button type="Submit" name="Prev" value="Next" ><b>Prev</b><br>
								<button type="Submit" name="Next" value="Next" ><b>Next</b><br>

				       			</form>


			      			</div>
				    
        <div class="panel-body">
</div>

    </div>
<?php
/*
    <div class="panel panel-success">

        <div class="panel-heading">

            <h3 class="panel-title">Project SEN Added new Interns</h3>

        </div>

        <div class="panel-body">

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ante risus, tincidunt id viverra vitae, faucibus a ex. Praesent vel ante dolor. Praesent nec eros sit amet felis aliquam convallis nec quis lectus. Fusce vulputate dignissim augue, eget luctus mi dapibus ac. Nunc id auctor lectus, vel auctor metus. Cras nec leo in lacus faucibus iaculis ut at nulla. Donec at nulla tellus.

Etiam hendrerit tristique faucibus. Quisque ultricies id sapien sed rhoncus. Aenean eget lectus vel elit molestie faucibus. Donec quis erat a ipsum pretium condimentum non a tortor. Nulla facilisi. Aenean rutrum quam condimentum nulla aliquet, vitae accumsan enim semper. Donec tristique mattis felis, a tincidunt quam luctus in. Nunc tempus eu velit non vulputate. Donec in mauris libero. Fusce quis nisl ut urna consequat dictum. Donec sagittis mi mi, vitae interdum ligula ullamcorper a.
</div>

    </div>
*/
?>
<script>
		function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
	}
	$(document).ready(function () {
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
	});
</script>
</body>
</html>