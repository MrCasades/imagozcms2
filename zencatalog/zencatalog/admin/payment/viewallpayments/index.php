<?php
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if (loggedIn())
{
	/*Если loggedIn = TRUE, выводится имя пользователя иначе меню авторизации*/
}

/*Вывод платёжных реквизитов для администратора*/

/*Подключение к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

/*Команда SELECT*/
try
{
	$sql = 'SELECT payments.id AS paymentsid, authorname, payment, email, ewallet, paysystemname, creationdate FROM payments
			INNER JOIN author ON payments.idauthor = author.id
			INNER JOIN paysystem ON payments.idpaysystem = paysystem.id 
			WHERE paymentstatus = "NO"';
	$result = $pdo->query($sql);
}

catch (PDOException $e)
{
	$title = 'ImagozCMS | Ошибка данных!';//Данные тега <title>
	$headMain = 'Ошибка данных!';
	$robots = 'noindex, nofollow';
	$descr = '';
	$error = 'Ошибка выбора информации для вывода заявок на платёж : ' . $e -> getMessage();// вывод сообщения об ошибке в переменой $e
	include 'error.html.php';
	exit();
}

foreach ($result as $row)
{
	$payments[] = array('id' => $row['paymentsid'],'authorname' => $row['authorname'], 'payment' => $row['payment'], 'email' => $row['email'],
						'ewallet' => $row['ewallet'], 'paysystemname' => $row['paysystemname'], 'creationdate' => $row['creationdate']);
}

$title = 'Список заявок на выплату';//Данные тега <title>
$headMain = 'Список заявок на выплату';
$robots = 'noindex, nofollow';
$descr = '';

include 'viewallpayments.html.php';
exit();
