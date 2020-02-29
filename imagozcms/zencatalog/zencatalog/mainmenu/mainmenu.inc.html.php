
<nav id="menu1">
 <ul>
  <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>">Главная страница</a></li>
  <li><a href="#m3">Рубрики</a>
   <ul>
		<?php 
		 if (!isset($categorysMM))
		 {
			 $noCategorys = '<p align = "center">Новости в рубрике отсутствуют!</p>';
			 echo $noCategorys;
			 $categorysMM = null;
		 }
			
		 else
			 
			  foreach ($categorysMM as $category): ?>
                <li><a href="/viewcategory/?id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm btn-block"><?php echomarkdown ($category['category']); ?></a></li>
			  <?php endforeach; ?>	
            </ul>
  </li>
  <li><a href="/searchpost/">Поиск</a></li>
  <li><a href="/cooperation/">Сотрудничество</a></li>
  <li><a href="/promotion/">Промоушен</a></li>
  <li><a href="/admin/adminmail/?addmessage">Обратная связь</a></li>
 </ul>
</nav>