<?
require_once "config.php";
require_once "bounce.php";

$agent_id = $_SESSION["agent_id"];
$id = $_POST["id"];
$name = $_POST["name"];
$start_date = $_POST["start_date_Year"] . "-" . $_POST["start_date_Month"] . "-" . $_POST["start_date_Day"];
$end_date   = $_POST["end_date_Year"]   . "-" . $_POST["end_date_Month"]   . "-" . $_POST["end_date_Day"];

$db = getDb();
if ($id == "NEW") {
  $result = pg_query_params($db, "INSERT INTO quiz (id, name, start_date, end_date, modified, modified_by) VALUES (DEFAULT, $1, $2, $3, now(), $4)", array($name, $start_date, $end_date, $agent_id));
  header("location: quiz.php");
} else {
  $result = pg_query_params($db, "UPDATE quiz SET name = $1, start_date = $2, end_date = $3, modified = now(), modified_by = $4 WHERE id = $5", array($name, $start_date, $end_date, $agent_id, $id));
  header("location: quiz.php");
}
?>
