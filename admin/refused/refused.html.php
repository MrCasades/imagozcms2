<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>

	<div class = "maincont_for_view">
		<div>
			<h3 align = "center">Статьи</h3>
		  
		  <?php if (empty ($posts))
		 { 
			 echo '<p align = "center">Отклонённые материалы отсутствуют</p>';
		 }
		 
		 else
		  
		 foreach ($posts as $post): ?> 
		  <div class = "post">
			  <div class = "posttitle">
				  <?php echo ($post['postdate']. ' | Автор: <a href="/account/?id='.$post['idauthor'].'" style="color: white" >'.$post['authorname']).'</a>';?>
			  </div>
			  <div>
				  <h3 align = "center"><?php echo $post['posttitle'];?></h3>		  	
			  </div> 
			  <div class = "posttitle" align="center">
				  Причина отказа
			  </div>
			  <div>
				  <p align="justify"><?php echomarkdown ($post['reasonrefusal']);?></p>
				  <form action = "/admin/addupdpost/" method = "post">
						<input type = "hidden" name = "id" value = "<?php echo $post['id'];?>">
						<input type = "submit" name = "action" value = "Переделать" class="btn btn-primary">
						<input type = "submit" name = "action" value = "Del" class="btn btn-danger btn-sm">
					</form>
			  </div>
		  </div>			
		 <?php endforeach; ?> 
	</div>	
		
		<hr/>
		<div>
			<h3 align = "center">Новости</h3>
		  
		  <?php if (empty ($newsIn))
		 { 
			 echo '<p align = "center">Отклонённые материалы отсутствуют</p>';
		 }
		 
		 else
		  
		 foreach ($newsIn as $news): ?> 
		  <div class = "post">
			  <div class = "posttitle">
				  <?php echo ($news['newsdate']. ' | Автор: <a href="/account/?id='.$news['idauthor'].'" style="color: white" >'.$news['authorname']).'</a>';?>
			  </div>
			  <div>
				  <h3 align = "center"><?php echo $news['newstitle'];?></h3>		  	
			  </div> 
			  <div class = "posttitle" align="center">
				  Причина отказа
			  </div>
			  <div>
				  <p align="justify"><?php echomarkdown ($news['reasonrefusal']);?></p>
				  <form action = "/admin/addupdnews/" method = "post">
						<input type = "hidden" name = "id" value = "<?php echo $news['id'];?>">
						<input type = "submit" name = "action" value = "Переделать" class="btn btn-primary">
						<input type = "submit" name = "action" value = "Del" class="btn btn-danger btn-sm">
					</form>
			  </div>
		  </div>			
		 <?php endforeach; ?> 
	</div>	
		
		<hr/>
	<div>
			<h3 align = "center">Промоушен</h3>
		  
		  <?php if (empty ($promotions))
		 { 
			 echo '<p align = "center">Отклонённые материалы отсутствуют</p>';
		 }
		 
		 else
		  
		 foreach ($promotions as $promotion): ?> 
		  <div class = "post">
			  <div class = "posttitle">
				  <?php echo ($promotion['promotiondate']. ' | Автор: <a href="/account/?id='.$promotion['idauthor'].'" style="color: white" >'.$promotion['authorname']).'</a>';?>
			  </div>
			  <div>
				  <h3 align = "center"><?php echo $promotion['promotiontitle'];?></h3>		  	
			  </div> 
			  <div class = "posttitle" align="center">
				  Причина отказа
			  </div>
			  <div>
				  <p align="justify"><?php echomarkdown ($promotion['reasonrefusal']);?></p>
				  <form action = "/admin/addupdpromotion/" method = "post">
						<input type = "hidden" name = "id" value = "<?php echo $promotion['id'];?>">
						<input type = "submit" name = "action" value = "Переделать" class="btn btn-primary">
						<input type = "submit" name = "action" value = "Del" class="btn btn-danger btn-sm">
					</form>
			  </div>
		  </div>			
		 <?php endforeach; ?> 
	</div>	
		<p><a name="bottom"></a></p>
	</div>
  		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>		