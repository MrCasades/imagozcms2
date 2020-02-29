<?php
$title = 'Список рубрик';//Данные тега <title>
$headMain = 'Рубрики в базе данных';?>

<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php'?>

<?php
/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

<div class = "maincont">
<p><?php 
  $description = $_GET['description'];
  echomarkdown ($description);?> </p>
</div>
</body>
</html>