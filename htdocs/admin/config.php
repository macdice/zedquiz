<?
/** These variables need to be configured for each installation of NZQUIZ. */
$DB_CONNECTION = "dbname=nzquiz user=postgres password=postgres";
$PROJECT_ROOT = "/Users/oliverbridgman/Desktop/NZQUIZ";

/** Things below this line probably do not need to be changed. */
require_once "../../libs/Smarty.class.php";

function getSmarty() {
    global $PROJECT_ROOT;
    $smarty = new Smarty();;
    $smarty->setTemplateDir("$PROJECT_ROOT/templates/");
    $smarty->setCompileDir("$PROJECT_ROOT/templates_c/");
    return $smarty;
}

function getDb() {
    global $DB_CONNECTION;
    return pg_pconnect($DB_CONNECTION);
}
?>