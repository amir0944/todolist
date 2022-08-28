<?php
list ($host,$database,$user,$pass)=["localhost","tesk","root",""];

try{
	$db=new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4",$user,$pass);
}catch(PDOException $e){
		 echo "PDO Error:Filed to Connect:".$e->getMessage();
}
