<?php
session_start();
?>
<?php
require 'connect.inc.php';
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
function send_email($id, $tmp_pwd){
require_once('PHPMailer_5.2.4/class.phpmailer.php');
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "academia.daiict@gmail.com";
$mail->Password = "wewillrock";
$mail->SetFrom("academia.daiict@gmail.com");
$mail->Subject = "Mail Solved";
$mail->Body = "Hello, u can login using pwd : ".$tmp_pwd."<br>"."Click on the link to login : "."http://localhost".$_SERVER['REQUEST_URI'];
//$_SERVER['PHP_SELF'];
$id = $id."@daiict.ac.in";
$mail->AddAddress($id);
if(!$mail->Send())
   {
   echo "Mailer Error: " . $mail->ErrorInfo;
   }
   else
   {
   echo "Message has been sent";
   }

}
?>
<?php

function validateEMAIL($email) {
    $v = "/^[0-9]+@daiict.ac.in/";
	
    return (bool)preg_match($v, $email) && (strlen($email) == 22);
}

function generateRandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>


<?php //here i will compare the login values with the database
	if(isset($_POST['Login_btn'])){
		//check whether the username and password fields are empty: will be done through javascript
		if((trim($_POST['username'])!='') && (trim($_POST['password'])!='')){
			//initialize $username and $password
			$username=(int) trim($_POST['username']); 
			$password=trim($_POST['password']);
		
			//check the length of user name and password: in javascript: required??
			//$hash_password = sha1($password);
			
			//start the comparision process
			$query = "SELECT * FROM login WHERE uid='{$username}'";
			$set = mysql_query($query);
			$num = mysql_num_rows($set);
			if($num == 0)
			{
				$error_message = "Username does not exixts. Please sign up!";
			}
			
			else{
			
			$rw = mysql_fetch_object($set);
			if($rw->temp_pwd == $password)
			{
				$_SESSION['username'] = $username;
				if(is_prof($_SESSION['username']))
					header("Location: http://localhost/php_sandbox/edit_profile_prof_personal.php"); /* Redirect browser */
				else
					header("Location: http://localhost/php_sandbox/edit_profile_student_personal.php"); /* Redirect browser */
/* Make sure that code below does not get executed when we redirect. */
exit;
			
			}
			else if($rw->pwd == $password)
			{
				$_SESSION['username'] = $username;
				header("Location: http://localhost/php_sandbox/homepage.php"); /* Redirect browser */
				exit;
			}
			else{
				$error_message = "Username/Password Incorrect. Please try again";
			}
		}
		}
		else{
			$error_message = "Username/Password field left empty.Try again";
		}
	
	if($error_message){
			header("Location: index.php?login=0&error_message={$error_message}");
		} else {
			header("Location: index.php?login=1&error_message={$_SESSION['username']}");
		}
	}
?>


<?php 
	if(isset($_POST['Modal_Submit_btn'])){
		
	if((trim($_POST['email_id'])!='')){
			
				
					
			$email=trim($_POST['email_id']);
			
			if(validateEMAIL($email))
			{
			$uid=(int) substr($email,0,9);
			$query = "SELECT uid FROM login WHERE uid ='{$uid}' LIMIT 1";
			$chk = mysql_query($query);
			$num = mysql_num_rows($chk);
			if($num==0){ // not present in database
				
				//generate a random string
					$random_string = generateRandomString();
					$pwd = "";
					$insert = "INSERT INTO login (uid, temp_pwd, pwd) VALUES ('{$uid}', '{$random_string}', '{$pwd}')";
					$set = mysql_query($insert);
					$aff = mysql_affected_rows();
							if($aff==1){
								
								send_email($uid, $random_string);
								
								/*$queryInsert= "INSERT INTO teamtwisterscores (username, prevScore, totalScore) VALUES ('{$username}', 0, 0)";
								$chk=mysql_query($queryInsert);
								confirmQuery($chk);
								$num=mysql_affected_rows();
								if($num){
									$_SESSION['username']=$username;
									redirectTo("index.php");
								}
								else{
									$error_message="ERROR. Could not sign in. Try again";
								}*/
								
								
							} 
							else{
							$error_message="Could not signup.<br>Unknown Error. Try again";
							$checkError = 1;
							}
			
					}
					else{
						$query = "SELECT pwd FROM login WHERE uid ='{$uid}' LIMIT 1";
						$chk = mysql_query($query);
						$pwd = mysql_fetch_object($chk);
						if($pwd->pwd == "")
						{
							$random_string = generateRandomString();		
							$query = "UPDATE login SET temp_pwd='{$random_string}' WHERE uid = '{$uid}'";
							$set = mysql_query($query);
							$aff = mysql_affected_rows();
								if($aff==1){
								//send_email
								}else{
							$error_message="Could not signup.<br>Unknown Error. Try again";
							$checkError = 1;
							}		
						}
						
						else{
						$error_message="Could not signup.<br/>Emailid already exists. Please login.";
						}
						
					}
				}
				
		else
		{
				$error_message="Could not signup.<br/>Make sure you enter the correct daiict webmailid";
		}
	}
		else{
			$error_message="Could not signup.<br/>Make sure that the emailid is entered and then click submit";
		}
	 
		if($error_message){
			header("Location: index.php?login=\"\"&register=0&error_message={$error_message}");
		} else {
			header("Location: index.php?login=\"\"&register=1");
		}
	}
?>

<html>
	<head>
		<title>Welcome to Academia!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>


	<body>

		<div class="body"></div>

		<div class="grad"></div>
		
		<div class="header">
			<div>Welcome to<span> Academia!</span></div>
		</div>
		
		<br>
		
		<div class="login">
				<button class="btn btn-default" id="su" name="Signup_btn" type="submit" value="Signup!" data-toggle="modal" data-target="#sm">Signup!</button>
				<button class="btn btn-warning" name="ForgetPwd_btn" type="submit" value ="ForgetPwd" data-toggle="modal" data-target="#sm">Forgot Password</button>
		</div>
		

		<div class = "modal fade" id="sm" role="dialog">
				<div class = "modal-dialog">
					<div class = "modal-content">
						<form class="form-horizontal" action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<div class="col-md-9">
									<input type="email" class="form-control" style="margin-bottom:10px;" name="email_id" id="w-id" placeholder="Enter Webmail ID">
									<button class="btn btn-primary" type="Submit" name="Modal_Submit_btn" value="Signup" ><b>Submit</b><br>
									<button class="btn btn-danger" type="Submit" value="Close" style="margin-left:10px;" data-dismiss = "modal"><b>Close</b><br>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
					</div>
				</div>
		</div>
		
		<div class="entries">
			<form name="home" action="" method="post">
				<input type="text" placeholder="Webmail ID" name="username"><br></input>
				<input type="password" placeholder="Password" name="password"><br>
				<button class="btn btn-default" id="lg" type="Submit" name="Login_btn" value="Login" ><b>Login</b></button>
				<br>
			</form>	
		</div>
				
  
		<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
     	
	
	
		
	</body>

	
</html>
