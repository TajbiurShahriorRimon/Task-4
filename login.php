<?php
	$username="";
	$password="";
	$err_username="";
	$err_password="";
	
    $hasError=false;
    $flag_sig = 0;
	
	if(isset($_POST["login"])){
		if(empty($_POST["username"])){
			$err_username="*Username required";
			$hasError = true;
		}
		elseif(strlen($_POST["username"]) < 1){
			$err_username="*Username must have characters long";
			$hasError = true;
		}
		else{
			$username=$_POST["username"];
		}
		if(empty($_POST["password"])){
			$err_password="*Password required";
			$hasError = true;
		}
		elseif(strlen($_POST["password"]) < 1){
			$err_password="*Password must have characters long";
			$hasError = true;
		}
		else{
            $password=$_POST["password"];
            
		}
		
		if(!$hasError){
            //echo $username ." ".$password;	
            $users = simplexml_load_file("data.xml");
			//echo $err_username . "<br>";
            //echo $err_password . "<br>";
            foreach($users as $user1){
                if($username == $user1->username && $password== $user1->password){
                    $flag_sig = 1;
                    //echo "sfs";
                    break;
                }
            }
            if($flag_sig == 1){
                //echo "fsef";
                header("Location: dashbord.php");
            }
		}
		else{
            echo "not matched!";
        }
	}
?>
<html>
	<head>
		<title>Login From</title>
	</head>
	<body>
		<h1>Login Form</h1>
		<form action="" method="post">
			<table >
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" value="<?php echo $username;?>" placeholder="Write your username">
						<span><?php echo $err_username;?></span>
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input name="password" type="password" value="<?php echo $password;?>" placeholder="Write your password">
						<span><?php echo $err_password;?></span>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="submit" name="login" value="Login">
					</td>
				</tr>
			</table>
		</form>
	
	</body>
</html>