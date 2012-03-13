<?
require_once("config.php");
$smarty = getSmarty();
$smarty->assign("mode", $_GET["mode"]);
$smarty->display("admin/login.tpl");
?>
