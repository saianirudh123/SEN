<?php
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
	if(isset($_POST['Modal_Submit_btn'])){
		//check whether the username and password fields are empty: will be done through javascript
		if((trim($_POST['old_pwd'])!='') && (trim($_POST['new_pwd'])!='') && (trim($_POST['cnf_new_pwd'])!='')){
			//initialize $username and $password
			$old_pwd=$_POST['old_pwd']; 
		
			$query = "SELECT * FROM login WHERE uid='{$_SESSION['username']}'";
			$set = mysql_query($query);
			$num = mysql_num_rows($set);
			if($num == 0)
			{
				$error_message = "Unknown error. Try Again!";
			}
			else{
			$rw = mysql_fetch_object($set);
			if($rw->temp_pwd == $old_pwd || $rw->pwd == $old_pwd)
			{
			  $new_pwd = trim($_POST['new_pwd']);
			  $cnf_new_pwd = trim($_POST['cnf_new_pwd']);
				
			  if($new_pwd != $cnf_new_pwd)
			  {
				$error_message = "New password and Confirm new password do not match. Try again";
				}
				else{
				  $random_string = generateRandomString();
				  	$update = "UPDATE login SET temp_pwd='{$random_string}', pwd='{$new_pwd}' where uid = '{$_SESSION['username']}'";

//					$insert = "INSERT INTO login (uid, temp_pwd, pwd) VALUES ('{$_SESSION['username']}', '{$random_string}', '{$new_pwd}')";
				    $set = mysql_query($update);
					$aff = mysql_affected_rows();
							if($aff==1){
		  					
								//display password successfully changed!
							} 
							else{
							$error_message="Could not change password.<br>Unknown Error. Try again HMM";
							
							}
			
				}
				}
			else{
				$error_message = "Old passwod Incorrect. Please try again";
			}
		}
		}
		else{
			$error_message = "All feilds required.Try again";
		}
	
	if($error_message){
			header("Location: homepage.php?Change_pwd=0&error_message={$error_message}");
		} else {
			header("Location: homepage.php?Change_pwd=1&error_message={$_SESSION['username']}");
		}
	}
?>