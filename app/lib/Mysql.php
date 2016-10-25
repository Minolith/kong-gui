<?php

namespace GUI;

class Mysql{

	// @var object Mysql Database Object
    public static $db;

	public static function setDatabaseConnection($host,$user,$pass,$data){
		$link = mysqli_connect($host, $user, $pass, $data);

		if (!$link) {
			throw new \GUI\Exception("Error: Unable to connect to MySQL. Debugging errno: " . mysqli_connect_errno() . " - Debugging error: " . mysqli_connect_error());
		}

		return self::$db = $link;
	}

	public function query($q){
		$query = mysqli_query(self::$db,$q);
		if (!$query) {
			throw new \GUI\Exception("MYSQL Error: Debugging errno: " . mysqli_connect_errno() . " - Debugging error: " . mysqli_connect_error());
		}

		return $query;

	}


}

?>