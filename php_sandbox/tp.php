<!DOCTYPE html>
<html>
<head>
	<title>Discussion Forum</title>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mystyle.css"> 
  <link rel="stylesheet" href="css/sidebar_styles.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>

<style>
    .page-header { position: relative; }
    
    .notes {
    color: #999;
    font-size: 12px;
    }
    .media .media-object { max-width: 120px; }
    .media-body { position: relative; }
    .media-date { 
    position: absolute; 
    right: 25px;
    top: 25px;
    }
    .media-date li { padding: 0; }
    .media-date li:first-child:before { content: ''; }
    .media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
    }
    .media-comment { margin-bottom: 20px; }
    .media-replied { margin: 0 0 20px 50px; }
    .media-replied .media-heading { padding-left: 6px; }

    .btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
    }
    .btn-circle span { padding-right: 6px; }
    .embed-responsive { margin-bottom: 20px; }
    .tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    }
    .custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
    background-size: 120px;
    border-radius: 120px;
    }
  input[type="file"]
  {
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
  }
    .uploadPhoto {
    position: absolute;
    top: 25%;
    left: 25%;
    display: none;
    width: 50%;
    height: 50%;
    color: #fff;    
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;    
    background-color: rgba(0,0,0,.3);
    border-radius: 50px;
    cursor: pointer;
    }
    .custom-input-file:hover .uploadPhoto { display: block; }
</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-static-top" >
    
      <div class="container">
      
        <a href="#" class="navbar-brand">Online Academia</a>            <!-- to write stuff on nav bar -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          
        </button>
        
        <div class ="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">          <!-- first two for styling and the next one for positioning -->
            <form class="navbar-form navbar-left" role="search">
            
              <div class="search_bar">
                <input type="text" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

              </div>
            </form>
            
            <li><a href="#" class="navbar-brand">Home</a></li>
            <li><a href="#" class="navbar-brand">Profile</a></li>
            
            <li class="dropdown" >
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu" id="dropdown_for_navbar" role="menu">
                <li><a href="#">Change Password</a></li>
                <li><a href="#">Edit Profile</a></li>
                <li><a href="#">Something else here</a></li>
              </ul>
            </li>
            <li><a href="#" class="navbar-brand">Logout</a></li>
            
          </ul>
        </div>
        
      </div>
      
    </div>
    <div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="page-header">
            <h2 class="reviews" >Discussion Forum</h2>
          
        </div>
        </div>
        </div>

</body>
</html>
<?php
 
$tbl_name="fquestions"; // Table name 
 $servername = "localhost";
