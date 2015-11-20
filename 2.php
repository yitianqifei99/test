<?php
$host        = "host=192.168.18.111";
$port        = "port=5432";
$dbname      = "dbname=EOC_CC";
$credentials = "user=cc_app_user password=tswltx400";

$db = pg_connect( "$host $port $dbname $credentials"  );
if(!$db){
	echo "Error : Unable to open database\n";
} else {
	echo "Opened database successfully\n";
}

?>