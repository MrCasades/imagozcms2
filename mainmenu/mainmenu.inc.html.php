
<nav id="menu1">
 <ul>
  <li><a href="<?php echo '//'.MAIN_URL;?>">Главная страница</a></li>
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
                <li><a href="<?php echo '//'.MAIN_URL;?>/viewcategory/?id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm btn-block"><?php echomarkdown ($category['category']); ?></a></li>
			  <?php endforeach; ?>	
            </ul>
  </li>
  <li><a href="<?php echo '//'.MAIN_URL;?>/searchpost/">Поиск</a></li>
  <li><a href="<?php echo '//'.MAIN_URL;?>/cooperation/">Сотрудничество</a></li>
  <li><a href="<?php echo '//'.MAIN_URL;?>/promotion/">Промоушен</a></li>
  <li><a href="<?php echo '//'.MAIN_URL;?>/admin/adminmail/?addmessage#bottom">Обратная связь</a></li>
 </ul>
</nav>