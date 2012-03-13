<?
require_once "config.php";
require_once "bounce.php";

$db = getDb();
$results = pg_query_params($db, "SELECT q.id, q.name, q.start_date, q.end_date, COUNT(question.*) AS questions 
                                   FROM quiz q LEFT OUTER JOIN question ON q.id = question.quiz 
                                  GROUP BY q.id, q.name, q.start_date, q.end_date ORDER BY start_date", array());


$smarty = getSmarty();
$smarty->assign("quizes", pg_fetch_all($results));
$smarty->display("admin/quiz.tpl");
?>
