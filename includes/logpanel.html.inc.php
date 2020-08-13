<?php 
/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if (if (!loggedIn())
{
	include 'logpanel_1.inc.php';
	exit();
}