<?php

/*Вывод текста о сотрудничестве*/

$title = 'Меню супер-автора | imagoz.ru';//Данные тега <title>
$headMain = 'Меню супер-автора';
$robots = 'noindex, nofollow';
$descr = '';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
	
if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Загрузка сообщения об ошибке входа*/
if ((!userRole('Администратор')) && (!userRole('Супер-автор')))
{
	$title = 'Ошибка доступа';//Данные тега <title>
	$headMain = 'Ошибка доступа';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Доступ запрещен';
	include '../accessfail.html.php';
	exit();
}

/*Текст о сотрудничестве*/

$superUserPanel = "<p align='center'><a href='/admin/addupdpost/?add' class='btn btn-primary btn-sm'>Добавить статью</a> | 
	<a href='/admin/addupdnews/?add' class='btn btn-primary btn-sm'>Добавить новость</a>";
	
include 'superuserpanel.html.php';
exit();	