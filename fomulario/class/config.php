<?php
    define('HOST', 'localhost');
	define('DB','db_canaa');
	define('USER', 'root');
	define('PASS', '');
	try{
		$pdo = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(Exception $e){
		echo 'erro ao conectar';
	} 

?>