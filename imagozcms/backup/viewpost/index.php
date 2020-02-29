<?php
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Загрузка содержимого статьи*/
if (isset ($_GET['id']))
{
	$idPost = $_GET['id'];
	
	@session_start();//Открытие сессии для сохранения id статьи
	
	$_SESSION['idpost'] = $idPost;
	$select = 'SELECT * FROM posts WHERE id = ';

	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = $select.$idPost;
		$result = $pdo->query($sql);
	}
	
	catch (PDOException $e)
	{
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$posts[] =  array ('id' => $row['id'], 'text' => $row['post'], 'posttitle' =>  $row['posttitle'], 
							'postdate' => $row['postdate'], 'viewcount' => $row['viewcount'] );
	}	
	
	$title = 'ImagozCMS | '.$row['posttitle'];//Данные тега <title>
	$headMain = $row['posttitle'];
	$authorComment = '';
	
	/*Обновление значения счётчика*/
	
	$updateCount = 'UPDATE posts SET viewcount = viewcount + 1 WHERE id = ';
	
	try
	{
		$sql = $updateCount.$idPost;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	
	catch (PDOException $e)
	{
		$error = 'Ошибка счётчика ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	/*Вывод тематик(тегов)*/
	
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT meta.id, metaname FROM posts 
				INNER JOIN metapost ON posts.id = idpost 
				INNER JOIN meta ON meta.id = idmeta 
				WHERE posts.id = '.$idPost;//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}
	
	catch (PDOException $e)
	{
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$metas[] =  array ('id' => $row['id'], 'metaname' => $row['metaname']);
	}
		
	
 /*Скрипт оценки статьи*/

	/*Вывод панели оценок*/
		
	/*Возвращение id автора*/
		
	/*Подключение к базе данных*/
	if (isset($_SESSION['loggIn']))
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
		try
		{
			$selectID = 'SELECT id FROM author WHERE authorname = ';//запрос, возвращающий id
			$authorName = authorLogin ($_SESSION['email'], $_SESSION['password']);//возвращает имя автора
			$sql = $selectID.'"'.$authorName.'"';
			$result = $pdo->query($sql);
		}

		catch (PDOException $e)
		{
			$error = 'Ошибка выбора id ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();
		}
		
		/*Вывод результата в шаблон*/
		foreach ($result as $row)
		{
			$authorID[] =  array ('idauthor' => $row['id']);
		}	
		
		$selectedAuthor = (int)$row['id'];//id автора
	}
		
	else
	{
		$selectedAuthor = 0;//id автора
	}
	
	@session_start();//Открытие сессии для сохранения id автора
	
	$_SESSION['idauthor'] = $selectedAuthor;
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	$votedPost = (int)$_SESSION['idpost'];
	
	try
	{
		$sql = 'SELECT * FROM votedauthor WHERE idauthor = '.$selectedAuthor.' AND idpost = '.$votedPost;
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$error = 'Ошибка выбора id ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$authorID2[] =  array ('idauthor' => $row['idauthor'], 'idpost' => $row['idpost']);
	}	
		
	if(!isset ($row['idauthor']))
	{		
		$votedAuthor = '';
	}
	
	else
	{
		$votedAuthor = (int)$row['idauthor'];//id автора, который проголосовал
	}	
	
	if (!isset ($row['idpost']))//если переменная отсутствует
	{
		$votedPost = '';
	}
	
	else
	{		
		$votedPost = (int)$row['idpost'];//id статьи, за которую проголосовали
	}
	
	/*Условия вывода панели голосования*/
	if (($votedAuthor == $selectedAuthor) && ($votedPost == $_SESSION['idpost']) || (!isset($_SESSION['loggIn'])))
	{
		$votePanel = '';
	}
	
	elseif ((isset($_SESSION['loggIn'])) && ($votedAuthor != $selectedAuthor))
	{
		$votePanel = '<form action=" " metod "post">
						<input type = "hidden" name = "id" value = "'.$_SESSION['idpost'].'">
						<input type = "submit" name = "vote" value = "5" class="btn btn-primary btn-sm"> 
						<input type = "submit" name = "vote" value = "4" class="btn btn-primary btn-sm"> 
						<input type = "submit" name = "vote" value = "3" class="btn btn-primary btn-sm"> 
						<input type = "submit" name = "vote" value = "2" class="btn btn-primary btn-sm"> 
						<input type = "submit" name = "vote" value = "1" class="btn btn-primary btn-sm"> 
					  </form>';
	}
	
	/*Оценка статьи*/
	if (isset($_GET['vote']))
	{
		$vote = $_GET['vote'];//значение оценки
		$averageNumber = 0;//среднее значение
		
		$updateVoteCount = 'UPDATE posts SET votecount = votecount + 1 WHERE id = '.$_SESSION['idpost'];//обновление числа проголосовавших
		$updateTotalNumber = 'UPDATE posts SET totalnumber = totalnumber + '.$vote.' WHERE id = '.$_SESSION['idpost'];//обновление общего числа
		$selectForAverage = 'SELECT totalnumber, votecount FROM posts WHERE id = '.$_SESSION['idpost'];//выбор числа проголосовавших и общего числа для вычисления среднего
							
		/*Подключение к базе данных*/
		include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
		
		try
		{
			$pdo->beginTransaction();//инициация транзакции
			
			$sql = $updateVoteCount;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$sql = $updateTotalNumber;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$sql = $selectForAverage;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$pdo->commit();//подтверждение транзакции	
			
		}
		
		catch (PDOException $e)
		{
		
			$pdo->rollBack();//отмена транзакции
			$error = 'Error transaction 1 ';// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();		
		}
			
		foreach ($s as $row)
		{
			$forAverage[] =  array ('totalnumber' => $row['totalnumber'], 'votecount' => $row['votecount']);
		}
			
		$averageNumber = $row['totalnumber']/$row['votecount'];//вычисление среднего значения	
		$updateAverageNumber = 'UPDATE posts SET averagenumber = '.$averageNumber.' WHERE id = '.$_SESSION['idpost'];//обновление среднего значения в БД
		$insertToVotedAuthor ='INSERT INTO votedauthor SET idpost = '.$_SESSION['idpost'].', idauthor = '.$_SESSION['idauthor'].', vote = '.$vote;//обновление таблицы проголосовавшего автора
		
	/*	'UPDATE posts SET averagenumber = totalnumber/votecount WHERE id = '*/
		
		/*Подключение к базе данных*/
		include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';												
														  
		try
		{
			$pdo->beginTransaction();//инициация транзакции
			
			$sql = $updateAverageNumber;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$sql = $insertToVotedAuthor;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$pdo->commit();//подтверждение транзакции	
		}
		
		catch (PDOException $e)
		{
		
			$pdo->rollBack();//отмена транзакции
			$error = 'Error transaction 2 '.$e -> getMessage();// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();		
		}
			
		header ('Location: ../viewpost/?id='.$_SESSION['idpost']);//перенаправление обратно в контроллер index.php
		exit();
	}
	
	/*Вывод комментариев*/
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	try
	{
		$sql = 'SELECT comments.id, comment, commentdate, authorname FROM comments 
		INNER JOIN author 
		ON idauthor = author.id 
		WHERE idpost = '.$idPost.' 
		ORDER BY comments.id DESC';//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$comments[] =  array ('id' => $row['id'], 'text' => $row['comment'], 'date' => $row['commentdate'], 'authorname' => $row['authorname']);
	}
	
	include 'viewpost.html.php';
	exit();		
}
	
