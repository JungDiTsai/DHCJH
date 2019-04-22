<?php 
session_start();
if( isset($_SESSION["member"]) === true){
	print_r ($_SESSION["member"]) ;
}else{
	echo "notFound";
}
?>