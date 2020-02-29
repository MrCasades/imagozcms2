<div class="categorypanel">
<h5>Рубрики</h5><br>
	 <?php foreach ($categorys as $category): ?> 
		  
		<div>  
			<a href="/imagozcms/viewcategory/?id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm btn-block"> <?php echomarkdown ($category['category']); ?></a><br>  	
		</div>	   	
	 <?php endforeach; ?> 

</div>