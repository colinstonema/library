<?php
require_once('includes/init.php');
	header ( "Content-type: text/html; charset=UTF-8" ); 	//�����ļ������ʽ
	header("Content-type:image/gif");						//����ҳ������
	$image = imagecreatetruecolor(80,30);					//��������
	$font = 'Font/FZHCJW.TTF';								//��������
	$bg = imagecolorallocate($image,255,255,255);			//���屳����ɫ
	$color = imagecolorallocate($image,255,0,255);
	$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
	$pdo = new PDO($dsn,$dbUser,$dbpw);
	$id = rand(1,18);
	$sql = "select * from verify where varify_id = ".$id;
	$stmt = $pdo->query($sql);
	$res = $stmt->fetch();
	$content = $res['varify_content'];
	imagettftext($image,20,0,8,20,$color,$font,$content);	//�������
	imagegif($image);	//����ͼ��
	session_start();
	$_SESSION['verify']=$content;
?>



