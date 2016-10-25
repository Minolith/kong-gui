<?php
session_start();
require(dirname(__FILE__) . '/app/init.php');

// Not required for launch. Hide DB Creds
require(dirname(__FILE__) . '/nocommit-database.php');

// Setup the Database Connection
\GUI\Mysql::setDatabaseConnection($db_host,$db_user,$db_pass,$db_name);

// Setup the location of the views directory
\GUI\GUI::setViewsDirectory(dirname(__FILE__) . '/app/views/');

// Setup the location of the controllers directory
\GUI\GUI::setControllersDirectory(dirname(__FILE__) . '/app/controllers/');

// Setup the document root
\GUI\GUI::setDocRoot($_SERVER['DOCUMENT_ROOT']);

// Setup the location of the controllers directory
\GUI\GUI::SetThemeTemplate('gui-v1');

// Start the service
\GUI\GUI::start();


?>