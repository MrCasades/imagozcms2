<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.inc.php';?>
	
	<div class = "maincont">
	<div class = "post" align = "center">
		<p align = "justify">Пополнение счёта на сайте <strong>IMAGOZ.RU</strong> осуществляется при помощи сервиса <strong>Яндекс.Деньги</strong>. Ваш счёт баллов будет пополнен мгновенно после совершения операции. 
		В случае возникновения проблем с платежом, если счёт не был пополнен и т. п. пишите в <a href='/admin/adminmail/?addmessage'>форму</a> обратной связи в меню сайта. Пополнить можно на любую сумму. По-умолчанию
		предлагается цена 1-й публикации рекламной статьи на сайте.</p>
	
	<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
	 <table>
		 <tr>
		  <div>
			<th>Введите сумму: </th><td><input type="input" name="sum"  data-type="number" value="99"></td>
		  </div>
		</tr>
		 <tr>
		  <div> 
			  <th>Выбор способа пополнения: </th>
				<td><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</input>
				<input type="radio" name="paymentType" value="AC">Банковской картой</input></td>
	  	 </div>
		</tr>
	 </table>	
		<input type="hidden" name="receiver" value="410015600659745">
		<input type="hidden" name="formcomment" value="Пополнение счёта IMAGOZ">
		<input type="hidden" name="short-dest" value="Пополнение счёта IMAGOZ">
		<input type="hidden" name="label" value="<?php htmlecho ($idauthor); ?>">
		<input type="hidden" name="quickpay-form" value="donate">
		<input type="hidden" name="targets" value="Пополнение счёта IMAGOZ">
		<input type="hidden" name="comment" value="Пополненить счёт IMAGOZ" >
		<input type="hidden" name="need-fio" value="false"> 
		<input type="hidden" name="need-email" value="false" >
		<input type="hidden" name="need-phone" value="false">
		<input type="hidden" name="need-address" value="false">
			
	<div><input type="submit" name="submit-button" value="Перевести" class="btn btn-primary"></div>
</form>
	</div>
	</div>

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/footer.inc.php';?>	