<?php
/*Загрузка главного пути*/
include_once '../../includes/path.inc.php';

/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка функций для формы входа*/
require_once MAIN_FILE . '/includes/access.inc.php';

if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

$selectedAuthor = (int)(authorID($_SESSION['email'], $_SESSION['password']));//id автора

$title = 'Настройка аккаунта';//Данные тега <title>
$headMain = 'Настройка аккаунта';
$robots = 'noindex, follow';
$descr = '';

include 'setaccount.html.php';
exit();