<?php 
	if(isset($_GET['act'])){$act=$_GET['act'];}else{$act="";}
	switch($act)
	{
		case "home":
		    require_once("home.php");
        break;
        case "shop":
		    require_once("shop.php");
        break;
        case "about":
		    require_once("about.php");
        break;
        case "contact":
		    require_once("contact.php");
        break;
        case "order":
		    require_once("order.php");
        break;
        default:
			require_once('home.php');
		break;

	}
?>