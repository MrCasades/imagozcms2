<?php

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*КЛЮЧИ*/
define('SITE_KEY', '6Le8cswUAAAAANIKzxmwHehiR6-jKRJnUeqw5JRB');
define('SECRET_KEY', '6Le8cswUAAAAAG6x81r5pO1YpMwyqktm9m5clOgv');

/*Авторизация в системе*/
if (isset($_GET['log']))
{
	$title = 'Вход в систему';//Данные тега <title>
	$headMain = 'Вход в систему';
	$robots = 'noindex, nofollow';
	$descr = 'Авторизация пользователя в системе';
	
	/*Ошибки авторизации*/
	$GLOBALS['loginError'] = '';
	$errLogin = '';
	
	if (!loggedIn())
	{
		$errLogin = $GLOBALS['loginError'];
		include $_SERVER['DOCUMENT_ROOT'].'/admin/login.html.php';
		exit();
	}	
	
	elseif ($_SESSION['loggIn'] = TRUE)
	{
		$loggood = 'Вы успешно вошли в систему!';
		include $_SERVER['DOCUMENT_ROOT'].'/admin/accessgood.html.php';
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
	$robots = 'noindex, nofollow';
	$descr = 'Регистрация нового пользователя в системе';
	$action = 'addform';
	$authorname = '';
	$email = '';
	$www = '';
	$idauthor = '';
	$password = '';
	$password2 = '';
	$accountinfo = '';
	$button = 'Регистрация';
	$errLog = '';
	$scriptJScode = '<script src="script.js"></script>
					 <script src="/js/jquery-1.min.js"></script>
					 <script src="/js/bootstrap-markdown.js"></script>
					 <script src="/js/bootstrap.min.js"></script>';//добавить код JS
	
	/*Формирование списка ролей*/
	
	try
	{
		$result = $pdo->query('SELECT id, descr FROM role');
	}
	
	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка формирования списка ролей '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	foreach ($result as $row)
	{
		$roles[] = array('id' => $row['id'], 'descr' => $row['descr']);
	}
	
		
	include $_SERVER['DOCUMENT_ROOT'].'/admin/registration/registration.html.php';
	exit();
}

if (isset ($_GET['addform']))
{
	
	/*Загрузка функций в шаблон*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';
	
	/*Подключение к базе данных*/
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	/*Проверка на дубль E-mail*/
	try
	{
		$sql = 'SELECT email FROM author
				WHERE email = :email';
		$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
		$s -> bindValue(':email', $_POST['email']);//отправка значения
		$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
	}
	
	catch (PDOException $e)
	{
		$error = 'Ошибка поиска автора: ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}
	
	$row = $s-> fetch();
	
	$email = $row['email'];
		
	/*Вывод сообщения об ошибке при дубле email*/	
	if ($email != '')	
	{
			$title = 'Такой пользователь уже зарегестрирован в системе!';//Данные тега <title>
			$headMain = 'Такой пользователь уже зарегестрирован в системе!';
			$robots = 'noindex, nofollow';
			$descr = '';
			$error = 'Пользователь с таким адресом электронной почты уже зарегестрирован в системе. Если Вы забыли свой пароль, воспользуйтесь <a href = "/admin/recoverpassword/?send">функцией восстановления</a>!';
			include 'error.html.php';
			exit();
	}
	
	/*Вывод сообщения об ошибке, если не заполнены поля email или "Пароль"*/
	if (($_POST['email'] == '') || ($_POST['password'] == '') || ($_POST['authorname'] == ''))
	{
		$title = 'Регистрация нового пользователя';//Данные тега <title>
		$headMain = 'Регистрация';
		$robots = 'noindex, nofollow';
		$descr = 'Регистрация нового пользователя в системе';
		$action = 'addform';
		$authorname = '';
		$email = '';
		$www = '';
		$accountinfo = '';
		$idauthor = '';
		$password = '';
		$password2 = '';
		$button = 'Регистрация';
		$errLog = 'Заполните все обязательные поля';
		$scriptJScode = '<script src="script.js"></script>
						 <script src="/js/jquery-1.min.js"></script>
						 <script src="/js/bootstrap-markdown.js"></script>
						 <script src="/js/bootstrap.min.js"></script>';//добавить код JS
		
		include $_SERVER['DOCUMENT_ROOT'].'/admin/registration/registration.html.php';
		exit();
	}
	
	/*Вывод сообщения об ошибке, введённые пароли не совпадают*/
	if ($_POST['password'] != $_POST['password2'])
	{
		$title = 'Регистрация нового пользователя';//Данные тега <title>
		$headMain = 'Регистрация';
		$robots = 'noindex, nofollow';
		$descr = 'Регистрация нового пользователя в системе';
		$action = 'addform';
		$authorname = '';
		$email = '';
		$www = '';
		$accountinfo = '';
		$password = '';
		$password2 = '';
		$button = 'Регистрация';
		$errLog = 'Пароли должны совпадать!';
		$scriptJScode = '<script src="script.js"></script>
						 <script src="/js/jquery-1.min.js"></script>
						 <script src="/js/bootstrap-markdown.js"></script>
						 <script src="/js/bootstrap.min.js"></script>';//добавить код JS
		
		include $_SERVER['DOCUMENT_ROOT'].'/admin/registration/registration.html.php';
		exit();
	}
	
	/*google capcha*/
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
  		$recaptcha=$_POST['g-recaptcha-response'];
		
    	if(!empty($recaptcha))
		{

			$google_url="https://www.google.com/recaptcha/api/siteverify";
			//$secret='6Le8cswUAAAAANIKzxmwHehiR6-jKRJnUeqw5JRB';
			$ip=$_SERVER['REMOTE_ADDR'];
			$url=$google_url."?secret=".SECRET_KEY."&response=".$recaptcha."&remoteip=".$ip;
			$res=SiteVerify($url);
			$res= json_decode($res, true);
			
			if($res['success'])
        	{
				try
				{
					$sql = 'INSERT INTO author SET authorname = :authorname, email = :email, www = :www, accountinfo = :accountinfo, regdate = SYSDATE()';// псевдопеременная получающая значение из формы
					$s = $pdo->prepare($sql);// подготавливает запрос для отправки в бд и возвр объект запроса присвоенный переменной
					$s -> bindValue(':authorname', $_POST['authorname']);//отправка значения
					$s -> bindValue(':email', $_POST['email']);//отправка значения
					$s -> bindValue(':www', $_POST['www']);//отправка значения
					$s -> bindValue(':accountinfo', $_POST['accountinfo']);//отправка значения
					$s -> execute();// метод дает инструкцию PDO отправить запрос MySQL
				}
				catch (PDOException $e)
				{
					$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
					$headMain = 'Ошибка данных!';
					$robots = 'noindex, nofollow';
					$descr = '';
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
						$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
						$headMain = 'Ошибка данных!';
						$robots = 'noindex, nofollow';
						$descr = '';
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
							$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
							$headMain = 'Ошибка данных!';
							$robots = 'noindex, nofollow';
							$descr = '';
							$error = 'Ошибка назначения роли '. ' Error: '. $e -> getMessage();// вывод сообщения об ошибке в переменой $e
							include 'error.html.php';
							exit();
						}	
					}
				}

				$title = 'Регистрация прошла успешно';//Данные тега <title>
				$headMain = 'Поздравляем, Вы успешно зарегестрировались в системе!';
				$robots = 'noindex, nofollow';
				$descr = 'Сообщение об успешной регистрации нового пользователя';
				$loggood = 'Вы успешно зарегестрировались!';
				include $_SERVER['DOCUMENT_ROOT'].'/admin/accessgood.html.php';
				exit();
				
			}
			
			else
			{
				$title = 'Регистрация нового пользователя';//Данные тега <title>
				$headMain = 'Регистрация';
				$robots = 'noindex, nofollow';
				$descr = 'Регистрация нового пользователя в системе';
				$action = 'addform';
				$authorname = '';
				$email = '';
				$www = '';
				$accountinfo = '';
				$password = '';
				$password2 = '';
				$button = 'Регистрация';
				$errLog = 'Проверка не пройдена';
				$scriptJScode = '<script src="script.js"></script>
					 			 <script src="/js/jquery-1.min.js"></script>
					 			 <script src="/js/bootstrap-markdown.js"></script>
								 <script src="/js/bootstrap.min.js"></script>';//добавить код JS

				include $_SERVER['DOCUMENT_ROOT'].'/admin/registration/registration.html.php';
				exit();
			}
		}
		
		else
		{
			$title = 'Регистрация нового пользователя';//Данные тега <title>
			$headMain = 'Регистрация';
			$robots = 'noindex, nofollow';
			$descr = 'Регистрация нового пользователя в системе';
			$action = 'addform';
			$authorname = '';
			$email = '';
			$www = '';
			$accountinfo = '';
			$password = '';
			$password2 = '';
			$button = 'Регистрация';
			$errLog = 'Проверка не пройдена';
			$scriptJScode = '<script src="script.js"></script>
							 <script src="/js/jquery-1.min.js"></script>
							 <script src="/js/bootstrap-markdown.js"></script>
					 		 <script src="/js/bootstrap.min.js"></script>';//добавить код JS

			include $_SERVER['DOCUMENT_ROOT'].'/admin/registration/registration.html.php';
			exit();
		}
	}
}	