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
		 <?php foreach ($categorys_1 as $category_1): ?> 
		  
			<div>
				<fieldset><legend><h3><?php echo ($category_1['posttitle']. 'Post #'.$category_1['id']); ?></h3></legend>
					<p><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($category_1['text'])), 0, 10))); ?> [...]</p>
					<a href="/imagozcms/viewpost/?id=<?php echo $category_1['id']; ?>" class="btn btn-primary">Read More</a>
				</fieldset>
			</div>	   	
		 <?php endforeach; ?> 
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>