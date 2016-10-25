<?php

namespace GUI;

class Views{

	public static $uri;

	

	public static function pageNotFound(){
		// Return 404;
		http_response_code(404);
		// Include the 404 Template
		include(\GUI\GUI::$docRoot.'/app/templates/'.\GUI\GUI::$themeTemplate."/404.php");
		return false;
	}

	public static function loadView(){
		self::getCurrentPaths();
		
		if ( is_file(\GUI\GUI::$viewsDirectory.ucfirst(self::$uri[0].".php"))){
			require(\GUI\GUI::$viewsDirectory.ucfirst(self::$uri[0].".php"));

			$viewInit = "\GUI\\".ucfirst(\GUI\Views::$uri[0]."View")."::init";

			// Load Function
			call_user_func($viewInit);

		} elseif (is_file(\GUI\GUI::$docRoot.'/app/templates/'.\GUI\GUI::$themeTemplate."/".self::$uri[0].".php")) {
			include(\GUI\GUI::$docRoot.'/app/templates/'.\GUI\GUI::$themeTemplate."/".self::$uri[0].".php");
		} else {
			\GUI\Views::pageNotFound();
		}
	}

	public static function includeHeader($meta){
		include(\GUI\GUI::$docRoot.'/app/templates/'.\GUI\GUI::$themeTemplate."/common/header.php");
	}
	public static function includeFooter(){
		include(\GUI\GUI::$docRoot.'/app/templates/'.\GUI\GUI::$themeTemplate."/common/footer.php");
	}
	public static function includeNav($meta){
		if ( isset($meta['alt-nav'])){
			include(\GUI\GUI::$docRoot.'/app/templates/'.\GUI\GUI::$themeTemplate."/common/".$meta['alt-nav']);
		} else {
			include(\GUI\GUI::$docRoot.'/app/templates/'.\GUI\GUI::$themeTemplate."/common/nav.php");
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