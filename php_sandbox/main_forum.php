<!DOCTYPE html>
<?php
session_start();
?>

<?php
require_once 'connect.inc.php';
require_once 'change_pwd.php';
?>

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
$dbname = "sen_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Connect to server and select databse.
//mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysqli_select_db("$db_name")or die("cannot select DB");
 
$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending
 
$result=mysqli_query($conn,$sql);
?>
 
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr>
 
<?php
 
// Start looping table row
while($rows = mysqli_fetch_array($result)){
?>
<tr>
<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
<td bgcolor="#FFFFFF"><a href="tp.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
</tr>
 
<?php
// Exit looping and close connection 
}
mysqli_close($conn);
?>
 
<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6">
	<form action="new_topic.php">
    	<button class="btn btn-primary" type="submit">Create New Topic</button>
	</form>
</td>
</tr>
</table>