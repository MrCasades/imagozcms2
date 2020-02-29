<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">  
		<h5 align = "center">Последние статьи</h5>
		 <?php foreach ($posts as $post): ?> 
		  
			<div>
				<fieldset><h3><?php echo ($post['posttitle']. 'Post #'.$post['id']); ?></h3>
					<p><?php echo implode(' ', array_slice(explode(' ', strip_tags($post['text'])), 0, 10)); ?> [...]</p>
					<a href="viewpost.html.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read More</a>
				</fieldset>
			</div>	   	
		 <?php endforeach; ?> 
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

