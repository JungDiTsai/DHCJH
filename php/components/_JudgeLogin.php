<?php 
session_start();
if( isset($_SESSION["member"]) === true){
	echo ($_SESSION["member"]) ;
}else{
	echo "notFound";
}
?>