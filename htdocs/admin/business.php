<?
require_once "config.php";
require_once "bounce.php";

$db = getDb();
$results = pg_query_params($db, "SELECT b.id, b.display_name, b.company_name, b.modified, a.first_name, a.last_name
                                   FROM business b JOIN agent a ON b.modified_by = a.id
                                  ORDER BY b.display_name, b.company_name", array());


$smarty = getSmarty();
$smarty->assign("businesses", pg_fetch_all($results));
$smarty->display("admin/business.tpl");
?>
