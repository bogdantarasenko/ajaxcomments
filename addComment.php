<?
/*
$db = new PDO('mysql:host=localhost;dbname=test', 'mysql', 'mysql');
if(isset($_POST['jsonData'])){
	$data = json_decode($_POST['jsonData']);
	$email = $data->{"email"};
	$fio =  $data->{"fio"};
	$telephone =  $data->{"telephone"};
	$file =  $data->{"file"};
	$comment =  $data->{"comment"};
	$date = time();
	if(empty($email) || empty($fio) || empty($telephone) || empty($comment)){
		echo "<div class='panel panel-danger'><div class='panel-heading'>error:</div<div class='panel-body'>empty field</div></div>";
	}else{
		$result = $db->query("INSERT INTO comments SET email='$email',fio='$fio',telephone='$telephone',imgpath='$file',comment='$comment',datetime='$date'");
		$id = $insertId=$db->lastInsertId();
		if(!$result){
			echo "error";
		}else{
			$formatdate = date("d:m:y H:i:s",$date);
			 if($file == 0){
				echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>комментарий:$comment</p></div></div>";
			}else{
				echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>img:$file<br>комментарий:$comment</p></div></div>";
			}
		
	}
	}
	
}else if($_POST['getComments']){
	$result = $db->query("SELECT * FROM comments ORDER BY id DESC");
	$result->setFetchMode(PDO::FETCH_ASSOC);
	while($row = $result->fetch())
	{	
		$formatdate = date("d:m:y H:i:s",$row['datetime']);
		$id = $row['id'];
		$email = $data->{"email"};
		$fio =  $row['fio'];
		$telephone = $row['telephone'];
		$file =  $row['imgpath'];
		$comment =  $row['comment'];
	    if($file == 0){
				echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>комментарий:$comment</p></div></div>";
			}else{
				echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>img:$file<br>комментарий:$comment</p></div></div>";
			}
	}
	//var_dump($result);
	//echo "hello";
}
*/

class Comment{

	private static $db;

	public static function db() {
        if (self::$db === null) {
            self::$db = new PDO('mysql:host=localhost;dbname=u152329117_bd2 ', 'u152329117_bd2 ', 'apogel41'); 
        }
 
        return self::$db;
    } 

    public function addComment(){
		$data = json_decode($_POST['jsonData']);
		$email = $data->{"email"};
		$fio =  $data->{"fio"};
		$telephone =  $data->{"telephone"};
		$comment =  $data->{"comment"};
		$date = time();
		$file =  $data->{"file"};

		/*
		print_r($_FILES);
		foreach( $_FILES as $file ){
			echo $file;
		}*/
		if(empty($email) || empty($fio) || empty($telephone) || empty($comment)){
			echo "<div class='panel panel-danger'><div class='panel-heading'>error:</div<div class='panel-body'>empty field</div></div>";
		}else{
			$result = self::$db->query("INSERT INTO comments SET email='$email',fio='$fio',telephone='$telephone',imgpath='$file',comment='$comment',datetime='$date'");
			$id = $insertId=self::$db->lastInsertId();
			if(!$result){
				echo "error";
			}else{
				if(mail($email, $fio, $comment)){
					echo "сообщение на email отправлено";
				}else{
					echo "ошибка отправки email сообщения";
				}; 
				$formatdate = date("d:m:y H:i:s",$date);
				 if($file == 0){
					echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>комментарий:$comment</p></div></div>";
				}else{
					echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>img:$file<br>комментарий:$comment</p></div></div>";
				}
			
		}
		}
    }
    public function getComments(){
    	$result = self::$db->query("SELECT * FROM comments ORDER BY id DESC");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $result->fetch()){	
			$formatdate = date("d:m:y H:i:s",$row['datetime']);
			$id = $row['id'];
			$email = $data->{"email"};
			$fio =  $row['fio'];
			$telephone = $row['telephone'];
			$file =  $row['imgpath'];
			$comment =  $row['comment'];
		    if($file == 0){
					echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>комментарий:$comment</p></div></div>";
				}else{
					echo "<div class='panel panel-default'><div class='panel-heading'><p>id:$id &nbsp; Date:$formatdate</p><p>фио:$fio</p></div><div class='panel-body'><p>img:$file<br>комментарий:$comment</p></div></div>";
				}
    	}
    }

}
$comment = new Comment;
Comment::db();
if(isset($_POST['jsonData'])){
	$comment->addComment();
}
if(isset($_POST['getComments'])){
	$comment->getComments();
}
