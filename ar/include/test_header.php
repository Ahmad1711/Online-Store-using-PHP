<?php
if(isset($_SESSION["family_id"]))
{
include("include/header_family.php");
}
elseif(isset($_SESSION["customer_id"])){
	include("include/header_customer.php");
}
elseif(isset($_SESSION["admin_id"])){
	include("include/header_admin.php");
}
else{
	include("include/header.php");
}
?>