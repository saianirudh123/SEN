<?php
session_start();
?>
<?php
require 'connect.inc.php';
require_once 'change_pwd.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php
//$connection = mysqli_connect('localhost','root','root','sen') or die('connection error');
//echo 'successfully connected!!';
?>
<head>
  <title>Student  view Profile</title>
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
	$uid= $_SESSION['username'];
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

	$sqlinfo = "SELECT * FROM  `alma` WHERE  `uid` = '$uid' AND  `type` =1" ;					
	$resultalma = mysqli_query($connection,$sqlinfo);
	$rowalma = mysqli_fetch_array($resultalma, MYSQL_ASSOC);
	$halma=$rowalma['ins_name'];
	$hyear=$rowalma['year'];

	$sqlinfo = "SELECT * FROM  `alma` WHERE  `uid` = '$uid' AND  `type` =2" ;					
	$resultalma = mysqli_query($connection,$sqlinfo);
	$rowalma = mysqli_fetch_array($resultalma, MYSQL_ASSOC);
	$ialma=$rowalma['ins_name'];
	$iyear=$rowalma['year'];

	$sqlinfo = "SELECT * FROM  `alma` WHERE  `uid` = '$uid' AND  `type` =3" ;					
	$resultalma = mysqli_query($connection,$sqlinfo);
	$rowalma = mysqli_fetch_array($resultalma, MYSQL_ASSOC);
	$ualma=$rowalma['ins_name'];
	$uyear=$rowalma['year'];
	echo $halma .' . '. $hyear;

	$sqlinfo = "SELECT * FROM  `alma` WHERE  `uid` = '$uid' AND  `type` =4" ;					
	$resultalma = mysqli_query($connection,$sqlinfo);
	$rowalma = mysqli_fetch_array($resultalma, MYSQL_ASSOC);
	$palma=$rowalma['ins_name'];
	$pyear=$rowalma['year'];


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
						<li><a href="#" class="navbar-brand">Profile</a></li>
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

<div class="container">
  <div class="row" id="static_profile_box">
    <div class="col-md-10 col-md-offset-1" >
      <div class="well-lg panel panel-default" id="profile_box">
        <div class="panel-body" >
          <div class="row">
			<div class="col-xs-10 col-sm-3 text-center"><!---change the size of the picture-->
              <img src="<?php
$sql="SELECT * FROM `upload2` WHERE `uid`={$_SESSION['username']}";
$result = mysql_query($sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysql_error());
								 }
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
									echo $row['path'];
								}
