<?php

$db_user='chefinhome';
$db_password='Bisnaguinha2023';
$db_name='chefinhome';

/*para conectar ao POSTGRESQL "pgsql:host=$host;port=5432*/

//$db= new PDO('mysql:host=localhost;dbname='. $db_name . ';charset=utf8', $db_user,$db_password);
$db_con= new PDO('mysql:host=www.db4free.net;port=3306;dbname='. $db_name . ';charset=utf8', $db_user,$db_password);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//define('APP_NAME', 'PHP REST API TUTORIAL - PROFA MARTA');


?>
