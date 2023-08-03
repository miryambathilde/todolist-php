<?php

class Database
{
	public static function connect()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "todo_list";

		$db = new mysqli($servername, $username, $password, $dbname);
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
