<?php

namespace GUI;

class Controllers{

	public static $uri;

	public static function loadController(){
		self::getCurrentPaths();
		
		if ( is_file(\GUI\GUI::$controllersDirectory.ucfirst(self::$uri[0].".php"))){
			require(\GUI\GUI::$controllersDirectory.ucfirst(self::$uri[0].".php"));

			$controllerInit = "\GUI\\".ucfirst(\GUI\Controllers::$uri[0]."Controller")."::init";
			call_user_func($controllerInit);
		}
	}

	public static function getCurrentPaths(){

		if ( $_SERVER["QUERY_STRING"]!=="") {

			// Get and set the query string
			$redirect_query_string =  explode("&",$_SERVER["QUERY_STRING"]);
			foreach ($redirect_query_string as $key => $value){
				$query = explode("=",$value);
				$_REQUEST[$query[0]]=$query[1];
				
			}

		}

		if ( !isset($_SERVER["REDIRECT_URL"])){
			self::$uri[0] = "dashboard";
			return self::$uri;
		}
		// Get the path
		$uri_path = explode("/",$_SERVER["REDIRECT_URL"]);

		foreach ($uri_path as $key => $value){
			if ( $value == "")continue;
			self::$uri[] = $value;
		}

		return self::$uri;

	}

}
?>