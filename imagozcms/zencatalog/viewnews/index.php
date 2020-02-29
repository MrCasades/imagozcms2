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
	$idNews = $_GET['id'];
	
	@session_start();//Открытие сессии для сохранения id статьи
	
	$_SESSION['idnews'] = $idNews;
	$select = 'SELECT newsblock.id AS newsid, author.id AS idauthor, news, newstitle, imghead, videoyoutube, viewcount, averagenumber, description, imgalt, newsdate, authorname, category.id AS categoryid, categoryname FROM newsblock 
			   INNER JOIN author ON idauthor = author.id 
			   INNER JOIN category ON idcategory = category.id WHERE premoderation = "YES" AND newsblock.id = ';

	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = $select.$idNews;
		$result = $pdo->query($sql);
	}
	
	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Error select news ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$newsIn[] =  array ('id' => $row['newsid'], 'idauthor' => $row['idauthor'],  'textnews' => $row['news'], 'newstitle' =>  $row['newstitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt'],
							'description' => $row['description'], 'newsdate' => $row['newsdate'], 'viewcount' => $row['viewcount'], 'averagenumber' => $row['averagenumber'],
							'authorname' => $row['authorname'], 'categoryname' =>  $row['categoryname'], 'categoryid' => $row['categoryid'], 'videoyoutube' => $row['videoyoutube']);
	}
	
	
	/*Если страница отсутствует. Ошибка 404*/
	if (empty ($newsIn))
	{
		$title = 'Ошибка 404!';//Данные тега <title>
		$headMain = 'Ошибка 404! Запрашиваемая страница отсутствует.';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Страницы по данному адресу не существует!';
		include 'error.html.php';
		exit();
	}
	
	@session_start();//Открытие сессии для сохранения categoryid
	
	$_SESSION['categoryid'] = $row['categoryid'];
	
	$title = $row['newstitle'].' | imagoz.ru';//Данные тега <title>
	$headMain = $row['newstitle'];
	$robots = 'all';
	$descr = $row['description'];
	$authorComment = '';
	
	/*Вывод видео в статью*/
	if ((isset($row['videoyoutube'])) && ($row['videoyoutube'] != ''))
	{
		$video = '<iframe width="85%" height="320px" src="'.$row['videoyoutube'].'" frameborder="0" allowfullscreen></iframe>';
	}
	
	else
	{
		$video = '';
	}
	
	/*Обновление значения счётчика*/
	
	$updateCount = 'UPDATE newsblock SET viewcount = viewcount + 1 WHERE id = ';
	
	try
	{
		$sql = $updateCount.$idNews;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	
	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка счётчика ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	/*Вывод тематик(тегов)*/
	
	/*Команда SELECT*/
	
	try
	{
		$sql = 'SELECT meta.id, metaname FROM newsblock 
				INNER JOIN metapost ON newsblock.id = idnews 
				INNER JOIN meta ON meta.id = idmeta 
				WHERE newsblock.id = '.$idNews;//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}
	
	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора тега ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
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
		
		$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));;//id автора	
	}
		
	else
	{
		$selectedAuthor = 0;//id автора
	}
	
	@session_start();//Открытие сессии для сохранения id автора
	
	$_SESSION['idauthor'] = $selectedAuthor;
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	$votedNews = (int)$_SESSION['idnews'];
	
	try
	{
		$sql = 'SELECT * FROM votedauthor WHERE idauthor = '.$selectedAuthor.' AND idnews = '.$votedNews;
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора id ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$authorID2[] =  array ('idauthor' => $row['idauthor'], 'idnews' => $row['idnews']);
	}	
		
	if(!isset ($row['idauthor']))
	{		
		$votedAuthor = '';
	}
	
	else
	{
		$votedAuthor = (int)$row['idauthor'];//id автора, который проголосовал
	}	
	
	if (!isset ($row['idnews']))//если переменная отсутствует
	{
		$votedPost = '';
	}
	
	else
	{		
		$votedPost = (int)$row['idnews'];//id статьи, за которую проголосовали
	}
	
	/*Условия вывода панели голосования*/
	if (($votedAuthor == $selectedAuthor) && ($votedNews == $_SESSION['idnews']) || (!isset($_SESSION['loggIn'])))
	{
		$votePanel = '';
	}
	
	elseif ((isset($_SESSION['loggIn'])) && ($votedAuthor != $selectedAuthor))
	{
		$votePanel = '<form action=" " metod "post" id = "confirmlike">
					  
					  Оцените статью: 
						<input type = "hidden" name = "id" value = "'.$_SESSION['idnews'].'">
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
		
		$updateVoteCount = 'UPDATE newsblock SET votecount = votecount + 1 WHERE id = '.$_SESSION['idnews'];//обновление числа проголосовавших
		$updateTotalNumber = 'UPDATE newsblock SET totalnumber = totalnumber + '.$vote.' WHERE id = '.$_SESSION['idnews'];//обновление общего числа
		$updateAverageNumber = 'UPDATE newsblock SET averagenumber = totalnumber/votecount WHERE id = '.$_SESSION['idnews'];//обновление среднего значения в БД
		$insertToVotedAuthor ='INSERT INTO votedauthor SET idpromotion = 0, idpost = 0, idnews = '.$_SESSION['idnews'].', idauthor = '.$_SESSION['idauthor'].', vote = '.$vote;//обновление таблицы проголосовавшего автора
		$SELECTCONTEST = 'SELECT conteston FROM contest WHERE id = 1';//проверка включения/выключения конкурса
							
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
			
			$sql = $updateAverageNumber;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$sql = $insertToVotedAuthor;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$sql = $SELECTCONTEST;
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
			$row = $s -> fetch();
		
			$contestOn = $row['conteston'];//проверка на включение конкурса
			
			$pdo->commit();//подтверждение транзакции			
		}
		
		catch (PDOException $e)
		{
			$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
			$headMain = 'Ошибка данных!';
			$robots = 'noindex, nofollow';
			$descr = '';
			$pdo->rollBack();//отмена транзакции
			$error = 'Error transaction 1 newsblock '.$e -> getMessage();// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();		
		}
		
		/*Добавление конкурсных очков автору*/
		
		if ($contestOn == 'YES')
		{
			/*Загрузка функций для формы входа*/
			require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
			
			if ((!userRole('Администратор')) && (!userRole('Автор')))
			{
			
				/*Возврат id автора*/

				$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора

				/*Подключение к базе данных*/
				include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

				try
				{
					$pdo->beginTransaction();//инициация транзакции

					$sql = 'SELECT votingpoints FROM contest WHERE id = 1';
					$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
					$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL

					$row = $s -> fetch();

					$votingpoints = $row['votingpoints'];//проверка на включение конкурса	

					$sql = 'UPDATE author SET contestscore = contestscore + '.$votingpoints.' WHERE id = '.$selectedAuthor;//обновление конкурсного счёта
					$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
					$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL

					$pdo->commit();//подтверждение транзакции			
				}

				catch (PDOException $e)
				{
					$pdo->rollBack();//отмена транзакции

					$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
					$headMain = 'Ошибка данных!';
					$robots = 'noindex, nofollow';
					$descr = '';
					$error = 'Error transaction при изменении конкурсного счёта '.$e -> getMessage();// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e
					include 'error.html.php';
					exit();		
				}	
			}
		}
		
		header ('Location: ../viewnews/?id='.$_SESSION['idnews']);//перенаправление обратно в контроллер index.php
		exit();
	}
	
	/*Вывод кнопок "Обновить" | "Удалить"*/
	
	if ((isset($_SESSION['loggIn'])) && (userRole('Администратор')))
	{
		$delAndUpd = "<form action = '/admin/addupdnews/' method = 'post'>
			
						Действия с материалом:
						<input type = 'hidden' name = 'id' value = '".$_SESSION['idnews']."'>
						<input type = 'submit' name = 'action' value = 'Upd' class='btn btn-primary btn-sm'>
						<input type = 'submit' name = 'action' value = 'Del' class='btn btn-primary btn-sm'>
					  </form>";
					  
		$premoderation = "<form action = '/admin/premoderation/newspremoderationstatus/' method = 'post'>
			
						Статус публикации:
						<input type = 'hidden' name = 'id' value = '".$_SESSION['idnews']."'>
						<input type = 'submit' name = 'action' value = 'Снять с публикации' class='btn btn-primary btn-sm'>
					  </form>";					  
	}
	
	else
	{
		$delAndUpd = '';
		$premoderation = '';
	}

	/*Вывод похожих материалов*/
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = 'SELECT id, newstitle, imghead, imgalt FROM newsblock WHERE idcategory = '.$_SESSION['categoryid'].' AND premoderation = "YES" ORDER BY rand() LIMIT 6';
		$result = $pdo->query($sql);
	}
	
	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка вывода заголовка похожей новости ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$similarNews[] =  array ('id' => $row['id'], 'newstitle' =>  $row['newstitle'], 'imghead' =>  $row['imghead'], 'imgalt' =>  $row['imgalt']);
	}		
	
	/*Вывод комментариев*/
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Постраничный вывод информации*/
		
	$page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;// помещаем номер страницы из массива GET в переменую $page
	$onPage = 10;// количество статей на страницу
	$shift = ($page - 1) * $onPage;// (номер страницы - 1) * статей на страницу

	try
	{
		$sql = 'SELECT comments.id, comment, commentdate, subcommentcount, authorname, avatar, author.id AS idauthor FROM comments 
		INNER JOIN author 
		ON idauthor = author.id 
		WHERE idnews = '.$idNews.' 
		ORDER BY comments.id DESC LIMIT '.$shift.' ,'.$onPage;//Вверху самое последнее значение
		$result = $pdo->query($sql);
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$comments[] =  array ('id' => $row['id'], 'text' => $row['comment'], 'date' => $row['commentdate'], 'idauthor' => $row['idauthor'], 
							  'authorname' => $row['authorname'], 'subcommentcount' => $row['subcommentcount'], 'avatar' => $row['avatar']);
	}
	
	/*Определение количества статей*/
	$sql = "SELECT count(*) AS all_articles FROM comments WHERE idnews = ".$idNews;
	$result = $pdo->query($sql);
	
	foreach ($result as $row)
	{
			$numPosts[] = array('all_articles' => $row['all_articles']);
	}
	
	$countPosts = $row["all_articles"];
	$pagesCount = ceil($countPosts / $onPage);
	
	include 'viewnews.html.php';
	exit();		
}
	
