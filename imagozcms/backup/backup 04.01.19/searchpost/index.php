<?php
/*Вывод информации для формы поиска*/

	$title = 'Поиск';
	$headMain = 'Поиск книг';
	
	/*Подключение к базе данных mylibrary*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
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
		$publishingcompanys[] = array('idcompany' => $row['idcompany'], 'companyname' => $row['companyname']);
	}
	
	include 'searchform.html.php';
	
	/*Формирование запроса SELECT*/
	
	if (isset($_GET['action']) && ($_GET['action']) == 'search')
	{
		/*Подключение к базе данных mylibrary*/
		include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
		
		/*Переменные для выражения SELECT*/
		$select = 'SELECT book.idbook, bookname, description';
		$from = ' FROM book';
		$where = ' WHERE TRUE';
		
		/*Выбор автора*/
		$forsearch = array();//массив заполнения запроса
		
		if ($_GET['author'] != '')//Если выбран автор
		{
			$where .= " AND idauthor = :idauthor";
			$forsearch[':idauthor'] = $_GET['author'];
		}
		
		/*Выбор жанра*/
		if ($_GET['genre'] != '')//Если выбран жанр
		{
			$where .= " AND idgenre = :idgenre";
			$forsearch[':idgenre'] = $_GET['genre'];
		}
		
		/*Выбор издательства*/
		if ($_GET['publishingcompany'] != '')//Если выбрано издательство
		{
			$from .= ' INNER JOIN bookincompany ON book.idbook = bookincompany.idbook';
			$where .= " AND bookincompany.idcompany = :idcompany";
			$forsearch[':idcompany'] = $_GET['publishingcompany'];
		}
		
		/*Поле строки*/
		if ($_GET['text'] != '')//Если выбрана какая-то строка
		{
			$where .= " AND bookname LIKE :bookname";
			$forsearch[':bookname'] = '%'. $_GET['text']. '%';	
		}
		
		/*Объеденение переменных в запрос*/
		try
		{
		$sql = $select.$from.$where;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute($forsearch);// метод дает инструкцию PDO отправить запрос MySQL. Т. к. массив $forsearch хранит значение всех псевдопеременных 
								  // не нужно указывать их по отдельности с помощью bindValue									
		}

		catch (PDOException $e)
		{
		$error = 'Error in select : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
		}
		
		foreach ($s as $row)
		{
			$books[] = array('idbook' => $row['idbook'], 'text' => $row['bookname'], 'description' => $row ['description']);
		}
		
		include 'booklist1.html.php';
		exit();
	}
	
	include 'add_and_upd_book.inc.php';//загрузка скрипта добавления и редактирования книг
	