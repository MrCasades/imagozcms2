<!DOCTYPE html> 
<html>
<head> 
	<title><?php echo $title; ?> </title> 
	<link href="<?php echo '//'.MAIN_URL.'/styles.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo '//'.MAIN_URL.'/css/mybootstap.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo '//'.MAIN_URL.'/css/bootstrap-markdown.min.css';?>" rel= "stylesheet" type="text/css">
	<link href="<?php echo '//'.MAIN_URL.'/favicon.ico';?>" rel="icon" type="image/x-icon">
	
	<?php 
        //канонический адрес
        echo $canonicalURL = $canonicalURL ?? '';?>
	
	<meta charset = "utf-8"/>
	<meta name="robots" content="<?php echo $robots; ?>"/>
	<meta name="Description" content= "<?php echo $descr; ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="yandex-verification" content="b1b036a76e433a2f" />
	<meta name="msvalidate.01" content="B52E69B4EFB1372BDECC826BB005BFC2" />
	<meta name="11e66bf0747b49e92165b564157d94b9" content="">
	<meta name="pmail-verification" content="ddfba33030d7dda60e94c41aadfd4340">
	
	<?php 
		//для reCapcha
        echo $reCapchaAPI = $reCapchaAPI ?? '';
        //Микроразметка
        echo $jQuery = $jQuery ?? '';
		//Микроразметка
        echo $dataMarkup = $dataMarkup ?? '';
		//Дополнительный код
        echo $otherCode = $otherCode ?? '';?>
	
</head>
<body>
    
	<div class="forlogo" align = "center"><a href="<?php echo '//'.MAIN_URL;?>"><img width = "15%" height = "15%" src="<?php echo '//'.MAIN_URL;?>/logomain.jpg" alt="imagoz.ru | Hi-Tech, игры, интернет в отражении"></a>
						<img width = "80%" height = "15%" src="<?php echo '//'.MAIN_URL;?>/LOGO2.jpg" alt="Мир высоких технологий, интернета, игр в отражении"></div>
	<div>
	   
		<?php 
		/*Загрузка меню авторизации*/
		include_once MAIN_FILE . '/admin/logpanel.html.inc.php';?>
		
		<?php 
		/*Загрузка кнопки добавления статьи*/
		include_once MAIN_FILE . '/admin/addpost.html.inc.php';
		    
		    echo '<div align = "center"><p>'.$logPanel.'</p></div>';
			echo '<div align = "center"><p>'.$superUser.'</p></div>';
			echo'<p  align = "center">'.$addPost.'</p>';
			echo'<p  align = "center"> <strong>'.$scoreTitle.'</strong>'.$payForms.'</p>';
			echo'<p  align = "center">'.$forAuthors.'</p>';?>
		
	</div>
	
	<script>
			 //Цвет непрочитанных сообщений
			
			countsViewAndColor("#countcolor", "red");
		
			function countsViewAndColor(idcount, color) 
			{
				const countMess = document.querySelector(idcount); 
				const countVal = countMess.innerHTML;
				
				if (parseInt(countVal) > 0)
				{
				   countMess.style.color = (color);
				   countMess.innerHTML = "["+countVal+"]";
				} 

				else if (parseInt(countVal) === 0) 
				{
				   countMess.innerHTML = "";
				}
			}
    </script>
	
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
		
		<hr/>
		
	<?php 
		/*Загрузка списка рубрик*/
		include_once MAIN_FILE . '/mainmenu/mainmenu.inc.php'; ?>
		
	<h1><?php htmlecho ($headMain); ?> </h1>
		
	
	