$username = "arra"; 
$password = "";
$dbname = "foru";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Connect to server and select databse.
//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");
 
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);
?>
 


			<div class="col-md-10 col-md-offset-1">

								<form class="form-horizontal" role="form" style="padding:10px;">
								
                                <?php
												$tbl_name = "fquestions";                       
												$servername ="localhost";                                
											    $username = "arra";
												$password = "";                                 
												$dbname = "sen_project";

									$conn = mysqli_connect($servername, $username, $password, $dbname);
									// Check connection
									if (!$conn) {
									    die("Connection failed: " . mysqli_connect_error());
									}
									// id from the main forum page
								$id=$_GET['id'];

								$sql = "SELECT * FROM  $tbl_name WHERE  id='$id'";
								//echo $id;
								$result = mysqli_query($conn,$sql);
								if(!$result)
								 {
									 die('Could not get data: ' . mysqli_error());
								 }

								 $ro = mysqli_fetch_array($result);

								?>
								<div class="panel">
				            			<div class="panel-heading">
				            			<div class="well well-sm">
				                			<h4 class="panel-title">
				                			 <strong><?php echo $ro['topic']; ?></strong>
				                			 </h4>
				                			 </div>
				                		</div>

				                		<div class="panel-body">
				                			<?php
				                				
				                				echo "<label class=\"col-lg-4\">Post:</label>";
												echo "<p class=\"col-lg-8\">".$ro['detail']."</p>";	


												echo "<label class=\"col-lg-4\">Posted by:</label>";
												echo "<p class=\"col-lg-8\">anirudh</p>";	

												echo "<label class=\"col-lg-4\">Posted On:</label>";
												echo "<p class=\"col-lg-8\">".$ro['datetime']."</p>";	

				                			?>
                                        </div>
                                </div>


                    </form>

            </div>

               
                        <!--About tab-->                    
                        <div role="tabpanel" class="tab-pane active" id="it">
                                
                                <div class="col-md-10 col-md-offset-1">

                                <form class="form-horizontal" role="form" style="padding:10px;">
                                
                                <?php 
                                $servername = "localhost";
                                $username = "arra"; 
                                $password = "";
                                $dbname = "sen_project";

                                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                                    // Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                $id=$_GET['id'];

                                $sql = "SELECT * FROM  `fanswer` WHERE question_id='$id'";
                                $result = mysqli_query($conn,$sql);
                                if(!$result)
                                 {
                                     die('Could not get data: ' . mysqli_error($conn));
                                 }
                                    $i=0;
                     while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                    $i++;
                                    ?>    
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                            <a class="accordion-toggle" 
                                             data-toggle="collapse" data-parent="#accordion1"
                                             href="#collapseIT<?=$i?>">
                                                <?php echo $row['question_id']." : ".$row['a_name'];?>
                                            </a>
                                        </h4>
                                        <div id="collapseIT<?=$i?>" class="panel-collapse collapse out ">
                                            <div class="panel-body">
                                                <?php
                                                        echo "<label class=\"col-lg-4\">Answer:</label>";
                                                        echo "<p class=\"col-lg-8\">".$row['a_answer']."</p>";                                                
                                                        //echo "<a href='" . $row['course_code'] . "'>Link</a></h3></b>";
                                                        echo "<label class=\"col-lg-4\">Answered On</label>";
                                                        echo "<p class=\"col-lg-8\">".$row['a_datetime']."</p>";

                                                        //echo"<br> <b>Teaching Assistant</b> :".$row['TAs'];
                                                        //echo $row['course_code'] . "</h3></b>";

                                                        /*if($row['semester'] == 1){
                                                            echo "<label class=\"col-lg-4\">Semester:</label>";
                                                         echo "<p class=\"col-lg-8\">".$row['semester']."</p>";
                                                        }
                                                         
                                                        else if($row['semester'] == 2)
                                                         {
                                                         echo "<label class=\"col-lg-4\">Semester:</label>";
                                                         echo "<p class=\"col-lg-8\">".$row['semester']."</p>";
                                                        }
                                                        else if($row['semester'] == 3)
                                                         {
                                                        echo "<label class=\"col-lg-4\">Semester:</label>";
                                                         echo "<p class=\"col-lg-8\">".$row['semester']."</p>";
                                                        }

                                                        
                                                         echo "<label class=\"col-lg-4\">Credits:</label>";
                                                         echo "<p class=\"col-lg-8\">".$row['credits']."</p>";
                                                            
                                                        echo "<label class=\"col-lg-4\">Description:</label>";
                                                         echo "<p class=\"col-lg-8\">".$row['description']."</p>";*/
                                                        ?>
                                            </div>
                                        </div></div>
                                   </div>            
                                                    <?php } ?>
                            
                                    
                                </form>

                                


                            
                 </div>
            

            <div class="col-md-10 col-md-offset-1">
            <div class="panel">
                    <div class="panel-heading">
                    <div class="well well-sm">
                        <h4 class="panel-title">
                         <strong>Add Answer</strong>
                         </h4>
                         </div>
                    </div>
                
                <form name="form1" method="post" action="add_answer.php">
                <!--<td>-->
                <!--<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">-->
                <!--<tr>

                <td width="18%"><strong>Name</strong></td>
                <td width="3%">:</td>
                <td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
                </tr>-->

                <!--<tr>
                <td><strong>Email</strong></td>
                <td>:</td>
                <td><input name="a_email" type="text" id="a_email" size="45"></td>
                </tr>-->

                <div class="form-group">
                     <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-8">
                        <textarea class="form-control" name="detail" id="detail" rows="5"></textarea>
                    </div>
                </div>

                <!--<tr>
                <td>&nbsp;</td>
                <td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
                </tr>-->


                <div class="form-group">
                    <div class="col-lg-3">
                        <button class="btn btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
               <!-- <button class="btn btn-warning" type="reset" name="Submit2" value="Reset">Reset</button>-->
                    </div>
            
                </div>
                
                
                </form>
                
            </div>
				                	

