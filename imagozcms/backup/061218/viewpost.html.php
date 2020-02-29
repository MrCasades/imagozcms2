<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">  
		<h5 align = "center">Последние статьи</h5>
		 <?php foreach ($posts as $post): ?> 
		  
			<div>
				<h3><?php echo ($post['posttitle']. 'Post #'.$post['id']); ?></h3>
					<?php echo $post['text']; ?>
				
			</div>	   	
		 <?php endforeach; ?> 
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>