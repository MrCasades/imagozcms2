<div class="categorypanel">
<h5>Рубрики</h5>
	 <?php foreach ($categorys as $category): ?> 
		  
		<div>
		  <ul class= "nav nav-tabs nav-stacked">
			<li><a href="/imagozcms/viewcategory/?id=<?php echo $category['id']; ?>"> <?php echomarkdown ($category['category']); ?></a></li>
		  </ul>	
		</div>	   	
	 <?php endforeach; ?> 

</div>