<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<?php 
	/*Загрузка списка рубрик*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/imagozcms/categorypanel/categorypanel.inc.php'; ?>
		
	<h1>Результаты поиска</h1>
	<div class = "maincont">
	<?php if (isset ($posts)):?>
		
		 <?php foreach ($posts as $post): ?>
	
		  <div>
				<fieldset><legend><h3><?php echo ($post['posttitle']. 'Post #'.$post['id']); ?></h3></legend>
					<p><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($post['text'])), 0, 10))); ?> [...]</p>
					<a href="/imagozcms/viewpost/?id=<?php htmlecho ($post['id']); ?>" class="btn btn-primary">Read More</a>
				</fieldset>  
			</div>		
		  	 
		 <?php endforeach; ?>
		
	<?php endif;?>
	</div>
	
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>
