<!DOCTYPE html> 
<html>
<head> 
	<title><?php echo $title; ?> </title> 
	<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/styles.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/css/bootstrap.css';?>" rel= "stylesheet" type="text/css">	
	
	<meta charset = "utf-8"/>
	<meta name="robots" content="<?php echo $robots; ?>"/>
	<meta name="Description" content= "<?php echo $descr; ?>"/>
	
</head>
<body>
	<div class="forlogo"><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>"><img width = "20%" height = "20%" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>/logomain.jpg" alt="imagoz.ru | Hi-Tech, игры, интернет в отражении"></a>
						<img width = "70%" height = "20%" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>/LOGO2.jpg" alt="Мир высоких технологий, интернета, игр в отражении"></div>
	<div>
	  <?php 
		/*Загрузка функций в шаблон*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';?> 
		
		<?php 
		/*Загрузка меню авторизации*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/logpanel.html.inc.php';?>
		
		<?php 
		/*Загрузка кнопки добавления статьи*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/addpost.html.inc.php';
		echo '<div align = "center"><p>'.$logPanel.'</p></div>'.'<p  align = "center">'.$addPost.'</p>';?> 
		
	</div>	
	<div class="forlogo">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		 <div class="collapse navbar-collapse" id="navbar1">
			<ul class="navbar-nav mr-auto">
		     <li class="nav-item active">
        	  <a class="nav-link" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>">Главная страница <span class="sr-only">(current)</span></a>
      	     </li>
			 <li class="nav-item active">
		      <a class="nav-link" href="/searchpost/">Поиск</a>
		     </li>
			 <li class="nav-item active">
		      <a class="nav-link" href="/admin/">Панель администрирования</a>
		     </li>
		 </div>
		</nav>
	</div>
	<h1><?php htmlecho ($headMain); ?> </h1>