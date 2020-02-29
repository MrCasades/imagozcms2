<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
<?php 
	/*Загрузка списка рубрик*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/imagozcms/categorypanel/categorypanel.inc.php'; ?>
	
	<div class = "maincont">  
		<h5 align = "center">Последние статьи</h5>
		 <?php foreach ($metas_1 as $meta_1): ?> 
		  
			<div>
				<fieldset><legend><h3><?php echo ($meta_1['posttitle']. 'Post #'.$meta_1['id']); ?></h3></legend>
					<p><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($meta_1['text'])), 0, 10))); ?> [...]</p>
					<a href="/imagozcms/viewpost/?id=<?php echo $meta_1['id']; ?>" class="btn btn-primary">Read More</a>
				</fieldset>
			</div>	   	
		 <?php endforeach; ?> 
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>