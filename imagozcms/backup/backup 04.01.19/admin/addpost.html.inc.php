<?php 

/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка кнопки добавления статьи*/
if (!isset($_SESSION['loggIn']) || (!userRole('Администратор')) && (!userRole('Автор')))//Если не выполнен вход в систему или роль не администратор
{
	$addPost = '';
}

elseif (userRole('Администратор'))
{
	$addPost = "<a href='/imagozcms/admin/addupdpost/?add' class='btn btn-primary btn-sm'>Добавить статью</a> | <a href='/imagozcms/admin/' class='btn btn-primary btn-sm'>Редактирование списков</a>";
}

elseif (userRole('Администратор') || userRole('Автор'))
{
	$addPost = "<a href='/imagozcms/admin/addupdpost/?add' class='btn btn-primary btn-sm'>Добавить статью</a>";
}
