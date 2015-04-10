
<?php
session_start();
?>
<?php
require 'connect.inc.php';
require_once 'change_pwd.php';

	?>
	<!-- anup-->
<?php
function is_prof($uid)
{
	if(substr_compare((string)$uid, "00", 4, 2) == 0)//do not see
	   return true;
	  else
	  return false;
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Professors view Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mystyle.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
	
</head>
<?php
	//fetching personal information
	//let us take uid to be 201201221
	$uid='201201003';
	$sqlinfo = "SELECT * FROM  `info` WHERE  `uid` ='$uid'";					
	$result = mysqli_query($connection,$sqlinfo);
	$rowinf = mysqli_fetch_array($result, MYSQL_ASSOC);
	$fname = $rowinf['f_name'];
	$mname = $rowinf['m_name'];
	$lname = $rowinf['l_name'];
	$desg  = $rowinf['dsg'];
	$otheremail = $rowinf['other_email'];
	$web_url= $rowinf['web_url'];
	$sex    = $rowinf['sex'];
	$details= $rowinf['details'];
	$contact= $rowinf['contact'];
	$yoj    = $rowinf['yoj'];
	//echo "$yoj";

	$sqlinfo = "SELECT * FROM  `alma` WHERE  `uid` = '$uid' AND  `type` =3" ;					
	$resultalma = mysqli_query($connection,$sqlinfo);
	$rowalma = mysqli_fetch_array($resultalma, MYSQL_ASSOC);
	$ualma=$rowalma['ins_name'];
	$uyear=$rowalma['year'];

	$sqlinfo = "SELECT * FROM  `alma` WHERE  `uid` = '$uid' AND  `type` =4" ;					
	$resultalma = mysqli_query($connection,$sqlinfo);
	$rowalma = mysqli_fetch_array($resultalma, MYSQL_ASSOC);
	$palma=$rowalma['ins_name'];
	$pyear=$rowalma['year'];

	$sqlinfo = "SELECT * FROM  `alma` WHERE  `uid` = '$uid' AND  `type` =5" ;					
	$resultalma = mysqli_query($connection,$sqlinfo);
	$rowalma = mysqli_fetch_array($resultalma, MYSQL_ASSOC);
	$phalma=$rowalma['ins_name'];
	$phyear=$rowalma['year'];
	echo $phalma .' . '. $phyear;

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
								<input type="text" class="form-control" placeholder="Search">
								<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

							</div>
						</form>
						
						<li><a href="homepage.php" class="navbar-brand">Home</a></li>
						<li><a href="" class="navbar-brand">Profile</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
						  <ul class="dropdown-menu" id="dropdown_for_navbar" role="menu">
						    <li><a href="#" data-toggle="modal" data-target="#cp">Change Password</a></li>
						    <li><a href="edit_profile_prof_personal.php">Edit Profile</a></li>
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

<div class="container">
  <div class="row" id="static_profile_box">
	    <div class="col-md-10 col-md-offset-1" >
	      <div class="well-lg panel panel-default" id="profile_box">
	        <div class="panel-body" >
	          <div class="row">
	            <div class="col-sm-3 text-center col-sm-offset-1"><!---change the size of the picture--->
	              <img src="images/default_profile_image.png" alt="" class="center-block img-circle img-thumbnail img-responsive">
				  <br>
				   <button class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Follow </button>
	            </div>
	            <!--/col--> 
	            <div class="col-xs-12 col-sm-7 col-sm-offset-1" id="panel_content">
				<center>
	              <h2  style="font-family:Monospace; font-size:36px;"><?php echo $desg.' '.$fname.' '.$mname.' '.$lname ?></h2>	
				  <br>
				  
				  <p><strong>Webmail ID: </strong><?php echo $otheremail ?></p>
				   <p><strong>Position: </strong>Associate Professor</p>
				  <p><strong>Area of Research: </strong> <?php 
													$sql2="SELECT * FROM  `rel_uid_aoi` WHERE  `uid` ='$uid'";
													$result1 = mysqli_query($connection,$sql2);
													if(!$result1)
													 {
														 die('Could not get data: ' . mysql_error());
													 }
														while ($row1 = mysqli_fetch_array($result1, MYSQL_ASSOC)){
													?>
													
				          							<?php	echo  $row1['int'];echo ","; ?>
													<?php } ?> </p>
<!--		  <p><strong>Research Fields: </strong> Pattern Recognition, Medical Imaging, Image Processing, Digital Signal Processing. </p>
->>
	              
				   <p><i class="glyphicon glyphicon-earphone"></i><strong> : </strong>(+91) 079-3051-0554</p>
				  <p><i class="glyphicon glyphicon-envelope"></i><strong> : </strong>abc@xyz.com</p>
				</center>
	            </div>
	           
	            
	          </div>
	          <!--/row-->
	        </div>
	        <!--/panel-body-->
	      </div>
	      <!--/panel-->
	    </div>
	    <!--/col--> 
	</div>  <!--/row--> 
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
		<div class="well-lg panel panel-default" id="toggable_box">
			<div class="panel-body" >
			<!--	<p> here comes the navigation bar</p> -->
				<div role="tabpanel">

             <!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
                        <li role="presentation"><a href="#publications" aria-controls="publications" role="tab" data-toggle="tab">Publications</a></li>
					    <li role="presentation"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
					    <li role="presentation"><a href="#guided_projects" aria-controls="guided_projects" role="tab" data-toggle="tab">Guided Projects</a></li>
					   
					</ul>

					  <!-- Tab panes -->
					<div class="tab-content">
						<!--About tab-->
					    <div role="tabpanel" class="tab-pane active" id="about">


						    <p class="col-lg-3 control-label"><strong>About Myself :</strong></p> 
							<p class="col-lg-9 control-label"><?php echo $details ?></p> 

							<p class="col-lg-3 control-label"><strong>Year of Joining :</strong></p>
							<p class="col-lg-9 control-label"><?php echo $yoj ?></p>

							<p class="col-lg-3 control-label"><strong>Courses Taken :</strong></p>
							<p class="col-lg-9 control-label"><?php 
													$sql2="SELECT * FROM  `course` WHERE  `instructor` ='$uid'";
													$result1 = mysqli_query($connection,$sql2);
													if(!$result1)
													 {
														 die('Could not get data: ' . mysql_error());
													 }
														while ($row1 = mysqli_fetch_array($result1, MYSQL_ASSOC)){
													?>
													
				          							<?php	echo  $row1['course_name'];echo ' ('.$row1['course_code'].')'; echo ","; ?>
														<?php } ?></p>

							<p class="col-lg-3 control-label"><strong>Achievements :</strong></p>
							<p class="col-lg-9 control-label">Dr. Banerjee obtained PhD in the area of image processing from IIT, Bombay. Before joing DA-IICT, Dr. Banerjee was with several industries for 14 years working mainly as researcher.</p>

							
							<p class="col-lg-3 control-label"><strong>Under Graduate :</strong></p> 
							<p class="col-lg-9 control-label"><?php echo $ualma ?><label><?php echo '('.$uyear.')' ?></label></p> 

							<p class="col-lg-3 control-label"><strong>Post Graduate :</strong></p> 
							<p class="col-lg-9 control-label"><?php echo $palma ?><label><?php echo '('.$pyear.')' ?></label></p> 
								
							<p class="col-lg-3 control-label"><strong>PhD :</strong></p> 
							<p class="col-lg-9 control-label"><?php echo $phalma ?><label><?php echo '('.$phyear.')' ?></label></p> 


						</div>


						<!--publications tab-->
					    <div role="tabpanel" class="tab-pane fade" id="publications">


					    		<h2>Books</h2>
				       			<form class="form-horizontal" role="form" style="padding:10px;">
				      				<!--copy --> 
				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Book 1</a>
				                			</h4>
				            			</div>
				            			<div id="collapseOne" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			<!-- Anuj Copy -->
				                    				<label class="col-lg-4">Authors:</label>
				                          			<p class="col-lg-8">This is where the database part goes.</p>
													<label class="col-lg-4">Year of Publications:</label>
				          							<p class="col-lg-8">25,august,1993</p>
				          							<label class="col-lg-4">Description:</label>
				          							<p class="col-lg-8">This is where the database part goes. This is where the database part goes. This is where the database part goes. This is where the database part goes</p>
				          							<label class="col-lg-4">Link:</label>
				          							<p class="col-lg-8"><a href="#">www.google.com</a></p>
				        					</div>
				            			</div>
				       				</div>

				       				
				       				
				       				
				       			</form>	
					    	
					    	

				       			<!-- research paper started -->
				       			
				       			<h2>Research Paper</h2>
				       			<form class="form-horizontal" role="form" style="padding:10px;">
				      				<!--copy --> 
									<?php 
								$sql="SELECT * FROM `publications_user` WHERE `uid`=201201221"	;
								
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
				
									$sql_in = "SELECT * FROM `publications` WHERE `pub_id`={$row['pub_id']}";
									$result_in = mysqli_query($connection,$sql_in);
									if(!$result_in)
									 {
										 die('Could not get data: ' . mysql_error());
									 }
									while ($row_in = mysqli_fetch_array($result_in, MYSQL_ASSOC)) {
									?>	
				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour<?=$i?>"><?php echo  $row_in['topic'] ; ?></a>
				                			</h4>
				            			</div>
				            			<div id="collapsefour<?=$i?>" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			<!-- Anuj Copy -->
				                    				<label class="col-lg-4">Authors:</label>
				                          			<p class="col-lg-8"><?php echo  $row_in['authors'] ; ?></p>
													<label class="col-lg-4">Year of Publications:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['date'] ; ?></p>
				          							<label class="col-lg-4">Description:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['abstract'] ; ?></p>
				          							<label class="col-lg-4">Journal:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['journel'] ; ?></p>
				          							<label class="col-lg-4">Conference:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['conference'] ; ?></p>
				          							<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['status'] ; ?></p>
				          							<label class="col-lg-4">Link:</label>
				          							<p class="col-lg-8"><a href="#"><?php echo  $row_in['link'] ; ?></a></p>
				        					</div>
				            			</div>
				       				</div>
								<?php } } ?>

				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">Research paper one</a>
				                			</h4>
				            			</div>
				            			<div id="collapsefour" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			<!-- Anuj Copy -->
				                    				<label class="col-lg-4">Authors:</label>
				                          			<p class="col-lg-8">This is where the database part goes.</p>
													<label class="col-lg-4">Year of Publications:</label>
				          							<p class="col-lg-8">25,august,1993</p>
				          							<label class="col-lg-4">Description:</label>
				          							<p class="col-lg-8">This is where the database part goes. This is where the database part goes. This is where the database part goes. This is where the database part goes</p>
				          							<label class="col-lg-4">Journal:</label>
				          							<p class="col-lg-8">Published in Harvard Sept issue</p>
				          							<label class="col-lg-4">Conference:</label>
				          							<p class="col-lg-8">Discussed at academic union</p>
				          							<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Pending</p>
				          							<label class="col-lg-4">Link:</label>
				          							<p class="col-lg-8"><a href="#">www.google.com</a></p>
				        					</div>
				            			</div>
				       				</div>

				       				
				       			</form>	
				      			
					
				      	</div>



				    	<!-- Project Tab-->
					    <div role="tabpanel" class="tab-pane fade" id="projects">


								<div class="col-md-10 col-sm-6 col-xs-12 personal-info">
				      			<h2></h2>
				      			<form class="form-horizontal" role="form" style="padding:10px;">
				      				<!-- Project 1--> 
									<?php 
								$sql="SELECT * FROM `rel_proj_login` WHERE `uid`=201201221"	;
								
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
				
									$sql_in = "SELECT * FROM `project` WHERE `pro_id`={$row['pid']}";
									$result_in = mysqli_query($connection,$sql_in);
									if(!$result_in)
									 {
										 die('Could not get data: ' . mysql_error());
									 }
									while ($row_in = mysqli_fetch_array($result_in, MYSQL_ASSOC)) {
									?>
				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseProj<?=$i?>"><?php $pro_id=$row_in['pro_id'];echo  $row_in['title'] ; ?></a>
				                			</h4>
				            			</div>
				            			<div id="collapseProj<?=$i?>" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			
				                    				<label class="col-lg-4">Description:</label>
				                          			<p class="col-lg-8"><?php echo  $row_in['des'] ; ?></p>
													<label class="col-lg-4">From:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['from'] ; ?></p>
													<label class="col-lg-4">To:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['to'] ; ?></p>
													<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Completed or on-going</p>
													<label class="col-lg-4">Guide:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['guide'] ; ?></p>
													<label class="col-lg-4">Associates:</label>
													<p class="col-lg-8"><?php 
													$sql2="SELECT `uid` FROM `rel_proj_login` WHERE `pid`={$row_in['pro_id']}";
													$result1 = mysqli_query($connection,$sql2);
													if(!$result1)
													 {
														 die('Could not get data: ' . mysql_error());
													 }
														while ($row1 = mysqli_fetch_array($result1, MYSQL_ASSOC)){
													?>
													
				          							<a href="http://www.academia.edu/user/<?php echo  $row1['uid'] ?>">
													<?php	echo  $row1['uid'];echo ","; ?></a>
													<?php } ?></p>
													
													<label class="col-lg-4">Funding Organisation:</label>
				          							<p class="col-lg-8"><?php echo  $row_in['funding_org'] ; ?></p>

				          						
				        					</div>
				            			</div>
				       				</div>
								<?php } } ?>

				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseP1">Project Tile 1</a>
				                			</h4>
				            			</div>
				            			<div id="collapseP1" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			
				                    				<label class="col-lg-4">Description:</label>
				                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
													<label class="col-lg-4">From:</label>
				          							<p class="col-lg-8">Jan 2000</p>
													<label class="col-lg-4">To:</label>
				          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
													<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Completed or on-going</p>
													<label class="col-lg-4">Guide:</label>
				          							<p class="col-lg-8">Professor or Mentor</p>
													<label class="col-lg-4">Associates:</label>
				          							<p class="col-lg-8">Members of the project</p>
													<label class="col-lg-4">Other Information:</label>
				          							<p class="col-lg-8">If any present</p>

				          						
				        					</div>
				            			</div>
				       				</div>

				       				<!-- Project 2-->
				       				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseP2">Project Title 2</a>
				                			</h4>
				            			</div>
				            			<div id="collapseP2" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			
				                    				<label class="col-lg-4">Description:</label>
				                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
													<label class="col-lg-4">From:</label>
				          							<p class="col-lg-8">Jan 2000</p>
													<label class="col-lg-4">To:</label>
				          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
													<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Completed or on-going</p>
													<label class="col-lg-4">Guide:</label>
				          							<p class="col-lg-8">Professor or Mentor</p>
													<label class="col-lg-4">Associates:</label>
				          							<p class="col-lg-8">Members of the project</p>
													<label class="col-lg-4">Other Information:</label>
				          							<p class="col-lg-8">If any present</p>
				        					</div>
				            			</div>
				       				</div>

				       				<!-- Project 3-->
				       				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseP3">Project Tiltle 3</a>
				                			</h4>
				            			</div>
				            			<div id="collapseP3" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			
				                    				<label class="col-lg-4">Description:</label>
				                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
													<label class="col-lg-4">From:</label>
				          							<p class="col-lg-8">Jan 2000</p>
													<label class="col-lg-4">To:</label>
				          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
													<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Completed or on-going</p>
													<label class="col-lg-4">Guide:</label>
				          							<p class="col-lg-8">Professor or Mentor</p>
													<label class="col-lg-4">Associates:</label>
				          							<p class="col-lg-8">Members of the project</p>
													<label class="col-lg-4">Other Information:</label>
				          							<p class="col-lg-8">If any present</p>
				        					</div>
				            			</div>
				       				</div>
				       			</form>


				       			
				       		</div>
					    
						</div>

						<!-- Guided projects tab-->

						<div role="tabpanel" class="tab-pane fade" id="guided_projects">

							
								<div class="col-md-10 col-sm-6 col-xs-12 personal-info">
				      			
				      			<form class="form-horizontal" role="form" style="padding:10px;">

				      				<!--BTP Projects-->
					      			<div class="panel panel-default">
					            			<div class="panel-heading">
					                			<h4 class="panel-title">
					                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseBTP"><h3>BTP Projects</h3></a>
					                			</h4>
					            			</div>
					            			<div id="collapseBTP" class="panel-collapse collapse out">
					                			<div class="panel-body">
								      				<!--BTP Project 1--> 
				      				<!-- Project 1--> 
									
									<?php 
								$sql="SELECT * FROM `project` WHERE `guide`=201201001 AND `type`=0"	;
								
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
				
									?>
				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseProj<?=$i?>"><?php $pro_id=$row['pro_id']; echo  $row['title'] ; ?></a>
				                			</h4>
				            			</div>
				            			<div id="collapseProj<?=$i?>" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			
				                    				<label class="col-lg-4">Description:</label>
				                          			<p class="col-lg-8"><?php echo  $row['des'] ; ?></p>
													<label class="col-lg-4">From:</label>
				          							<p class="col-lg-8"><?php echo  $row['from'] ; ?></p>
													<label class="col-lg-4">To:</label>
				          							<p class="col-lg-8"><?php echo  $row['to'] ; ?></p>
													<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Completed or on-going</p>
													<label class="col-lg-4">Guide:</label>
				          							<p class="col-lg-8"><?php echo  $row['guide'] ; ?></p>
													<label class="col-lg-4">Associates:</label>
													<p class="col-lg-8"><?php 
													$sql2="SELECT `uid` FROM `rel_proj_login` WHERE `pid`={$row['pro_id']}";
													$result1 = mysqli_query($connection,$sql2);
													if(!$result1)
													 {
														 die('Could not get data: ' . mysql_error());
													 }
														while ($row1 = mysqli_fetch_array($result1, MYSQL_ASSOC)){
													?>
													
				          							<a href="http://www.academia.edu/user/<?php echo  $row1['uid'] ?>">
													<?php	echo  $row1['uid'];echo ","; ?></a>
													<?php } ?></p>
													
													<label class="col-lg-4">Funding Organisation:</label>
				          							<p class="col-lg-8"><?php echo  $row['funding_org'] ; ?></p>

				          						
				        					</div>
				            			</div>
				       				</div>
								<?php }  ?>

								      				<div class="panel panel-default">
								            			<div class="panel-heading">
								                			<h4 class="panel-title">
								                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseBTP1">BTP Project 1</a>
								                			</h4>
								            			</div>
								            			<div id="collapseBTP1" class="panel-collapse collapse out">
								                			<div class="panel-body">
								                			
								                    				<label class="col-lg-4">Description:</label>
								                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
																	<label class="col-lg-4">From:</label>
								          							<p class="col-lg-8">Jan 2000</p>
																	<label class="col-lg-4">To:</label>
								          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
																	<label class="col-lg-4">Status:</label>
								          							<p class="col-lg-8">Completed or on-going</p>
																	<label class="col-lg-4">Guide:</label>
								          							<p class="col-lg-8">Professor or Mentor</p>
																	<label class="col-lg-4">Associates:</label>
								          							<p class="col-lg-8">Members of the project</p>
																	<label class="col-lg-4">Other Information:</label>
								          							<p class="col-lg-8">If any present</p>

								          						
								        					</div>
								            			</div>
								       				</div>

								       				<!--BTP Project 2--> 

								       				<div class="panel panel-default">
								            			<div class="panel-heading">
								                			<h4 class="panel-title">
								                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseBTP2">BTP Project 2</a>
								                			</h4>
								            			</div>
								            			<div id="collapseBTP2" class="panel-collapse collapse out">
								                			<div class="panel-body">
								                			
								                    				<label class="col-lg-4">Description:</label>
								                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
																	<label class="col-lg-4">From:</label>
								          							<p class="col-lg-8">Jan 2000</p>
																	<label class="col-lg-4">To:</label>
								          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
																	<label class="col-lg-4">Status:</label>
								          							<p class="col-lg-8">Completed or on-going</p>
																	<label class="col-lg-4">Guide:</label>
								          							<p class="col-lg-8">Professor or Mentor</p>
																	<label class="col-lg-4">Associates:</label>
								          							<p class="col-lg-8">Members of the project</p>
																	<label class="col-lg-4">Other Information:</label>
								          							<p class="col-lg-8">If any present</p>

								          						
								        					</div>
								            			</div>
								       				</div>

								       			</div>
								            </div>
								    </div>


								    <!--Summer Projects-->
								    <div class="panel panel-default">
					            			<div class="panel-heading">
					                			<h4 class="panel-title">
					                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSummer"><h3>Summer Projects</h3></a>
					                			</h4>
					            			</div>
					            			<div id="collapseSummer" class="panel-collapse collapse out">
					                			<div class="panel-body">
								      				<!--BTP Project 1--> 
									<?php 
								$sql="SELECT * FROM `project` WHERE `guide`=201201001 AND `type`=1"	;
								
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
				
									?>
				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseProj<?=$i?>"><?php $pro_id=$row['pro_id']; echo  $row['title'] ; ?></a>
				                			</h4>
				            			</div>
				            			<div id="collapseProj<?=$i?>" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			
				                    				<label class="col-lg-4">Description:</label>
				                          			<p class="col-lg-8"><?php echo  $row['des'] ; ?></p>
													<label class="col-lg-4">From:</label>
				          							<p class="col-lg-8"><?php echo  $row['from'] ; ?></p>
													<label class="col-lg-4">To:</label>
				          							<p class="col-lg-8"><?php echo  $row['to'] ; ?></p>
													<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Completed or on-going</p>
													<label class="col-lg-4">Guide:</label>
				          							<p class="col-lg-8"><?php echo  $row['guide'] ; ?></p>
													<label class="col-lg-4">Associates:</label>
													<p class="col-lg-8"><?php 
													$sql2="SELECT `uid` FROM `rel_proj_login` WHERE `pid`={$row['pro_id']}";
													$result1 = mysqli_query($connection,$sql2);
													if(!$result1)
													 {
														 die('Could not get data: ' . mysql_error());
													 }
														while ($row1 = mysqli_fetch_array($result1, MYSQL_ASSOC)){
													?>
													
				          							<a href="http://www.academia.edu/user/<?php echo  $row1['uid'] ?>">
													<?php	echo  $row1['uid'];echo ","; ?></a>
													<?php } ?></p>
													
													<label class="col-lg-4">Funding Organisation:</label>
				          							<p class="col-lg-8"><?php echo  $row['funding_org'] ; ?></p>

				          						
				        					</div>
				            			</div>
				       				</div>
								<?php }  ?>

								      				<div class="panel panel-default">
								            			<div class="panel-heading">
								                			<h4 class="panel-title">
								                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSummer1">Summer Project 1</a>
								                			</h4>
								            			</div>
								            			<div id="collapseSummer1" class="panel-collapse collapse out">
								                			<div class="panel-body">
								                			
								                    				<label class="col-lg-4">Description:</label>
								                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
																	<label class="col-lg-4">From:</label>
								          							<p class="col-lg-8">Jan 2000</p>
																	<label class="col-lg-4">To:</label>
								          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
																	<label class="col-lg-4">Status:</label>
								          							<p class="col-lg-8">Completed or on-going</p>
																	<label class="col-lg-4">Guide:</label>
								          							<p class="col-lg-8">Professor or Mentor</p>
																	<label class="col-lg-4">Associates:</label>
								          							<p class="col-lg-8">Members of the project</p>
																	<label class="col-lg-4">Other Information:</label>
								          							<p class="col-lg-8">If any present</p>

								          						
								        					</div>
								            			</div>
								       				</div>

								       				<!--BTP Project 2--> 

								       				<div class="panel panel-default">
								            			<div class="panel-heading">
								                			<h4 class="panel-title">
								                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSummer2">Summer Project 2</a>
								                			</h4>
								            			</div>
								            			<div id="collapseSummer2" class="panel-collapse collapse out">
								                			<div class="panel-body">
								                			
								                    				<label class="col-lg-4">Description:</label>
								                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
																	<label class="col-lg-4">From:</label>
								          							<p class="col-lg-8">Jan 2000</p>
																	<label class="col-lg-4">To:</label>
								          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
																	<label class="col-lg-4">Status:</label>
								          							<p class="col-lg-8">Completed or on-going</p>
																	<label class="col-lg-4">Guide:</label>
								          							<p class="col-lg-8">Professor or Mentor</p>
																	<label class="col-lg-4">Associates:</label>
								          							<p class="col-lg-8">Members of the project</p>
																	<label class="col-lg-4">Other Information:</label>
								          							<p class="col-lg-8">If any present</p>

								          						
								        					</div>
								            			</div>
								       				</div>

								       			</div>
								            </div>
								    </div>


								    <!--Research Projects-->
					      			<div class="panel panel-default">
					            			<div class="panel-heading">
					                			<h4 class="panel-title">
					                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseResearch"><h3>Research Projects</h3></a>
					                			</h4>
					            			</div>
					            			<div id="collapseResearch" class="panel-collapse collapse out">
					                			<div class="panel-body">
								      				<!--BTP Project 1-->
									<?php 
								$sql="SELECT * FROM `project` WHERE `guide`=201201001 AND `type`=2"	;
								
								$result = mysqli_query($connection,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
									$i=0;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$i++;
				
									?>
				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseProj<?=$i?>"><?php $pro_id=$row['pro_id']; echo  $row['title'] ; ?></a>
				                			</h4>
				            			</div>
				            			<div id="collapseProj<?=$i?>" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			
				                    				<label class="col-lg-4">Description:</label>
				                          			<p class="col-lg-8"><?php echo  $row['des'] ; ?></p>
													<label class="col-lg-4">From:</label>
				          							<p class="col-lg-8"><?php echo  $row['from'] ; ?></p>
													<label class="col-lg-4">To:</label>
				          							<p class="col-lg-8"><?php echo  $row['to'] ; ?></p>
													<label class="col-lg-4">Status:</label>
				          							<p class="col-lg-8">Completed or on-going</p>
													<label class="col-lg-4">Guide:</label>
				          							<p class="col-lg-8"><?php echo  $row['guide'] ; ?></p>
													<label class="col-lg-4">Associates:</label>
													<p class="col-lg-8"><?php 
													$sql2="SELECT `uid` FROM `rel_proj_login` WHERE `pid`={$row['pro_id']}";
													$result1 = mysqli_query($connection,$sql2);
													if(!$result1)
													 {
														 die('Could not get data: ' . mysql_error());
													 }
														while ($row1 = mysqli_fetch_array($result1, MYSQL_ASSOC)){
													?>
													
				          							<a href="http://www.academia.edu/user/<?php echo  $row1['uid'] ?>">
													<?php	echo  $row1['uid'];echo ","; ?></a>
													<?php } ?></p>
													
													<label class="col-lg-4">Funding Organisation:</label>
				          							<p class="col-lg-8"><?php echo  $row['funding_org'] ; ?></p>

				          						
				        					</div>
				            			</div>
				       				</div>
								<?php }  ?>

								      				<div class="panel panel-default">
								            			<div class="panel-heading">
								                			<h4 class="panel-title">
								                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseResearch1">Research Project 1</a>
								                			</h4>
								            			</div>
								            			<div id="collapseResearch1" class="panel-collapse collapse out">
								                			<div class="panel-body">
								                			
								                    				<label class="col-lg-4">Description:</label>
								                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
																	<label class="col-lg-4">From:</label>
								          							<p class="col-lg-8">Jan 2000</p>
																	<label class="col-lg-4">To:</label>
								          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
																	<label class="col-lg-4">Status:</label>
								          							<p class="col-lg-8">Completed or on-going</p>
																	<label class="col-lg-4">Guide:</label>
								          							<p class="col-lg-8">Professor or Mentor</p>
																	<label class="col-lg-4">Associates:</label>
								          							<p class="col-lg-8">Members of the project</p>
																	<label class="col-lg-4">Other Information:</label>
								          							<p class="col-lg-8">If any present</p>

								          						
								        					</div>
								            			</div>
								       				</div>

								       				<!--BTP Project 2--> 

								       				<div class="panel panel-default">
								            			<div class="panel-heading">
								                			<h4 class="panel-title">
								                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseResearch2">Research Project 2</a>
								                			</h4>
								            			</div>
								            			<div id="collapseResearch2" class="panel-collapse collapse out">
								                			<div class="panel-body">
								                			
								                    				<label class="col-lg-4">Description:</label>
								                          			<p class="col-lg-8">Brief description of the topic is given here.</p>
																	<label class="col-lg-4">From:</label>
								          							<p class="col-lg-8">Jan 2000</p>
																	<label class="col-lg-4">To:</label>
								          							<p class="col-lg-8">feb 2000 or not necessary to mention</p>
																	<label class="col-lg-4">Status:</label>
								          							<p class="col-lg-8">Completed or on-going</p>
																	<label class="col-lg-4">Guide:</label>
								          							<p class="col-lg-8">Professor or Mentor</p>
																	<label class="col-lg-4">Associates:</label>
								          							<p class="col-lg-8">Members of the project</p>
																	<label class="col-lg-4">Other Information:</label>
								          							<p class="col-lg-8">If any present</p>

								          						
								        					</div>
								            			</div>
								       				</div>

								       			</div>
								            </div>
								    </div>

				       				
				       				
				       			</form>


				       			
				       		</div>
					    
						</div>

					   	



			 

                     	    
					</div> <!--tabel content end-->	

					    
					</div>

				</div>

			</div>
		</div>
	</div>
  </div>
</div>
<!--/container-->
</body>
</html>