/*Добавление комментария*/
if (isset ($_GET['addcomment']))
{
	$title = 'Добавление комментария | imagoz.ru';//Данные тега <title>
	$headMain = 'Добавление комментария';
	$robots = 'noindex, follow';
	$descr = 'Форма добавления комментария';
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
		$robots = 'noindex, follow';
		$descr = '';
		$commentError = '<a href="/admin/registration/?log">Авторизируйтесь</a> в системе или 
						 <a href="/admin/registration/?reg">зарегестрируйтесь</a> для того, чтобы оставить комментарий!';//Вывод сообщения в случае невхода в систему
		
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
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Error table in mainpage' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();	
	
	$title = 'Редактирование комментария | imagoz.ru';//Данные тега <title>
	$headMain = 'Редактирование комментария';
	$robots = 'noindex, follow';
	$descr = 'Форма редактирования комментария';
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
	
	/*Загрузка функций для формы входа*/
	require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
		
	/*Возврат id автора*/
	
	$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора
	
	$SELECTCONTEST = 'SELECT conteston FROM contest WHERE id = 1';//проверка включения/выключения конкурса
		
	try
	{
		$pdo->beginTransaction();//инициация транзакции
		
		$sql = 'INSERT INTO comments SET 
			comment = :comment,	
			commentdate = SYSDATE(),
			idauthor = '.$selectedAuthor.','.
			'idnews = '.$_SESSION['idnews'];
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':comment', $_POST['comment']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		
		$sql = $SELECTCONTEST;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
		$row = $s -> fetch();
		
		$contestOn = $row['conteston'];//проверка на включение конкурса
		
		$pdo->commit();//подтверждение транзакции
	}
	
	catch (PDOException $e)
	{
		$pdo->rollBack();//отмена транзакции
		
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка добавления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	/*Если конкурс включён, происходит изменение конкурсного счёта*/
	if (($contestOn == 'YES') && (!userRole('Администратор')) && (!userRole('Автор')))
		{
			/*Подключение к базе данных*/
			include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
			
			try
			{
				$pdo->beginTransaction();//инициация транзакции

				$sql = 'SELECT commentpoints FROM contest WHERE id = 1';
				$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
				$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL

				$row = $s -> fetch();

				$commentpoints = $row['commentpoints'];//выбор значения конкурсных очков

				$sql = 'UPDATE author SET contestscore = contestscore + '.$commentpoints.' WHERE id = '.$selectedAuthor;//обновление конкурсного счёта
				$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
				$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL

				$pdo->commit();//подтверждение транзакции			
			}

			catch (PDOException $e)
			{
				$pdo->rollBack();//отмена транзакции

				$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
				$headMain = 'Ошибка данных!';
				$robots = 'noindex, nofollow';
				$descr = '';
				$error = 'Error transaction при изменении конкурсного счёта '.$e -> getMessage();// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e
				include 'error.html.php';
				exit();		
			}		
		}
	
	header ('Location: ../viewnews/?id='.$_SESSION['idnews']);//перенаправление обратно в контроллер index.php
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
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка обновления информации comment'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	header ('Location: ../viewnews/?id='.$_SESSION['idnews']);//перенаправление обратно в контроллер index.php
	exit();
}

/*DELETE - удаление комментария*/

if (isset ($_POST['action']) && $_POST['action'] == 'Del')	
{	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Команда SELECT*/
	try
	{
		$sql = 'SELECT id FROM comments WHERE id = :idcomment';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcomment', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}

	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка выбора id и заголовка newsblock : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s -> fetch();
	
	$title = 'Удаление комментария';//Данные тега <title>
	$headMain = 'Удаление комментария';
	$robots = 'noindex, follow';
	$descr = '';
	$action = 'delete';
	$posttitle = 'Комментарий';
	$id = $row['id'];
	$button = 'Удалить';
	
	include 'delete.html.php';
}
	
if (isset ($_GET['delete']))
{
	$SELECTCONTEST = 'SELECT conteston FROM contest WHERE id = 1';//проверка включения/выключения конкурса
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Удаление комментариев*/
	try
	{
		$pdo->beginTransaction();//инициация транзакции
		
		$sql = 'DELETE FROM comments WHERE id = :idcomment';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcomment', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		
		$sql = $SELECTCONTEST;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			
		$row = $s -> fetch();
		
		$contestOn = $row['conteston'];//проверка на включение конкурса
		
		$pdo->commit();//подтверждение транзакции	
	}
	
	catch (PDOException $e)
	{
		$pdo->rollBack();//отмена транзакции
		
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка удаления информации '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	/*Если конкурс включён, происходит изменение конкурсного счёта*/
	if ($contestOn == 'YES')
	{
		/*Загрузка функций для формы входа*/
		require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
			
		/*Возврат id автора*/
	
		$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора
			
		/*Подключение к базе данных*/
		include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
			
		try
		{
			$pdo->beginTransaction();//инициация транзакции

			$sql = 'SELECT commentpoints FROM contest WHERE id = 1';
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL

			$row = $s -> fetch();

			$commentpoints = $row['commentpoints'];//выбор значения конкурсных очков

			$sql = 'UPDATE author SET contestscore = contestscore - '.$commentpoints.' WHERE id = '.$selectedAuthor;//обновление конкурсного счёта
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL

			$pdo->commit();//подтверждение транзакции			
		}

		catch (PDOException $e)
		{
			$pdo->rollBack();//отмена транзакции

			$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
			$headMain = 'Ошибка данных!';
			$robots = 'noindex, nofollow';
			$descr = '';
			$error = 'Error transaction при изменении конкурсного счёта '.$e -> getMessage();// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e;// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();		
		}		
	}
	
	/*Удаление ответов*/
	try
	{
		$sql = 'DELETE FROM subcomments WHERE idcomment = :idcomment' ;
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':idcomment', $_POST['id']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	
	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка удаления ответов '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	header ('Location: ../viewnews/?id='.$_SESSION['idnews']);//перенаправление обратно в контроллер index.php
	exit();
}	
	
