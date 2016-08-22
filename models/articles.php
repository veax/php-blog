<?php 
	function articles_all($link){
		$query = "SELECT * FROM articles ORDER BY id DESC";
		$result = mysqli_query($link, $query);

		if(!$result)
			die(mysqli_error($link));

		$n = mysqli_num_rows($result);
		$articles = array();

		for ($i=0;$i<$n; $i++) {
			$row = mysqli_fetch_assoc($result);
			$articles[] = $row;
		}

		return $articles;

	}

	function articles_get($link, $id_article){
		$query = sprintf("SELECT * FROM articles WHERE id =%d", (int)$id_article);
		$result = mysqli_query($link, $query);

		if(!$result)
			die(mysqli_error($link));

		$article = mysqli_fetch_assoc($result);

		return $article;

	}

	function articles_new($link, $title, $date, $content){

		$title = trim($title);
		$content = trim($content);


		if ($title == '')
			return false;

		$t = "INSERT INTO articles (title, date, content) 
		VALUES ('%s', '%s', '%s')";

		$query = sprintf($t, mysqli_real_escape_string($link, $title), 
			mysqli_real_escape_string($link, $date), 
			mysqli_real_escape_string($link, $content));

		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));

		return true;
	}

	function articles_edit($link, $id, $title, $date, $content){
			$title = trim($title);
			$content = trim($content);
			$date = trim($date);
			$id = (int)$id;

			if($title =='')
				return false;

			$sql = "UPDATE articles SET title='%s', content='%s', date='%s' WHERE id='%d' ";

			$query = sprintf($sql, mysqli_real_escape_string($link, $title),
								   mysqli_real_escape_string($link, $content),
								   mysqli_real_escape_string($link, $date), $id);
			
			$result = mysqli_query($link, $query);	

			if(!$result)
				die(mysqli_error($link));

			return mysqli_affected_rows($link);
	}

	function articles_delete($link, $id){
		$id = (int)$id;

		if ($id == 0)
			return false;

		$query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));

		return mysqli_affected_rows($link);

	}

	function articles_intro($text, $len = 500) { 

        $truncated_len = $len; //Инициализируем переменную $truncated_len - которая

                            // будет содержать длину строки по пробел в строке $text

        for ($i = $len-10; $i <= $len+10; $i++) {

           $char = mb_substr($text, $i, 1);  //выделяем каждый символ с 490 по 510 в

                                             //строке $text

            if ($char == " ") {                           

                $truncated_len = $i;  //Если этот символ равен пробелу, присваем это

                                      // значение переменной $truncated_len

            }

        }

        return mb_substr($text, 0, $truncated_len)." ..."; //Обрезаем вводной текст 

                                           //по пробелу, добавляем в конце троеточие

    }






	//function articles_intro($text, $len = 500){
		//return mb_substr($text, 0, $len);
	//}
 ?>