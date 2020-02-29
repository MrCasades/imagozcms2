<!DOCKTYPE html>
<html>
<head> 

<title>Add book</title> 
<meta charset = "utf-8">
<style type = "text/css">
textarea {
	display: block;
	width: 50%;
}
</style>
</head>
<body>

	<h1>Добавить книгу в базу даннх</h1>
	<br>
	<form action = "?" method = "post">
		<div>
			<label for = "bookname">Введите название книги</label>
			<textarea id = "bookname" name = "bookname" rows = "3" cols = "40">	
			</textarea>		
		</div> 
		<div><input type = "submit" value = "Add"></div>
	</form>	
</body>
</html>