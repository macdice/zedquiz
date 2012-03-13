<?
require_once "config.php";
require_once "bounce.php";

$db = getDb();
$results = pg_query_params($db, "SELECT a.id, a.first_name, a.last_name, a.active, a.email, a.username, a.modified, a.last_login, a2.first_name as modified_by_first_name, a2.last_name as modified_by_last_name
                                   FROM agent a LEFT OUTER JOIN agent a2 ON a.modified_by = a2.id
                                  ORDER BY a.first_name, a.last_name", array());


$smarty = getSmarty();
$smarty->assign("agents", pg_fetch_all($results));
$smarty->display("admin/agent.tpl");
?>
