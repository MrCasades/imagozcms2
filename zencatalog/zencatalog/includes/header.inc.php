<!DOCTYPE html> 
<html>
<head> 
	<title><?php echo $title; ?> </title> 
	<link href="<?php echo '//'.$_SERVER['SERVER_NAME'].'/styles.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo '//'.$_SERVER['SERVER_NAME'].'/css/bootstrap.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo '//'.$_SERVER['SERVER_NAME'].'/favicon.ico';?>" rel="icon" type="image/x-icon">	
	
	<meta charset = "utf-8"/>
	<meta name="robots" content="<?php echo $robots; ?>"/>
	<meta name="Description" content= "<?php echo $descr; ?>"/>
	<meta name="viewport" content="width=device-width"/>

	
</head>
<body>
	<div class="forlogo" align = "center"><a href="<?php echo '//'.$_SERVER['SERVER_NAME'];?>"><img width = "20%" height = "20%" src="<?php echo '//'.$_SERVER['SERVER_NAME'];?>/logomain.jpg" alt="imagoz.ru | Hi-Tech, игры, интернет в отражении"></a>
						<img width = "75%" height = "20%" src="<?php echo '//'.$_SERVER['SERVER_NAME'];?>/LOGO2.jpg" alt="Мир высоких технологий, интернета, игр в отражении"></div>
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
		    
		    echo '<div align = "center"><p>'.$logPanel.'</p></div>';
			echo'<p  align = "center">'.$firstTags;
			 echomarkdown(implode(' ', array_slice(explode(' ', strip_tags($messageText)), 0, 50)));
			echo $lastTags.'</p>';
			echo'<p  align = "center">'.$addPost.'</p>';
			echo'<p  align = "center"> <strong>'.$scoreTitle.'</strong>'.$payForms.'</p>';
			echo'<p  align = "center">'.$forAuthors.'</p>';?>
		
	</div>
	<div>
		    <!-- Yandex.RTB R-A-448222-6 -->
<div id="yandex_rtb_R-A-448222-6"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-448222-6",
                renderTo: "yandex_rtb_R-A-448222-6",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
		</div>    
	<?php 
		/*Загрузка списка рубрик*/
		include_once $_SERVER['DOCUMENT_ROOT'] . '/mainmenu/mainmenu.inc.php'; ?>
		
	<h1><?php htmlecho ($headMain); ?> </h1>