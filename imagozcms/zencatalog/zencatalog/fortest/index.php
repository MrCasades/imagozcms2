<?php
try
{
	$pdo = new PDO('mysql:host = localhost; dbmame = mylibrary', 'mylib_user', '22556688');//подключение к базе данных
	$pdo -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//поведение объекта PDO при генерации ошибок
	$pdo -> exec ('SET NAMES "utf8"');// метод задающий кодировку UTF8
}

catch (PDOException $e)
{
	$output = 'No connection to Data_Base.';//. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'output.html.php';
	exit();
}
$output = 'Connect to Data Base "MyLibrary"';
include 'output.html.php';
	