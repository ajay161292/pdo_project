<?php
//dsn = data sourse name
$dsn = 'mysql:host=localhost;dbname=practicle';
$uname = 'root';
$pass = '';

try{
	$db = new PDO($dsn,$uname,$pass,array(PDO::ATTR_PERSISTENT => true));
	echo'<pre>';
	// print_r($db);
}
catch(PDOException $e){
	echo 'connection failed : '.$e->getMessage();
}

class User
{
	public $id,$username,$password;
	public function __construct($arg="")
	{
		$this->userid = "{$this->id}";
	}
}

$query = $db->query('select * from user');
$query->setFetchMode(PDO::FETCH_CLASS, 'User');
// while($res = $query->fetch()){
// 	print_r($res);
// }
$res = $query->fetchAll();
if(count($res)){
	echo 'Total rows : '. $query->rowCount().'<br>';
	print_r($res);
}
else{
	echo'No Records found';
}
$query = null;
$db = null;

// $attributes = array(
//     "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
//     "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
//     "TIMEOUT"
// );

// foreach ($attributes as $val) {
//     echo "PDO::ATTR_$val: ";
//     echo $db->getAttribute(constant("PDO::ATTR_$val")) . "\n";
// }




?>