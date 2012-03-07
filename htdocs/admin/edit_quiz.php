<?
require_once "config.php";
require_once "bounce.php";

$quiz_id = $_GET["id"];
$db = getDb();
$smarty = getSmarty();
if (isset($quiz_id)) {
   $result = pg_query_params($db, "SELECT id, name, start_date, end_date FROM quiz WHERE id = $1", array($quiz_id));
   $rows = pg_fetch_all($result);
   $smarty->assign("id", $rows[0]["id"]);
   $smarty->assign("name", $rows[0]["name"]);
   $smarty->assign("start_date"	, $rows[0]["start_date"]);
   $smarty->assign("end_date", $rows[0]["end_date"]);
} else {
  $smarty->assign("id", "NEW");
}

$smarty->display("admin/edit_quiz.tpl");
?>