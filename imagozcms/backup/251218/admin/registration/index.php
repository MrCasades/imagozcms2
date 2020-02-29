<?php

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Авторизация в системе*/
if (isset($_GET['log']))
{
	$title = 'Вход в систему';//Данные тега <title>
	$headMain = 'Вход';
	
	if (!loggedIn())
	{
		include $_SERVER['DOCUMENT_ROOT'].'/imagozcms/admin/login.html.php';
		exit();
	}	
	
	elseif ($_SESSION['loggIn'] = TRUE)
	{
		$loggood = 'Вы успешно вошли в систему!';
		include $_SERVER['DOCUMENT_ROOT'].'/imagozcms/admin/accessgood.html.php';
		exit();
	}
}

/*Регистрация в системе*/
if (isset($_GET['reg']))
{	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	$title = 'Регистрация нового пользователя';//Данные тега <title>
	$headMain = 'Регистрация';
	$action = 'addform';
	$authorname = '';
	$email = '';
	$www = '';
	$idauthor = '';
	$password = '';
	$password2 = '';
	$button = 'Регистрация';
	$errLog = '';
	
	/*Формирование списка ролей*/
	
	try
	{
		$result = $pdo->query('SELECT id, descr FROM role');
	}
	
	catch (PDOException $e)
	{
		$error = 'Ошибка формирования списка ролей '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$roles[] = array('id' => $row['id'], 'descr' => $row['descr']);
	}
	
		
	include $_SERVER['DOCUMENT_ROOT'].'/imagozcms/admin/registration/registration.html.php';
	exit();
}

if (isset ($_GET['addform']))
{
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Вывод сообщения об ошибке, если не заполнены поля email или "Пароль"*/
	if (($_POST['email'] == '') || ($_POST['password'] == ''))
	{
		$title = 'Регистрация нового пользователя';//Данные тега <title>
		$headMain = 'Регистрация';
		$action = 'addform';
		$authorname = '';
		$email = '';
		$www = '';
		$idauthor = '';
		$password = '';
		$password2 = '';
		$button = 'Регистрация';
		$errLog = 'Заполните все обязательные поля';
		
		include $_SERVER['DOCUMENT_ROOT'].'/imagozcms/admin/registration/registration.html.php';
		exit();
	}
	
	/*Вывод сообщения об ошибке, введённые пароли не совпадают*/
	if ($_POST['password'] != $_POST['password2'])
	{
		$title = 'Регистрация нового пользователя';//Данные тега <title>
		$headMain = 'Регистрация';
		$action = 'addform';
		$authorname = '';
		$email = '';
		$www = '';
		$idauthor = '';
		$password = '';
		$password2 = '';
		$button = 'Регистрация';
		$errLog = 'Пароли должны совпадать!';
		
		include $_SERVER['DOCUMENT_ROOT'].'/imagozcms/admin/registration/registration.html.php';
		exit();
	}
	
	try
	{
		$sql = 'INSERT INTO author SET authorname = :authorname, email = :email, www = :www, regdate = SYSDATE()';// псевдопеременная получающая значение из формы
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':authorname', $_POST['authorname']);//отправка значения
		$s -> bindValue(':email', $_POST['email']);//отправка значения
		$s -> bindValue(':www', $_POST['www']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	catch (PDOException $e)
	{
		$error = 'Ошибка добавления информации автора'. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$authorid = $pdo -> lastInsertid();//значение последнего автоинкрементного поля
	
	if ($_POST['password'] != '')
	{
		$password = md5($_POST['password'] . 'fgtn');
		
		try
		{
			$sql = 'UPDATE author SET password = :password WHERE id = :id';
			$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
			$s -> bindValue(':password', $password);//отправка значения
			$s -> bindValue(':id', $authorid);//отправка значения
			$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
		}
		catch (PDOException $e)
		{
			$error = 'Ошибка назначения пароля '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
			include 'error.html.php';
			exit();
		}			
	}
	
	if(isset ($_POST['roles']))
	{
		foreach ($_POST['roles'] as $role)
		{
			
			try
			{
				$sql = 'INSERT INTO authorrole SET idauthor = :idauthor, idrole = "Автор"';// псевдопеременная получающая значение из формы
				$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
				$s -> bindValue(':idauthor', $authorid);//отправка значения
				$s -> bindValue('Автор', $role);//отправка значения
				$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
			}
			catch (PDOException $e)
			{
				$error = 'Ошибка назначения роли '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
				include 'error.html.php';
				exit();
			}	
		}
	}
	
	$title = 'Регистрация прошла успешно';//Данные тега <title>
	$headMain = 'Поздравляем, Вы успешно зарегестрировались в системе!';
	$loggood = 'Вы успешно зарегестрировались!';
	include $_SERVER['DOCUMENT_ROOT'].'/imagozcms/admin/accessgood.html.php';
	exit();
}	