?>" alt="" class="center-block img-circle img-thumbnail img-responsive">
			  <br>
			   <button class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Follow </button>
			   <div class="row">
			   	<br>
			   </div>
			   <button class="btn btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Request Resume | Edit Link </button>

            </div>
            <!--/col--> 
            <div class="col-xs-12 col-sm-7 col-sm-offset-1" id="panel_content">
			<center>
              <h2  style="font-family:Monospace; font-size:36px;"><?php echo $desg .' '. $fname.' '.$mname.' '.$lname ; ?> </h2>
			  <br>
			  
			  <p><strong>ID: </strong><?php echo  $uid ?></p>
			  <p><strong>Position: </strong>Intern at XYZ or Student or Prof or TA.</p>
              <p><strong>Area of Interests: </strong> <?php 
													$sql2="SELECT * FROM  `rel_uid_aoi` WHERE  `uid` ='$uid'";
													$result1 = mysqli_query($connection,$sql2);
													if(!$result1)
													 {
														 die('Could not get data: ' . mysql_error());
													 }
														while ($row1 = mysqli_fetch_array($result1, MYSQL_ASSOC)){
													?>
													
				          							<?php	echo  $row1['int'];echo ","; ?>
													<?php } ?></p>
													
													
											
              <p><strong>Skills: </strong>
                <span class="label label-info tags">html5</span> 
                <span class="label label-info tags">css3</span>
                <span class="label label-info tags">jquery</span>
                <span class="label label-info tags">php</span>
              </p>
			   <p><i class="glyphicon glyphicon-earphone"></i><strong> : </strong><?php echo  $contact ; ?></p>
			  <p><i class="glyphicon glyphicon-envelope"></i><strong> : </strong><?php echo  $otheremail ?></p>
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
  </div>
  <!--/row--> 
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
		<div class="well-lg panel panel-default" id="toggable_box">
			<div class="panel-body" >
			<!--	<p> here comes the navigation bar</p> -->
				<div role="tabpanel">

             <!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
					    <li role="presentation"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
					    <li role="presentation"><a href="#publications" aria-controls="publications" role="tab" data-toggle="tab">Publications</a></li>
					   
					</ul>

					  <!-- Tab panes -->
					<div class="tab-content">
						<!--About tab-->
					    <div role="tabpanel" class="tab-pane active" id="about">


					    <p class="col-lg-3 control-label"><strong>About Myself :</strong></p> 
						<p class="col-lg-9 control-label"><?php echo  $details ; ?>  </p> 

						<p class="col-lg-3 control-label"><strong>Stream :</strong></p>
						<p class="col-lg-9 control-label">BTech(ICT)</p>

						<p class="col-lg-3 control-label"><strong>High School :</strong></p> 
						<p class="col-lg-9 control-label"><?php echo  $halma ; ?>  <label><?php echo  $hyear ; ?></label></p> 

						<p class="col-lg-3 control-label"><strong>Intermediate/12 :</strong></p> 
						<p class="col-lg-9 control-label"><?php echo  $ialma ; ?>  <label><?php echo  $iyear ; ?></label></p> 

						
						<p class="col-lg-3 control-label"><strong>Under Graduate :</strong></p> 
						<p class="col-lg-9 control-label"><?php echo  $ualma ; ?><label><?php echo  $uyear ; ?></label></p> 
						
						<p class="col-lg-3 control-label"><strong>Post Graduate :</strong></p> 
						<p class="col-lg-9 control-label"><?php echo  $palma ; ?> <label><?php echo  $pyear ; ?></label></p> 

						

				
					   
					    </div>
				    	
					    <div role="tabpanel" class="tab-pane fade" id="projects">

							
								<div class="col-md-10 col-sm-6 col-xs-12 personal-info">
				      			<h2></h2>
				      			<form class="form-horizontal" role="form" style="padding:10px;">
				      				<!-- Project 1--> 
									
									<?php 
								$sql="SELECT * FROM `rel_proj_login` WHERE `uid`={$_SESSION['username']}"	;
								
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
				            			<div class="panel-heading" style="padding:0;">
				                			<h4 class="panel-title">
				                    		<!--
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseProj<?=$i?>"><?php $pro_id=$row_in['pro_id'];echo  $row_in['title'] ; ?></a>
											-->
											<button type="button" id="btn_icon<?=$i?>" class="btn_icon btn btn-default btn-block accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseProj<?=$i?>">
											  <div class="pull-left" >
												<?php $pro_id=$row_in['pro_id'];echo  $row_in['title'] ; ?>
											  </div>
											  <span class="btn_glyphicon glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"></span>
											</button>
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
				       			</form>


				       			
				       		</div>
					    
						</div>


			 <!--publications tab-->
					    <div role="tabpanel" class="tab-pane fade" id="publications">
					    	<div class="col-md-10 ">
					    	
						      			<h2>Books</h2>
				      			<form class="form-horizontal" role="form" style="padding:10px;">
				      				<!--copy --> 
				      				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Operating Systems</a>
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
				          						
				        					</div>
				            			</div>
				       				</div>

				       				<!-- book 2-->
				       				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo">Computer Networks</a>
				                			</h4>
				            			</div>
				            			<div id="collapsetwo" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			<!-- Anuj Copy -->
				                    				<label class="col-lg-4">Authors:</label>
				                          			<p class="col-lg-8">This is where the database part goes.</p>
													<label class="col-lg-4">Year of Publications:</label>
				          							<p class="col-lg-8">25,august,1993</p>
				          							<label class="col-lg-4">Description:</label>
				          							<p class="col-lg-8">This is where the database part goes. This is where the database part goes. This is where the database part goes. This is where the database part goes</p>
				          						
				        					</div>
				            			</div>
				       				</div>

				       				<!-- book 3-->
				       				<div class="panel panel-default">
				            			<div class="panel-heading">
				                			<h4 class="panel-title">
				                    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsethree">DBMS</a>
				                			</h4>
				            			</div>
				            			<div id="collapsethree" class="panel-collapse collapse out">
				                			<div class="panel-body">
				                			<!-- Anuj Copy -->
				                    				<label class="col-lg-4">Authors:</label>
				                          			<p class="col-lg-8">This is where the database part goes.</p>
													<label class="col-lg-4">Year of Publications:</label>
				          							<p class="col-lg-8">25,august,1993</p>
				          							<label class="col-lg-4">Description:</label>
				          							<p class="col-lg-8">This is where the database part goes. This is where the database part goes. This is where the database part goes. This is where the database part goes</p>
				          						
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
				            			<div class="panel-heading" style="padding:0;">
				                			<h4 class="panel-title">
				                    		<!--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour<?=$i?>"><?php echo  $row_in['topic'] ; ?></a>-->
											<button type="button" id="btn_icon<?=$i?>" class="btn_icon btn btn-default btn-block accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour<?=$i?>">
											  <div class="pull-left" >
												<?php  echo  $row_in['topic'] ;  ?>
											  </div>
											  <span class="btn_glyphicon glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"></span>
											</button>
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
				       			</form>	
				      			
					
				      			</div>


						</DIV>


					    </div>

					    <!-- groups tab-->
					   
					</div>

				</div>

			</div>
		</div>
	</div>
  </div>
</div>
<!--/container-->
</body>
<script>
	$(".btn_icon").click(function(){
		//alert('"#'+this.id+'"');
		$(this).find("span").toggleClass("glyphicon-chevron-down glyphicon-chevron-up");
	});
</script>
</html>
