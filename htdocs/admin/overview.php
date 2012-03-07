<?
require_once "config.php";
require_once "bounce.php";

$smarty = getSmarty();
$smarty->display("admin/overview.tpl");
?>
