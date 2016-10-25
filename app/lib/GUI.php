<?php

namespace GUI;

class GUI{

	// @var Set the path to the Views directory
    public static $viewsDirectory;

    // @var Set the path to the Controllers directory
    public static $controllersDirectory;

    // @var Set the name of the theme
    public static $themeTemplate;

    // Set the document root var
    public static $docRoot;

    // @array placeholder for the user array
    public static $user;


    // @var sets the Views directory
	public static function setViewsDirectory($views){
		return self::$viewsDirectory = $views;
	}

	// @var sets the Controllers direcrory
	public static function setControllersDirectory($controllers){
		return self::$controllersDirectory = $controllers;
	}

	// @var sets the document root
	public static function setDocRoot($root){
		return self::$docRoot = $root;
	}

	// @var sets the Theme template name
	public static function SetThemeTemplate($theme){
		return self::$themeTemplate = $theme;
	}

	// @bool check if the user is logged in
	public static function checkLogin(){
		if ( !isset($_SESSION['token'])) {
			return false;
		} else {
			return true;
		}
	}

	// Global start button
	public static function start(){

		// Redirect the user to the login page if they aren't logged in
		if ( self::checkLogin()==false and $_SERVER['REQUEST_URI']!=='/login' and $_SERVER['REQUEST_URI']!=='/forgot-password'){
			self::redirect("/login");
			exit(); //exit at this point because there no need to execute any more
		} 

		// Get the current view or controllers
		if ($_SERVER['REQUEST_METHOD']=="POST"){
			self::getController();
		} else {
			self::getView();
		}
		
	}

	public static function getView(){
		\GUI\Views::loadView();
	}

	public static function getController(){
		\GUI\Controllers::loadController();
	}

	// Redirect function
	public static function redirect($url){
		header("Location: ".$url);
	}

	// Logout function
	public static function logout(){
		foreach ($_SESSION as $key => $value){
				unset($_SESSION[$key]);
			}

			session_destroy();

			return self::redirect("/");
	}


}


?>