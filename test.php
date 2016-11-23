<?php 

use core\data\model\PDOData;

require_once("/core/data/PDOData.php");

//$db = new PDOData();

var_dump($_GET);

try {
	/* Ket noi CSDL */
	$db = new PDO("mysql:host=localhost;dbname=personalcontact;", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// $nickname = null;
	// $c = $db->doSql("insert into lienlac(hoten, nickname, nhom) values('test', '$nickname', 1)");
	// var_dump($c);
	// echo "c = " . $c;

	// $hoten = $_GET['hoten'];
	// $nhom = $_GET['nhom'];
	// $nickname = $_GET['nickname'];

	if(!isset($_GET['hoten']) || empty($_GET['hoten'])) { $_GET['hoten'] = null; }
	if(!isset($_GET['nhom']) || empty($_GET['nhom'])) { $_GET['nhom'] = null; }
	if(!isset($_GET['nickname']) || empty($_GET['nickname'])) { $_GET['nickname'] = null; }

	echo $_GET['hoten'];


	$stmt = $db->prepare("INSERT INTO lienlac (hoten, nickname, manhom) VALUES (:hoten, :nickname, :nhom)");

	$stmt->bindParam(':hoten', $_GET['hoten'],  PDO::PARAM_STR);
	$stmt->bindParam(':nickname', $_GET['nickname'],  PDO::PARAM_STR);
	$stmt->bindParam(':nhom', $_GET['nhom'],  PDO::PARAM_STR);
	echo $stmt->errorCode();
	$value = $stmt->execute();
	var_dump($value);

	echo $stmt->queryString;
	echo $stmt->errorCode();	
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}

 ?>