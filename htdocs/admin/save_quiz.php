<?
require_once "config.php";
require_once "bounce.php";

$id = $_POST["id"];
$name = $_POST["name"];
$start_date = $_POST["start_date_Year"] . "-" . $_POST["start_date_Month"] . "-" . $_POST["start_date_Day"];
$end_date   = $_POST["end_date_Year"]   . "-" . $_POST["end_date_Month"]   . "-" . $_POST["end_date_Day"];

$db = getDb();
if ($id == "NEW") {
  $result = pg_query_params($db, "INSERT INTO quiz (id, name, start_date, end_date) VALUES (DEFAULT, $1, $2, $3)", array($name, $start_date, $end_date));
  header("location: quiz.php");
} else {
  $result = pg_query_params($db, "UPDATE quiz SET name = $1, start_date = $2, end_date = $3 WHERE id = $4", array($name, $start_date, $end_date, $id));
  header("location: quiz.php");
}
?>
