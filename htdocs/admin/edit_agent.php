<?
require_once "config.php";
require_once "bounce.php";

$id = $_GET["id"];
$db = getDb();
$smarty = getSmarty();
if (isset($id)) {
   $result = pg_query_params($db, "SELECT id, first_name, last_name, username, email, active, login_failures FROM agent WHERE id = $1", array($id));
   $rows = pg_fetch_all($result);
   $smarty->assign("id", $id);
   $smarty->assign("record", $rows[0]);
} else {
   $smarty->assign("id", "NEW");
}

$smarty->display("admin/edit_agent.tpl");
?>
