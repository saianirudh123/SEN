<!DOCTYPE html>
<?php
require_once 'connect.inc.php';
require_once 'change_pwd.php';
?>

<?php
if(isset($_POST['btnPress'])){
	if(isset($_POST['name']) && isset($_POST['id']) && isset($_POST['semester'])&& isset($_POST['credits']) && isset($_POST['TAs']) && isset($_POST['link']) && isset($_POST['description'])){
			$name=$_POST['name'];
			$id=$_POST['id'];
			$semester=$_POST['semester'];
			$credits=$_POST['credits'];
			$TAs=$_POST['TAs'];
			$link=$_POST['link'];
			$description=$_POST['description'];
            if(!empty($_POST['name']) && !empty($_POST['id']) && !empty($_POST['semester'])&& !empty($_POST['credits']) && !empty($_POST['description'])) {
							$query ="INSERT INTO `course_new`( `course_name`, `course_code`, `semester`, `credits`, `TAs`, `description`, `link`) VALUES ('{$name}','{$id}','{$semester}','{$credits}','{$TAs}','{$description}','{$link}')";
                            if($query_run=  mysqli_query($connection,$query)){
                                echo 'course added.'; 	
                            }else{
								echo 'bdfbdfbd';
                                echo mysql_error();
                            }					
					
					}else{
							echo 'Empty Fields Found.';
					}	
			
			
			}else{
			echo 'Enter Required Fields.';
			}

}else{
echo 'not good';
}
?>
<html lang="en">
<head>
  <title>Edit Course Page</title>
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
						<li><a href="Prof_profile_view.php" class="navbar-brand">Profile</a></li>
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

  <!-- container -->

<div class="container" style="padding-top: 0px;">
	<h2 class="page-header">Add Courses</h2>
	
	<div class="row">
  		
  		<!-- left column -->
   	    <div class="col-md-6 col-sm-6 col-xs-12">
    
	
  		    <form class="form-horizontal" role="form" style="padding:10px;" action=" " method="post">
	  
				<div class="form-group" >
					<label class="col-lg-3 control-label">Name:</label>
					
					<div class="col-lg-8">
						<input class="form-control" placeholder="Internet Of Things" type="text" name="name">
					</div>
				</div>
						
				<div class="form-group">
					<label class="col-lg-3 control-label">Course ID:</label>
					
					<div class="col-lg-8">
						<input class="form-control" value="" type="text"  placeholder ="IT-428 " name="id">
					</div>
		  
				</div>
						
						
						
				<div class="form-group" >
					<label class="col-lg-3 control-label">Semester:</label>
					
							<div class="col-lg-5">
									
										<input type="radio" name="semester" value="Winter" placeholder="">Winter</input>
										<input type="radio" name="semester" value="Autumn" placeholder="">Autumn</input>
										<input type="radio" name="semester" value="Summer" placeholder="">Summer</input>
							
							</div>
										
				</div>		
					
							
				<div class="form-group" >
					<label class="col-lg-3 control-label">Credits:</label>
					
					<div class="col-lg-8">
						<!--<textarea class="form-control" type="text" rows ="5"></textarea>-->
						<input class="form-control" value="" type="text" placeholder ="e.g. 3-0-0-3" name="credits">
					</div>
				</div>	

				<div class="form-group" >
					<label class="col-lg-3 control-label">Instructor Name:</label>
					
					<div class="col-lg-8">
						<input class="form-control" placeholder="" type="text" >
					</div>
				</div>
						
				<div class="form-group">
					<label class="col-lg-3 control-label">Teaching Assistant:</label>
					
					<div class="col-lg-8">
						<input class="form-control" value="" type="text" placeholder="e.g. Rupsa shah, Ritu" name="TAs">
					</div>
		  
							
				</div>
						
				
  	    </div>


  	    <!--Right  Column -->

  	    <div class="col-md-6 col-sm-6 col-xs-12">
    
	
	  
				
					<br>	
						
				<div class="form-group" >
					<label class="col-lg-3 control-label">Course Link:</label>
					
					<div class="col-lg-8">
						<input class="form-control" placeholder="e.g. http://intranet.daiict.ac.in/~daiict_nt01/Lecture/ASIM_BANERJEE/IT314/" type="url" name="link">
						<br>
					</div>
				</div>
				
				<div class="form-group" >
					<label class="col-lg-3 control-label">Course Outline:</label>
					
					<div class="col-lg-8">
						<input type="file" class="text-center center-block well well-sm">
					</div>
				</div>	


				<div class="form-group" >
					<label class="col-lg-3 control-label">Course Description:</label>
					
					<div class="col-lg-8">
						<textarea class="form-control" type="text" rows ="5" name="description"></textarea>
						<br>
					</div>
				</div>	
				
				
				 <div class="form-group">
          			<label class="col-lg-3 control-label">Lecture Days:</label>
          			<div class="col-lg-7">
						

						<div class="btn-group" data-toggle="buttons">
  							<label class="btn btn-default">
						    	<input type="checkbox" autocomplete="off" checked> Mon
						    </label>
						  	<label class="btn btn-default">
						    	<input type="checkbox" autocomplete="off"> Tue
						  	</label>
						  	<label class="btn btn-default">
						    	<input type="checkbox" autocomplete="off"> Wed
						    </label>
						    <label class="btn btn-default">
						    	<input type="checkbox" autocomplete="off"> Thu
						    </label>
						    <label class="btn btn-default">
						    	<input type="checkbox" autocomplete="off"> Fri
						    </label>
						</div>
          			</div>
        		</div>		
				
				

				
  	    </div>
		
  
	</div>
	
	<div class="col-md-3 col-md-offset-10 ">
		<input type="Submit" value="Save and Continue" class="btn btn-success" name="btnPress">
									
	</div>
	</form>
</div>




<script>
	$(".dropdown dt a").on('click', function () {
          $(".dropdown dd ul").slideToggle('fast');
      });

      $(".dropdown dd ul li a").on('click', function () {
          $(".dropdown dd ul").hide();
      });

      function getSelectedValue(id) {
           return $("#" + id).find("dt a span.value").html();
      }

      $(document).bind('click', function (e) {
          var $clicked = $(e.target);
          if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
      });


      $('.mutliSelect input[type="checkbox"]').on('click', function () {
        
          var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
              title = $(this).val() + ",";
        
          if ($(this).is(':checked')) {
              var html = '<span title="' + title + '">' + title + '</span>';
              $('.multiSel').append(html);
              $(".hida").hide();
          } 
          else {
              $('span[title="' + title + '"]').remove();
              var ret = $(".hida");
              $('.dropdown dt a').append(ret);
              
          }
      });
</script>	
</body>
</html>