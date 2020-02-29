<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>
	
	<div class = "maincont"> 
			<div align = "center"><script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
			<script src="//yastatic.net/share2/share.js"></script>
			<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,lj"></div></div>
		
		<div>
		<?php if (!isset($tasks))
		 {
			 $noPosts = '<p align = "center">Задания пока отсутствуют</p>';
			 echo $noPosts;
			 $tasks = null;
		 }
		 
		 else
			 
		 foreach ($tasks as $task): ?> 
		  
			<div>
				
				<div class = "post">
				  <div class = "posttitle">
				    <?php echo ('Дата выдачи: '. $task['taskdate']. ' | Задание выдал: <a href="/account/?id='.$task['idcreator'].'" style="color: white" >'.$creator).'</a> | '.
						'Получено: '.$task['takingdate'];?>
					<p>Тип: <?php echo $task['tasktypename'];?></p>
				  </div>
				   <div class = "newstext">
				    <h5 align = "center"><?php htmlecho ($task['tasktitle']); ?></h5>
					<p align = "justify"><?php echomarkdown (implode(' ', array_slice(explode(' ', strip_tags($task['text'])), 0, 50))); ?> [...]</p>
					<a href="/admin/viewallauthortask/viewtask/?id=<?php htmlecho ($task['id']); ?>" class="btn btn-primary">Далее</a>
				   </div>	
				 </div>
			</div>			
		 <?php endforeach; ?>
		<p><a name="bottom"></a></p>
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

