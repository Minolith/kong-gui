<?php

namespace GUI;

class LoginController{
	
	public static function init(){

		$username = mysqli_real_escape_string(\GUI\Mysql::$db,$_POST['username']);
		$password = hash('sha256',mysqli_real_escape_string(\GUI\Mysql::$db,$_POST['password']));

		// Query the database
		$query = \GUI\Mysql::query("SELECT * FROM `admin_users` WHERE `username` = '".$username."' AND `password` = '".$password."' LIMIT 1");
		$user = mysqli_fetch_assoc($query);
		if ( mysqli_num_rows($query)==0){
			\GUI\GUI::redirect("/login");
			return false;
		}

		$_SESSION['token']=hash("sha256",$username.$password);

		\GUI\GUI::redirect("/dashboard");
	}
}

?>