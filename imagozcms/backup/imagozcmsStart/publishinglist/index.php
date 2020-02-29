<?php

/*Подключение к базе данных mylibrary*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT idcompany, companyname FROM publishingcompany';
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$error = 'Ошибка выбора издательства: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$publishingcompanys[] =  array ('idcompany' => $row['idcompany'], 'companyname' => $row['companyname']);
}

include 'company.html.php';

/*Добавление информации в таблицу author*/

	/*Загрузка шаблона form.html.php по ссылке*/
if (isset($_GET['add']))//Если есть переменная add выводится форма
{
	$padgeTitle = 'Новое издательство';// Переменные для формы "Издательство"
	$action = 'addform';
	$companyname = '';
	$idcompany = '';
	$button = 'Добавить издательство';
	
	include 'form.html.php';
	exit();
}
if (isset ($_GET['addform']))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'INSERT INTO publishingcompany SET companyname = :companyname';// псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':companyname', $_POST['companyname']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}	

/*Редактирование информации в таблице author*/

if (isset ($_POST['action']) && ($_POST['action'] == 'Upd'))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
	$sql = 'SELECT idcompany, companyname FROM publishingcompany WHERE idcompany = :idcompany';
	$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
	$s -> bindValue(':idcompany', $_POST['idcompany']);//отправка значения
	$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
	$error = 'Error select : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	$row = $s -> fetch();
	
	$padgeTitle = 'Редактировать издательство';// Переменные для формы "Издательство"
	$action = 'editform';
	$companyname = $row['companyname'];
	$idcompany = $row['idcompany'];
	$button = 'Обновить информацию об издательстве';
	
	include 'form.html.php';
	exit();
	
}
	/*Команда UPDATE*/
if (isset ($_GET['editform']))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'UPDATE publishingcompany SET companyname = :companyname WHERE idcompany = :idcompany';// псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcompany', $_POST['idcompany']);//отправка значения
		$s -> bindValue(':companyname', $_POST['companyname']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Error Update: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}	

/*Удаление из таблици publishingcompany*/

if (isset ($_POST['action']) && ($_POST['action'] == 'Del'))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	
	{
		$sql = 'DELETE FROM publishingcompany WHERE idcompany = :idcompany';// - псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcompany', $_POST['idcompany']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка удаления '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}	
