<!DOCKTYPE html>
<html>
<head> 
	<title><?php echo $title; ?> </title> 
	<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/styles.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/css/bootstrap.css';?>" rel= "stylesheet" type="text/css">
	<link rel= "stylesheet" type="text/css" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/pagedown-master/demo/browser/demo.css';?>" >
	
	<script type="text/javascript" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/pagedown-master/Markdown.Converter.js';?>"></script>
	<script type="text/javascript" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/pagedown-master/Markdown.Sanitizer.js';?>"></script>
	<script type="text/javascript" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/pagedown-master/Markdown.Editor.js';?>"></script>
	
	<script>
	(function() {
		var converter = new Markdown.Converter();
		var editor = new Markdown.Editor(converter);
		editor.run();
	} ());
	</script>
	
	<meta charset = "utf-8">
</head>
<body>
	<div><h1>ImagozCMS - твой интуитивный контент!</h1>
	<div>
	  <?php 
		/*Загрузка функций в шаблон*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';
		/*Загрузка меню авторизации*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/imagozcms/admin/logpanel.html.inc.php';
		echo $logPanel; ?>
	</div>	
	<div>
		<nav class="navbar navbar-expand-lg navbar-info bg-warning">
		 <div class="collapse navbar-collapse" id="navbar1">
			<ul class="navbar-nav mr-auto">
		     <li class="nav-item active">
        	  <a class="nav-link" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/';?>">Главная страница <span class="sr-only">(current)</span></a>
      	     </li>
			 <li class="nav-item">
		      <a class="nav-link" href="/imagozcms/admin/">Панель администрирования</a>
		     </li>
		 </div>
		</nav>
	</div>
	<h1><?php echo $headMain; ?> </h1>