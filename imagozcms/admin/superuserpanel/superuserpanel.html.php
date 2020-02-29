<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont">  
		<div class = "post" align="center">
			<p>Режим супер-автора позволяет раз в двое суток делать свободные публикации (в рамках тематики портала) без необходимости предварительно брать задание. Тариф обычный для статей и новостей. 
			Согласуйте тему и приблизительный объём с администратором в личном сообщении или через форму <strong><a href = '/admin/adminmail/?addmessage#bottom'>обратной связи</a></strong>.</p>
		 <?php echo $superUserPanel; ?> 
		</div>
		<div align="center"><a href="#" onclick="history.back();" class="btn btn-primary btn-sm">Назад</a></div>
	</div>	

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>