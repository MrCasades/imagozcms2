<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont_for_view">
	<div class = "post">
	  <div  align="justify">	
		<p><?php htmlecho($errLog);?></p>
		<p>Пройдите процедуру регистрации в системе, для того, чтобы получить возможность оценивать материалы наших авторов, оставлять комментарии и отвечать на них. 
		   У Вас будет свой профиль, где сможете вести персональный блог на стенеи и общаться с другими пользователями.</p>
		<p>Также, если Вы умеете хорошо писать <strong>уникальные</strong> тексты, желаете участвовать в развитии портала, то <a href="/admin/adminmail/?addmessage">пишите</a> 
		   администратору с пометкой <strong>"Хочу быть автором"</strong> и заявка будет рассмотрена в кратчайшие сроки.
			Все материалы будут оплачиваться <strong>(В начале от 11,5 руб / тыс. знаков, возможны бонуы и индивидуальные условия по договорённости)</strong>. На портале действует гибкая автоматизированная систма, с оплатой за объём написанного материала, плюс индивидуальные бонусы.</p>
		  <p><h6>По всем вопросам:</h6>
		  	<ul>
			  <li>Telegramm: @PolyakoffArs</li>
			  <li>E-mail: imagozman@gmail.com</li>
			  <li>VKontakte: <a href="https://vk.com/id213646416" rel="nofollow">Арсений Поляков</a></li>
			</ul>
		  </p>
	  </div>	  
	<div  align="center">	
	<form action = "?<?php htmlecho ($action); ?>" method = "post">
	 <table>
		 <tr>
			<th>Имя автора:* </th><td><input type = "text" name = "authorname" id = "authorname" value = "<?php htmlecho($authorname);?>"></td>
		 </tr>			 
		 <tr>
			<th>E-mail:* </th><td><input type = "text" name = "email" id = "email" value = "<?php htmlecho($email);?>"></td> 	
		 </tr>			
		 <tr>
			<th>Пароль:* </th><td><input type = "password" name = "password" id = "password" value = "<?php htmlecho($password);?>"></td> 		
		 </tr>			
		 <tr>
			<th>Повторить пароль:* </th><td><input type = "password" name = "password2" id = "password2" value = "<?php htmlecho($password2);?>"></td> 	
		 </tr>		
		 <tr>
			<th>WWW: </th><td><input type = "text" name = "www" id = "www" value = "<?php htmlecho($www);?>"></td> 
		 </tr>
	 </table>
	 <br>
		<div>
			<strong><label for = "post">Введите дополнительную информацию:</label></strong>
			<textarea class = "descr" id = "accountinfo" name = "accountinfo" rows = "3" cols = "40"><?php htmlecho($accountinfo);?></textarea>	
		</div>		 
     <br>
			<p><input type = "hidden" name = "role" value = "<?php htmlecho($role);?>">
			<input type = "hidden" name = "id" value = "<?php htmlecho($idauthor);?>">
			<input type = "submit" value = "<?php htmlecho($button); ?>" class="btn btn-primary"></p>
	</form>
	</div>
	</div>
	</div>
		
<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>