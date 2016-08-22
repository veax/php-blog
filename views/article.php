<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Мой первый блог</title>
	<link rel="stylesheet" href="static/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Мой Первый Блог</h1>
		<div class="article">
			<h3><? echo $article['title']?></h3>
			<!-- echo $article == ?=$article -->
			<em>Опубликовано: <? echo $article['date']?></em>
			<p><? echo $article['content']?></p>
		</div>

		<footer>
			<p>Мой Первый Блог <br> Copyright &copy; 2015</p>
		</footer>
	</div>
</body>
</html>