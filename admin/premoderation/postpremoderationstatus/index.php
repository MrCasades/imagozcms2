<?php

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

else
{
	include '../login.html.php';
	exit();
}

/*Загрузка сообщения об ошибке входа*/
if (!userRole('Администратор'))
{	
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Доступ запрещен';
	include '../accessfail.html.php';
	exit();
}

/*Публикация статьи*/

if (isset ($_POST['action']) && $_POST['action'] == 'Опубликовать')
{	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT id, posttitle, imghead FROM posts WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Error select book: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$title = 'Публикация статьи';//Данные тега <title>
	$headMain = 'Публикация статьи';
	$robots = 'noindex, nofollow';
	$descr = '';
	$action = 'premodyes';
	$pointPanel = '<label for = "points">Оценка статьи </label>
			  	   <input type = "text" name = "points" value = "100" id = "checknum"> ';
	$premodYes = 'Опубликовать материал ';
	$posttitle = $row['posttitle'];
	$id = $row['id'];
	$button = 'Опубликовать';
	$scriptJScode = '<script src="script.js"></script>';
	
	include 'premodstatus.html.php';
}

if (isset ($_GET['premodyes']))
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Скрипт пополнения счёта автора и изменение ранга*/
	/*Выбор цены  и id автора*/
	try
	{
		$sql = 'SELECT pricetext, idauthor, paymentstatus FROM posts WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора цены новости: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$price = $row['pricetext'];
	$idAuthor = (int) $row['idauthor'];
	$paymentStatus = $row['paymentstatus'];
	
	$rating = (int) $_POST['points'];//получение оценки редактора
	
	/*Выбор счётчика статей и номера ранга для сравнения*/
	try
	{
		$sql = 'SELECT lastnumber FROM author
				INNER JOIN rang ON idrang = rang.id 
				WHERE author.id = '.$idAuthor;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора цены новости: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$lastNumber = $row['lastnumber'];
	
	if ($paymentStatus == 'NO')//Если публикация подтверждается в первый раз, а не после предварительного снятия с публикации, происходит обновление счёта и ранга
	{
	
		try
		{
			$pdo->beginTransaction();//инициация транзакции
		
			/*Обновить счёт автора, рейтинг и счётчик статей*/
			$sql = 'UPDATE author 
					SET score = score + '.$price.',
					countposts = countposts + 1,
					rating = rating + '.$rating.' 
					WHERE id = '.$idAuthor;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		
			/*Обновить ранг автора*/
			$sql = 'UPDATE author 
					SET idrang = idrang + 1
					WHERE id = '.$idAuthor. ' AND countposts > '.$lastNumber;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			/*Обновить статус оплаты во избежании повторной оплаты и оценку статьи*/
			$sql = 'UPDATE posts SET paymentstatus = "YES", 
									 postdate = SYSDATE(),
									 articlerating = articlerating + '.$rating.' WHERE id = :idpost';
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> bindValue(':idpost', $_POST['id']);//отправка значения
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		
			$pdo->commit();//подтверждение транзакции	
		}
		
		catch (PDOException $e)
		{
			$pdo->rollBack();//отмена транзакции
			$robots = 'noindex, nofollow';
			$descr = '';
			$error = 'Ошибка транзакции при обновлении счёта и ранга'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();
		}
	}
	
	try
	{
		$sql = 'UPDATE posts SET premoderation = "YES" WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка удаления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
		
	header ('Location: //'.$_SERVER['SERVER_NAME']);//перенаправление обратно в контроллер index.php
	exit();
}

if (isset ($_POST['action']) && $_POST['action'] == 'Добавить в Дзен')
{	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT id, posttitle, imghead FROM posts WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Error select book: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$title = 'Публикация статьи';//Данные тега <title>
	$headMain = 'Публикация статьи';
	$robots = 'noindex, nofollow';
	$descr = '';
	$action = 'premodzenyes';
	$premodYes = 'Опубликовать материал ';
	$posttitle = $row['posttitle'];
	$id = $row['id'];
	$button = 'Опубликовать';
	
	include 'premodstatus.html.php';
}

if (isset ($_GET['premodzenyes']))
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Скрипт пополнения счёта автора и изменение ранга*/
	/*Выбор цены  и id автора*/
	try
	{
		$sql = 'SELECT pricetext, idauthor, paymentstatus FROM posts WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора цены новости: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$price = $row['pricetext'];
	$idAuthor = (int) $row['idauthor'];
	$paymentStatus = $row['paymentstatus'];
	
	/*Выбор счётчика статей и номера ранга для сравнения*/
	try
	{
		$sql = 'SELECT lastnumber FROM author
				INNER JOIN rang ON idrang = rang.id 
				WHERE author.id = '.$idAuthor;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора цены новости: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$lastNumber = $row['lastnumber'];
	
	if ($paymentStatus == 'NO')//Если публикация подтверждается в первый раз, а не после предварительного снятия с публикации, происходит обновление счёта и ранга
	{
	
		try
		{
			$pdo->beginTransaction();//инициация транзакции
		
			/*Обновить счёт автора и счётчик статей*/
			$sql = 'UPDATE author 
					SET score = score + '.$price.',
					countposts = countposts + 1 WHERE id = '.$idAuthor;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		
			/*Обновить ранг автора*/
			$sql = 'UPDATE author 
					SET idrang = idrang + 1
					WHERE id = '.$idAuthor. ' AND countposts > '.$lastNumber;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			/*Обновить статус оплаты во избежании повторной оплаты*/
			$sql = 'UPDATE posts SET paymentstatus = "YES", 
									 postdate = SYSDATE() WHERE id = :idpost';
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> bindValue(':idpost', $_POST['id']);//отправка значения
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		
			$pdo->commit();//подтверждение транзакции	
		}
		
		catch (PDOException $e)
		{
			$pdo->rollBack();//отмена транзакции
			$robots = 'noindex, nofollow';
			$descr = '';
			$error = 'Ошибка транзакции при обновлении счёта и ранга'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();
		}
	}
	
	try
	{
		$sql = 'UPDATE posts SET premoderation = "YES",
							 	 zenpost = "YES" WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка обновления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
		
	header ('Location: //'.$_SERVER['SERVER_NAME']);//перенаправление обратно в контроллер index.php
	exit();
}

/*Снятие с публикации статьи*/

if (isset ($_POST['action']) && $_POST['action'] == 'Снять с публикации')
{	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT id, posttitle, imghead FROM posts WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Error select book: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$title = 'Снятие с публикации статьи ';//Данные тега <title>
	$headMain = 'Снятие с публикации статьи';
	$robots = 'noindex, nofollow';
	$descr = '';
	$action = 'premodno';
	$pointPanel = '';
	$premodYes = 'Снять с публикации материал ';
	$posttitle = $row['posttitle'];
	$id = $row['id'];
	$button = 'Снять с публикации';
	
	include 'premodstatus.html.php';
}

if (isset ($_GET['premodno']))
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'UPDATE posts SET premoderation = "NO" WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка снятия с публикации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
		
	header ('Location: //'.$_SERVER['SERVER_NAME']);//перенаправление обратно в контроллер index.php
	exit();
}	

/*Отклонить материал*/

if (isset ($_POST['action']) && $_POST['action'] == 'Отклонить')
{	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT id, posttitle, imghead FROM posts WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Error select book: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$title = 'Отклонить статью';//Данные тега <title>
	$headMain = 'Отклонить статью';
	$robots = 'noindex, nofollow';
	$descr = '';
	$action = 'refusedyes';
	$premodYes = 'Отклонить материал ';
	$posttitle = $row['posttitle'];
	$reasonrefusal = '';
	$id = $row['id'];
	$button = 'Отклонить';
	$scriptJScode = '<script src="script.js"></script>
					 <script src="/js/jquery-1.min.js"></script>
					 <script src="/js/bootstrap-markdown.js"></script>
					 <script src="/js/bootstrap.min.js"></script>';//добавить код JS
	
	include 'refusalform.html.php';

}

if (isset ($_GET['refusedyes']))
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$pdo->beginTransaction();//инициация транзакции
		
		$sql = 'UPDATE posts SET refused = "YES" WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		
		$sql = 'UPDATE posts SET reasonrefusal = :reasonrefusal WHERE id = :idpost';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idpost', $_POST['id']);//отправка значения
		$s -> bindValue(':reasonrefusal', $_POST['reasonrefusal']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
				
		$pdo->commit();//подтверждение транзакции	
	}
	catch (PDOException $e)
	{
		$pdo->rollBack();//отмена транзакции
		
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка отклонения публикации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
		
	header ('Location: //'.$_SERVER['SERVER_NAME']);//перенаправление обратно в контроллер index.php
	exit();
}	
