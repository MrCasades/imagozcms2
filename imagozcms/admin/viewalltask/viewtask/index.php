<?php

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Определение нахождения пользователя в системе*/
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
if ((!userRole('Администратор')) && (!userRole('Автор')))
{
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Доступ запрещен';
	include '../accessfail.html.php';
	exit();
}

/*Загрузка содержимого статьи*/
if (isset ($_GET['id']))
{
	$idTask = $_GET['id'];
	
	@session_start();//Открытие сессии для сохранения id статьи
	
	$_SESSION['idtask'] = $idTask;
	$select = 'SELECT task.id AS taskid, description, author.id AS authorid, tasktitle, taskdate, authorname, tasktype.id AS tasktypeid, tasktypename FROM task 
			   INNER JOIN author ON idcreator = author.id 
			   INNER JOIN tasktype ON idtasktype = tasktype.id  
			   WHERE taskstatus = "NO" AND task.id = ';

	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	
	try
	{
		$sql = $select.$idTask;
		$result = $pdo->query($sql);
	}
	
	catch (PDOException $e)
	{
		$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
		$headMain = 'Ошибка данных!';
		$robots = 'noindex, nofollow';
		$descr = '';
		$error = 'Ошибка вывода содержимого задания ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
		include 'error.html.php';
		exit();
	}

	/*Вывод результата в шаблон*/
	foreach ($result as $row)
	{
		$tasks[] =  array ('id' => $row['taskid'], 'idauthor' => $row['authorid'], 'text' => $row['description'], 'tasktitle' =>  $row['tasktitle'],
							'taskdate' =>  $row['taskdate'], 'authorname' =>  $row['authorname'], 
							'tasktypename' =>  $row['tasktypename'], 'tasktypeid' => $row['tasktypeid']);
	}	

	$title = 'Техническое задание #'.$row['taskid'].' "'.$row['tasktitle'].'"' ;//Данные тега <title>
	$headMain = 'Техническое задание #'.$row['taskid'].' "'.$row['tasktitle'].'"' ;	
	$robots = 'noindex, nofollow';
	$descr = '';
	
	/*Вывод кнопок "Обновить" | "Удалить" | "Опубликовать"*/
	
	if ((isset($_SESSION['loggIn'])) && (userRole('Администратор')))
	{
		$delAndUpd = "<form action = '/admin/addtask/' method = 'post'>
			
						Действия с материалом:
						<input type = 'hidden' name = 'id' value = '".$_SESSION['idtask']."'>
						<input type = 'submit' name = 'action' value = 'Upd' class='btn btn-primary btn-sm'>
						<input type = 'submit' name = 'action' value = 'Del' class='btn btn-primary btn-sm'>
					  </form>";
	}	
	
	else
	{
		$delAndUpd = '';
	}
	
	if ((userRole('Автор')) || (userRole('Администратор')))
	{
		$changeTaskStatus = "<form action = '/admin/viewalltask/viewtask/taskstatus/' method = 'post'>
								<input type = 'hidden' name = 'id' value = '".$_SESSION['idtask']."'>
								<input type = 'submit' name = 'action' value = 'Взять задание' class='btn btn-primary btn-sm'>
					 		 </form>";			  
	}
	
	include 'task.html.php';
}
