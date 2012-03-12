<?
require_once "config.php";

$username = $_POST["username"];
$password = $_POST["password"];

$db = getDb();
$result = pg_query_params($db, 'SELECT id, first_name, last_name FROM agent WHERE username = $1 AND password = crypt($2, password)', array($username, $password));
$rows = pg_fetch_all($result);
if (!$rows) {
  header("location: login.php");
} else {
  $agent_id = $rows[0]["id"];
  pg_query_params($db, 'UPDATE agent SET last_seen = now() WHERE id = $1', array($agent_id));
  session_start();
  $_SESSION["agent_id"] = $agent_id;
  $_SESSION["agent_first_name"] = $rows[0]["first_name"];
  $_SESSION["agent_last_name"] = $rows[0]["last_name"];
  header("location: overview.php");
}
?>