/*Добавление комментария*/
if (isset ($_GET['addcomment']))
{
	$title = 'ImagozCMS | Добавление комментария';//Данные тега <title>
	$headMain = 'Добавление комментария';
	$padgeTitle = 'Новый комментарий';// Переменные для формы "Новая статья"
	$action = 'addform';	
	$text = '';
	$idauthor = '';
	$id = '';
	$button = 'Добавить комментарий';
	
	if (isset($_SESSION['loggIn']))
	{
		$authorComment = authorLogin ($_SESSION['email'], $_SESSION['password']);//возвращает имя автора
		
		include 'form.html.php';
		exit();
	}	
	
	else
	{
		$title = 'Ошибка добавления комментария';//Данные тега <title>
		$headMain = 'Ошибка добавления комментария';
		$commentError = 'Авторизируйтесь в системе или зарегестрируйтесь для добавления комментария!';//Вывод сообщения в случае невхода в систему
		
		include 'commentfail.html.php';
		exit();
	}	
}

/*Обновление комментария*/
if (isset ($_POST['action']) && $_POST['action'] == 'Редактировать')
{		
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

	try
	{
		$sql = 'SELECT * FROM comments  
		WHERE id = :idcomment';//Вверху самое последнее значение
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcomment', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();	
	
	$padgeTitle = 'Обновить комментарий';// Переменные для формы "Новая статья"
	$action = 'editform';	
	$text = $row['comment'];
	$id = $row['id'];
	$button = 'Обновить комментарий';
	
	include 'form.html.php';
	exit();
}
	
/*команда INSERT  - добавление комментария в базу данных*/
if (isset($_GET['addform']))//Если есть переменная addform выводится форма
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
		
	/*Возвращение id автора*/
	try
	{
		$selectComment = 'SELECT id FROM author WHERE authorname = ';//запрос, возвращающий id
		$authorComment = authorLogin ($_SESSION['email'], $_SESSION['password']);//возвращает имя автора
		
		/*Подключение к базе данных*/
		include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
		$sql = $selectComment.'"'.$authorComment.'"';
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$error = 'Ошибка выбора id ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
		
	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$authorID[] =  array ('idauthor' => $row['id']);
	}	
		
	$selectedAuthor = (int)$row['id'];//id автора комментария
		
	try
	{
		$sql = 'INSERT INTO comments SET 
			comment = :comment,	
			commentdate = SYSDATE(),
			idauthor = '.$selectedAuthor.','.
			'idpost = '.$_SESSION['idpost'];
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':comment', $_POST['comment']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	
	catch (PDOException $e)
	{
		$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	header ('Location: ../viewpost/?id='.$_SESSION['idpost']);//перенаправление обратно в контроллер index.php
	exit();	
}
	
/*UPDATE - обновление текста комментария*/

if (isset($_GET['editform']))//Если есть переменная editform выводится форма
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'UPDATE comments SET 
			comment = :comment
			WHERE id = :idcomment';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcomment', $_POST['id']);//отправка значения
		$s -> bindValue(':comment', $_POST['comment']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
		
	catch (PDOException $e)
	{
		$error = 'Ошибка обновления информации comment'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	header ('Location: ../viewpost/?id='.$_SESSION['idpost']);//перенаправление обратно в контроллер index.php
	exit();
}

/*DELETE - удаление комментария*/

if (isset ($_POST['action']) && $_POST['action'] == 'Del')	
{	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'DELETE FROM comments WHERE id = :idcomment';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcomment', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	
	catch (PDOException $e)
	{
		$error = 'Ошибка удаления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	header ('Location: ../viewpost/?id='.$_SESSION['idpost']);//перенаправление обратно в контроллер index.php
	exit();
}	
	
