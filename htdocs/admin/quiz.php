<?
require_once "config.php";
require_once "bounce.php";

$db = getDb();
$results = pg_query_params($db, "SELECT q.id, q.name, q.start_date, q.end_date, COUNT(question.*) AS questions, q.modified, a.first_name, a.last_name
                                   FROM quiz q LEFT OUTER JOIN question ON q.id = question.quiz 
                                        JOIN agent a ON q.modified_by = a.id
                                  GROUP BY q.id, q.name, q.start_date, q.end_date, q.modified, a.first_name, a.last_name ORDER BY start_date", array());


$smarty = getSmarty();
$smarty->assign("quizes", pg_fetch_all($results));
$smarty->display("admin/quiz.tpl");
?>
