<?
require_once "config.php";
require_once "bounce.php";

$quiz_id = $_GET["quiz"];
$business_id = $_GET["business"];

if (!isset($quiz_id)) {
  die("Missing quiz_id");
}

$db = getDb();
$results = pg_query_params($db, "SELECT q.id, b.display_name AS business_name, q.body, q.active, q.modified, a.first_name, a.last_name
                                   FROM question q JOIN business b ON q.business = b.id JOIN agent a ON q.modified_by = a.id
                                  WHERE q.quiz = $1
                                  ORDER BY q.sort", array($quiz_id));
$questions = pg_fetch_all($results);

$answer_lists = array();
$results = pg_query_params($db, "SELECT q.id question_id, pa.id possible_answer_id, pa.body, pa.active, pa.correct
                                   FROM question q JOIN possible_answer pa ON pa.question = q.id
                                  WHERE q.quiz = $1", array($quiz_id));
foreach (pg_fetch_all($results) as $row) {
  $question_id = $row["question_id"];
  if (!array_key_exists($question_id, $answer_lists)) {
    $answer_lists[$question_id] = array();
  }
  $answer_lists[$question_id][] = array(
	"id" => $row["possible_answer_id"],
	"body" => $row["body"],
        "correct" => $row["correct"],
	"active" => $row["active"]);
}

$smarty = getSmarty();
$smarty->assign("questions", $questions);
$smarty->assign("answers", $answer_lists);
$smarty->assign("quiz_id", $quiz_id);
$smarty->display("admin/question.tpl");
?>
