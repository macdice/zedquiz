<?
require_once "config.php";
require_once "bounce.php";

$id = $_GET["id"];
$quiz_id = $_GET["quiz"];

$db = getDb();
$smarty = getSmarty();
if (isset($id)) {
  $result = pg_query_params($db, "SELECT body, active, sort, business, quiz FROM question WHERE id = $1", array($id));
  $rows = pg_fetch_all($result);
  $smarty->assign("question_body", $rows[0]["body"]);
  $smarty->assign("active", $rows[0]["active"]);
  $smarty->assign("business", $rows[0]["business"]);
  $smarty->assign("sort", $rows[0]["sort"]);
  $smarty->assign("quiz_id", $rows[0]["quiz"]);
  $result = pg_query_params($db, "SELECT id, body, correct, active FROM possible_answer WHERE question = $1", array($id));
  $smarty->assign("answers", pg_fetch_all($result));
  $smarty->assign("id", $id);
} else {
  $smarty->assign("id", "NEW");
  $smarty->assign("quiz_id", $quiz_id);
}
$result = pg_query($db, "SELECT id, display_name FROM business ORDER BY display_name");
$business_ids = array();
$business_names = array();
foreach (pg_fetch_all($result) as $row) {
  $business_ids[] = $row["id"];
  $business_names[] = $row["id"] . " " . $row["display_name"];
}
$smarty->assign("business_ids", $business_ids);
$smarty->assign("business_names", $business_names);
$smarty->display("admin/edit_question.tpl");
?>
