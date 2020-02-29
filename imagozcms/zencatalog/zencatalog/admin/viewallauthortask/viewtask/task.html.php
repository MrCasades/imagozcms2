<?php 

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont_for_view">
		
		<div class = "post">
		 <?php foreach ($tasks as $task): ?> 	  
			<div  align="justify">
			
				<div class = "posttitle">
				  <?php echo ('Дата выдачи: '.$task['taskdate']. ' | Задание выдал: <a href="/account/?id='.$task['idauthor'].'" style="color: white" >'.$task['authorname']).'</a>';?>
					<p>Тип: <?php echo $task['tasktypename'];?></p>
				</div>	
					<p><?php echomarkdown ($task['text']); ?></p>
					<p><?php echo $performTask; ?></p>
					<p><?php echo $refuse; ?></p>
			</div>			
		 <?php endforeach; ?>
		</div>	
	  </div>				

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>