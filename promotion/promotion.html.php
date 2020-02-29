<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont_for_view"> 
			<div align = "center"><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
			<script src="//yastatic.net/share2/share.js"></script>
			<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></div>
			
		<div class = "post">
		 <p align="center"><img width = "20%" height = "20%" src="<?php echo '//'.$_SERVER['SERVER_NAME'];?>/logomain.jpg" alt="imagoz.ru | Сотрудничество"></p>
		  <div align="justify">
		   <?php echo $forPromotions; ?>
		  </div>
		</div>	
	</div>		
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>	