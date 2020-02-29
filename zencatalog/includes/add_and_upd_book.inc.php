<?php

/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Добавление информации о книге*/
if (isset($_GET['add']))//Если есть переменная add выводится форма
{
	$padgeTitle = 'Новая книга';// Переменные для формы "Новая книга"
	$action = 'addform';
	$text = '';
	$idauthor = '';
	$idgenre = '';
	$description = '';
	$id = '';
	$button = 'Добавить книгу';
	
	/*Вывод информации для формы добавления*/

	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Список авторов*/
	try
	{
		$result = $pdo -> query ('SELECT idauthor, authorname FROM author');
	}
	catch (PDOException $e)
	{
		$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$authors[] = array('idauthor' => $row['idauthor'], 'authorname' => $row['authorname']);
	}
	
	
	
	/*Список жанров*/
	try
	{
		$result = $pdo -> query ('SELECT idgenre, genrename FROM genre');
	}
	catch (PDOException $e)
	{
		$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$genres[] = array('idgenre' => $row['idgenre'], 'genrename' => $row['genrename']);
	}
	
	/*Список издательств*/
	try
	{
		$result = $pdo -> query ('SELECT idcompany, companyname FROM publishingcompany');
	}
	catch (PDOException $e)
	{
		$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$publishingcompanys[] = array('idcompany' => $row['idcompany'], 'companyname' => $row['companyname'], 'selected' => FALSE);
	}
	
	include 'form.html.php';
	exit();
	
}

/*Обновление информации о книге*/
if (isset ($_POST['action']) && $_POST['action'] == 'Upd')
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT idbook, bookname, description, idauthor, idgenre FROM book WHERE idbook = :idbook';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idbook', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$error = 'Error select book: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$padgeTitle = 'Редактировать характеристики книги';// Переменные для формы "Обновление книги"
	$action = 'editform';
	$text = $row['bookname'];
	$idauthor = $row['idauthor'];
	$idgenre = $row['idgenre'];
	$description = $row['description'];
	$id = $row['idbook'];
	$button = 'Обновить информацию о книге';
	
	/*Список авторов*/
	try
	{
		$result = $pdo -> query ('SELECT idauthor, authorname FROM author');
	}
	catch (PDOException $e)
	{
		$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$authors[] = array('idauthor' => $row['idauthor'], 'authorname' => $row['authorname']);
	}
	
	/*Список жанров*/
	try
	{
		$result = $pdo -> query ('SELECT idgenre, genrename FROM genre');
	}
	catch (PDOException $e)
	{
		$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$genres[] = array('idgenre' => $row['idgenre'], 'genrename' => $row['genrename']);
	}
	
	/*Книги по издательствам*/
	try
	{
		$sql = 'SELECT idcompany FROM bookincompany WHERE idbook = :idbook';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idbook', $id);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$error = 'Error select book: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($s as $row)
	{
		$selectedCompany[] = $row['idcompany'];
	}
	
	/*Список издательств*/
	try
	{
		$result = $pdo -> query ('SELECT idcompany, companyname FROM publishingcompany');
	}
	catch (PDOException $e)
	{
		$error = 'Ошибка выбора издательства'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$publishingcompanys[] = array('idcompany' => $row['idcompany'],'companyname' => $row['companyname'], 'selected' => in_array($row['idcompany'], $selectedCompany));
	}

	include 'form.html.php';
	exit();
}

/*команда INSERT  - добавление в базу данных*/
if (isset($_GET['addform']))//Если есть переменная addform выводится форма
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	if (($_POST['author']) && ($_POST['genre']) == '')
	{
		$error = 'Один или несколько атрибутов не указаны. Выбирете все.';
		include 'error.html.php';
		exit();
	}
	
	try
	{
		$sql = 'INSERT INTO book SET 
			bookname = :bookname,
			description = :description,	
			bookdate = CURDATE(),
			idauthor = :idauthor,
			idgenre = :idgenre';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':bookname', $_POST['text']);//отправка значения
		$s -> bindValue(':description', $_POST['description']);//отправка значения
		$s -> bindValue(':idauthor', $_POST['author']);//отправка значения
		$s -> bindValue(':idgenre', $_POST['genre']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	$idbook_ind = $pdo->lastInsertId();//метод возвращает число, которое MySQL назначил последней автомнкрементной записи (INSERT INTO book - в данном случае)

	if (isset ($_POST['publishingcompanys']))
	{
		try
		{
			$sql = 'INSERT INTO bookincompany SET 
				bookincompany.idbook = :idbook, 
				bookincompany.idcompany = :idcompany';
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной

			foreach	($_POST['publishingcompanys'] as $idcompanys)
			{		
				$s -> bindValue(':idbook', $idbook_ind);//отправка значения
				$s -> bindValue(':idcompany', $idcompanys);//отправка значения
				$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			}
		}
		catch (PDOException $e)
		{
			$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();
		}
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}

/*UPDATE - обновление информации в базе данных*/

if (isset($_GET['editform']))//Если есть переменная editform выводится форма
{
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	if (($_POST['author']) && ($_POST['genre'])&&($_POST['publishingcompanys']) == '')
	{
		$error = 'Один или несколько атрибутов не указаны. Выбирете все.';
		include 'error.html.php';
		exit();
	}
	
	try
	{
		$sql = 'UPDATE book SET 
			bookname = :bookname,
			description = :description,	
			idauthor = :idauthor,
			idgenre = :idgenre
			WHERE idbook = :idbook';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idbook', $_POST['id']);//отправка значения
		$s -> bindValue(':bookname', $_POST['text']);//отправка значения
		$s -> bindValue(':description', $_POST['description']);//отправка значения
		$s -> bindValue(':idauthor', $_POST['author']);//отправка значения
		$s -> bindValue(':idgenre', $_POST['genre']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка обновления информации book'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	try
	{
		$sql = 'DELETE FROM bookincompany WHERE idbook = :idbook';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idbook', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка удаления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	
	if (isset ($_POST['publishingcompanys']))
	{
		try
		{
			$sql = 'INSERT INTO bookincompany SET 
				idbook = :idbook_hier, 
				idcompany = :idcompany';
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной

			foreach	($_POST['publishingcompanys'] as $idcompanys)
			{		
				$s -> bindValue(':idbook_hier', $_POST['id']);//отправка значения
				$s -> bindValue(':idcompany', $idcompanys);//отправка значения
				$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			}
		}
		catch (PDOException $e)
		{
		$error = 'Ошибка обновления информации bookincompany'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
		}
	}
	
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}

/*DELETE - удаление книги и записей о ней*/

if (isset ($_POST['action']) && $_POST['action'] == 'Del')
{	
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	try
	{
		$sql = 'DELETE FROM bookincompany WHERE idbook = :idbook';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idbook', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка удаления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	try
	{
		$sql = 'DELETE FROM book WHERE idbook = :idbook';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idbook', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
	$error = 'Ошибка удаления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
	}
	header ('Location: .');//перенаправление обратно в контроллер index.php
	exit();
}	