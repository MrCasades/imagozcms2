<?php 
/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка header*/
include_once MAIN_FILE . '/header.inc.php';?>

	<div class = "maincont_for_view"> 
		
		<p align="center"><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></p>	
	<h4>Настройка аватара</h4>
	<hr/>
	<div>
	 <form action = "?" method = "post">
		<div>
		 <input type = "hidden" name = "id" value = "<?php echo $selectedAuthor;?>'">
		 <input type = "submit" name = "action" class="btn btn-primary btn-sm" value = "Обновить аватар">
		 <input type = "submit" name = "action" class="btn btn-primary btn-sm" value = "Удалить аватар">
		</div>
	 </form>
			
			
	</div>		
	


<?php 
/*Загрузка footer*/
include_once MAIN_FILE . '/footer.inc.php';?>