<?
require_once "config.php";
require_once "bounce.php";

$agent_id = $_SESSION["agent_id"];
$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$active = isset($_POST["active"]) ? "true" : "false";
$clear_login_failures = $_POST["clear_login_failures"];

$db = getDb();
if ($id == "NEW") {
  $result = pg_query_params($db, "INSERT INTO agent (id, first_name, last_name, email, username, password, active, created, modified, modified_by) VALUES (DEFAULT, $1, $2, $3, $4, crypt($5, gen_salt('md5')), $6, now(), now(), $7)", array($first_name, $last_name, $email, $username, $password, $active, $agent_id));
  header("location: agent.php");
} else {
  if ($password != "") {
    $result = pg_query_params($db, "UPDATE agent SET password_hash = crypt($1, gen_salt('md5')), modified = now(), modified_by = $2 WHERE id = $3", array($password, $agent_id, $id));
  }
  if (isset($clear_login_failures)) {
    $result = pg_query_params($db, "UPDATE agent SET login_failures = NULL, modified = now(), modified_by = $1 WHERE id = $2", array($agent_id, $id));
  }
  $result = pg_query_params($db, "UPDATE agent SET first_name = $1, last_name = $2, username = $3, email = $4, active = $5, modified = now(), modified_by = $6 WHERE id = $7", array($first_name, $last_name, $username, $email, $active, $agent_id, $id));
  header("location: agent.php");
}
?>
