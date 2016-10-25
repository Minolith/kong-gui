<?php

namespace GUI;

class LogoutController{


	public static function init(){

		session_destroy();
		\GUI\GUI::redirect("/login");
		
	}

}

?>