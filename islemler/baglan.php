<?php  
//1.yol

	try{


		$db = new PDO("mysql:host=localhost;dbname=[veri tabanı adı];charset=utf8",'[veri tabanı kullanıcı adı]','[veri tabanı şifre]');


		//echo "Veri tabanı bağlantısı başarılı";
	}catch(PDOExpception $e){


		echo $e->getMessage();
	}


?>