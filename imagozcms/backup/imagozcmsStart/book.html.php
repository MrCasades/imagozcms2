%
<?php 
/*Загрузка функций в шаблон*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/func.inc.php';

/*Загрузка header*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';?>

	<div class = "maincont">
	  <table>
		<tr><th>Название книги</th><th>Автор</th><th>Жанр</th><th>Дата добавления</th></tr>
		 <?php foreach ($bookname as $book): ?> 
		  <tr> 
			<div>
				<td><a href = "description.html.php?description=<?php htmlecho($book['description']);?>"><?php htmlecho($book['text']);?></a></td>
				<td><?php htmlecho($book['authorname']);?></td>	
				<td><?php htmlecho($book['genrename']);?></td>
				<td><?php htmlecho($book['bookdate']);?></td>
			</div>
		  </tr> 	
		 <?php endforeach; ?>
	  </table>
	</div>		

<?php 
/*Загрузка footer*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php';?>

