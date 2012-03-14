<?
require_once "config.php";
require_once "bounce.php";

$agent_id = $_SESSION["agent_id"];
$id = $_POST["id"];
$quiz_id = $_POST["quiz_id"];
$business_id = $_POST["business"];
$question_body = $_POST["question_body"];
$active = isset($_POST["active"]) ? "true" : "false";
$correct = $_POST["correct"];

$db = getDb();
if ($id == "NEW") {
  $result = pg_query_params($db, "INSERT INTO question (id, quiz, business, body, sort, active, created, modified, modified_by) VALUES (DEFAULT, $1, $2, $3, $4, $5, now(), now(), $6) RETURNING id", array($quiz_id, $business_id, $question_body, 1, $active, $agent_id));
  $row = pg_fetch_row($result);
  $id = $row[0];
} else {
  $result = pg_query_params($db, "UPDATE question SET business = $1, sort = $2, active = $3, body = $4, modified = now(), modified_by = $5 WHERE id = $6", array($business_id, 1, $active, $question_body, $agent_id, $id));
}

/* insert any new non-blank answers */
for ($i = 1; $i <= 4; ++$i) {
  $answer_body = $_POST["add_answer$i"];
  if (isset($answer_body) && $answer_body != "") {
    $result = pg_query_params($db, "INSERT INTO possible_answer (id, question, body, correct, active, modified, modified_by) VALUES (DEFAULT, $1, $2, $3, true, now(), $4) RETURNING id", array($id, $answer_body, "false", $agent_id));
    $row = pg_fetch_row($result);
    $answer_id = $row[0];
    if ($correct == "new$i") {
      $correct = $answer_id;
    }
  }
}

/* update any pre-existing answers */
foreach (array_keys($_POST) as $post_key) {
  if (strpos($post_key, "answer_") === 0) {
    $answer_id = substr($post_key, 7);
    $active = isset($_POST["active_$answer_id"]) ? "true" : "false";
    $result = pg_query_params($db, "UPDATE possible_answer SET body = $1, active = $2, modified = now(), modified_by = $3 WHERE id = $4", array($_POST[$post_key], $active, $agent_id, $answer_id));
  }
}

/* make sure that only one answer has correct = t */
pg_query_params($db, "UPDATE possible_answer SET correct = (id = $1) WHERE question = $2", array($correct, $id));
header("location: question.php?quiz=$quiz_id");
?>
