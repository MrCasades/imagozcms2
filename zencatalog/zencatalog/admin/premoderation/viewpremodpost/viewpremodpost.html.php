<?php 

/*Загрузка функций для формы входа*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
		<div>
		 <table>
		 <tr>
		  <td valign="top"><label for = "meta"> Теги:</label></td> 
		  <?php if (!isset($metas))
			  {
				 $noPosts = ' ';
				 echo $noPosts;
				 $metas = null;
		      }
		 
		      else
				  
		      foreach ($metas as $meta): ?>	  
				<td><div>	 
					<a href="/viewmeta/?metaid=<?php echo $meta['id']; ?>"><?php echomarkdown ($meta['metaname']); ?></a>	 
				</div></td> 	
				<?php endforeach; ?>
		  </tr>
		 </table>
		</div>
		
		<div>
		 <?php foreach ($posts as $post): ?> 	  
			<div  align="justify">
			
				<h3><?php echo ($post['posttitle']. 'Post #'.$post['id']); ?></h3>
					<?php if ($post['imghead'] == '')
					{
						$img = '';//если картинка в заголовке отсутствует
						echo $img;
					}
						else 
					{
						$img = '<img width = "60%" height = "40%" src="/images/'.$post['imghead'].'"'. ' alt="'.$post['imgalt'].'"'.'>';//если картинка присутствует
					}?>
					<p><?php echo $img;?></p>
					<p><?php echomarkdown ($post['text']); ?></p>
					<p align="center"><?php echo $video; ?></p>
					<p><?php echo $delAndUpd; ?></p>
					<p align="center"><?php echo $premoderation; ?></p>
			</div>	
		 <?php endforeach; ?>
		</div>	
	</div>		
					
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>