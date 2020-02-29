<?php

/*Подключение к базе данных mylibrary*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT idauthor, authorname FROM author';
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$error = 'Error table "Genre": ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

/*Вывод результата в шаблон*/
foreach ($result as $row)
{
	$authors[] =  array ('idauthor' => $row['idauthor'], 'authorname' => $row['authorname']);
}

include 'author.html.php';

/*Добавление информации в таблицу author*/

	/*Загрузка шаблона form.html.php по ссылке*/
if (isset($_GET['add']))//Если есть переменная add выводится форма
{
	$padgeTitle = 'Новый автор';// Переменные для формы "Новый автор"
	$action = 'addform';
	$authorname = '';
	$dateofbirth = '';
	$idauthor = '';
	$button = 'Добавить автора';
	
	include 'form.html.php';
	exit();
}
if (isset ($_GET['addform']))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'INSERT INTO author SET authorname = :authorname, dateofbirth = :dateofbirth';// псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':authorname', $_POST['authorname']);//отправка значения
		$s -> bindValue(':dateofbirth', $_POST['dateofbirth']);//отправка значения
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
	$sql = 'SELECT idauthor, authorname, dateofbirth FROM author WHERE idauthor = :idauthor';
	$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
	$s -> bindValue(':idauthor', $_POST['idauthor']);//отправка значения
	$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
	$error = 'Error select : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	$row = $s -> fetch();
	
	$padgeTitle = 'Редактировать автора';// Переменные для формы "Новый автор"
	$action = 'editform';
	$authorname = $row['authorname'];
	$dateofbirth = $row['dateofbirth'];
	$idauthor = $row['idauthor'];
	$button = 'Обновить информацию об авторе';
	
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
		$sql = 'UPDATE author SET authorname = :authorname, dateofbirth = :dateofbirth WHERE idauthor = :idauthor';// псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idauthor', $_POST['idauthor']);//отправка значения
		$s -> bindValue(':authorname', $_POST['authorname']);//отправка значения
		$s -> bindValue(':dateofbirth', $_POST['dateofbirth']);//отправка значения
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

/*Удаление из таблици author*/

if (isset ($_POST['action']) && ($_POST['action'] == 'Del'))
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT для ID книг*/
	try
	{
	$sql = 'SELECT idbook FROM book WHERE idauthor = :idauthor';
	$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
	$s -> bindValue(':idauthor', $_POST['idauthor']);//отправка значения
	$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
	$error = 'Error table : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	$result = $s -> fetchAll();
	
	try
	/*Удаление записи об издательстве НЕ РАБОТАЕТ ИСПРАВИТЬ!*/
	{
		$sql = 'DELETE FROM bookincompany WHERE idbook = :idauthor';// - псевдопеременная получающая значение из формы ВОЗМОЖНО ОШИБКА ЗДЕСЬ!
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		
		foreach ($result as $row)
		{
			$idbook = $row['idbook'];
			$s -> bindValue(':idbook', $idbook);//отправка значения
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		}
	}
	
	catch (PDOException $e)
	
	{
	$error = 'Ошибка удаления '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	try
	/*Удаление книг, принадлежащих автору*/
	{
		$sql = 'DELETE FROM book WHERE idauthor = :idauthor';// - псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idauthor', $_POST['idauthor']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка удаления '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	try
	/*Удаление имени автора*/
	{
		$sql = 'DELETE FROM author WHERE idauthor = :idauthor';// - псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idauthor', $_POST['idauthor']);//отправка значения
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



	