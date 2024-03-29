<?
/** These variables need to be configured for each installation of zedquiz. */
$DB_CONNECTION = "dbname=foo";
$PROJECT_ROOT = "/path/to/root/of/zedquiz";
$SMARTY = "/path/to/smarty/libs";

/** Things below this line probably do not need to be changed. */
require_once "$SMARTY/Smarty.class.php";

function getSmarty() {
    global $PROJECT_ROOT;
    $smarty = new Smarty();;
    $smarty->template_dir = "$PROJECT_ROOT/templates/";
    $smarty->compile_dir = "$PROJECT_ROOT/templates_c/";
    return $smarty;
}

function getDb() {
    global $DB_CONNECTION;
    return pg_pconnect($DB_CONNECTION);
}
?>
