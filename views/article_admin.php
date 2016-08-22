<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Мой первый блог</title>
	<link rel="stylesheet" href="../static/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Мой Первый Блог</h1>
		<div>
		<form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
			<label>
				Название
				<input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required>
			</label>
			
			<label>
				Дата
				<input type="date" name="date" value="<?=$article['date']?>" class="form-item" required>
			</label>

			<label>
				Содержимое
				<textarea name="content" class="form-item" required> <?=$article['content']?>     </textarea>
			</label>

			<input type="submit" value="Сохранить" class="btn">
		</form>
		</div>
		<footer>
			<p>Мой Первый Блог <br> Copyright &copy; 2015</p>
		</footer>
	</div>
</body>
</html>