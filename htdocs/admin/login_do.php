<?
require_once "config.php";

$username = $_POST["username"];
$password = $_POST["password"];

$db = getDb();
$result = pg_query_params($db, 'SELECT id, first_name, last_name, crypt($1, password_hash) = password_hash AS success, login_failures FROM agent WHERE username = $2 AND active = true', array($password, $username));
$rows = pg_fetch_all($result);
if (!$rows) {
  header("location: login.php?mode=retry");
} else if ($rows[0]["login_failures"] > 3) {
  header("location: login.php?mode=toomanyfailures");
} else if ($rows[0]["success"] == "f") {
  pg_query_params($db, 'UPDATE agent SET login_failures = COALESCE(login_failures, 0) + 1 WHERE username = $1', array($username));
  header("location: login.php?mode=retry");
} else {
  $agent_id = $rows[0]["id"];
  pg_query_params($db, 'UPDATE agent SET last_login = now(), login_failures = NULL WHERE id = $1', array($agent_id));
  session_start();
  $_SESSION["agent_id"] = $agent_id;
  $_SESSION["agent_first_name"] = $rows[0]["first_name"];
  $_SESSION["agent_last_name"] = $rows[0]["last_name"];
  header("location: overview.php");
}
?>
