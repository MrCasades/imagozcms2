<?php 
/*Загрузка функций в шаблон*/
include_once MAIN_FILE . '/includes/func.inc.php';

/*Загрузка header*/
include_once MAIN_FILE . '/header.inc.php';?>
	<p><a name="bottom"></a></p>  
	<div class = "maincont_for_view">
	<div class = "post">
	  <div  align="justify">
		<p>Пройдите процедуру регистрации в системе, для того, чтобы получить возможность оценивать материалы наших авторов, оставлять комментарии и отвечать на них. 
		   У Вас будет свой профиль, где сможете вести персональный блог на стенеи и общаться с другими пользователями.</p>

		  <p><h3>По всем вопросам:</h3>
		  	<ul>
			  <li>Telegramm: @PolyakoffArs</li>
			  <li>E-mail: imagozman@gmail.com</li>
			  <li>VKontakte: <a href="https://vk.com/id213646416" rel="nofollow">Арсений Поляков</a></li>
			</ul>
		  </p>
	  </div>	  
	<div  align="center">
	<strong><p id = "incorr" style="color: red"><?php htmlecho($errLog);?></p></strong>
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
			<th>Сайт или ссылка на соцсеть: </th><td><input type = "text" name = "www" id = "www" value = "<?php htmlecho($www);?>" placeholder = "Без http://"></td> 
		 </tr>
	 </table>
	 <br>
		<div>
			<strong><label for = "post">Введите дополнительную информацию:</label></strong>
			<textarea class = "descr" id = "accountinfo" name = "accountinfo" data-provide="markdown" rows="10" placeholder = "Расскажите о себе"><?php htmlecho($accountinfo);?></textarea>	
		</div>		 
     <br>
			<p><input type = "hidden" name = "role" value = "<?php htmlecho($role);?>">
			<input type = "hidden" name = "id" value = "<?php htmlecho($idauthor);?>">
			
			<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY;?>"></div>
				<br>
			<input type = "submit" value = "<?php htmlecho($button); ?>" class="btn btn-primary" id = "confirm"></p>
	</form>
	</div>
	</div>
	</div>
		
<?php 
/*Загрузка footer*/
include_once MAIN_FILE . '/footer.inc.php';?>