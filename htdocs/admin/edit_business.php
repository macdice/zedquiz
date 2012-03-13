<?
require_once "config.php";
require_once "bounce.php";

$business_id = $_GET["id"];
$db = getDb();
$smarty = getSmarty();
if (isset($business_id)) {
   $result = pg_query_params($db, "SELECT id, display_name, display_phone, display_email, display_url, blurb, facebook_url, twitter_handle, logo_url, logo_width, logo_height, company_name, contact_person, contact_email, contact_phone, postal_address, postal_city, postal_postcode, region, modified_by, created, modified FROM business WHERE id = $1", array($business_id));
   $rows = pg_fetch_all($result);
   $smarty->assign("id", $business_id);
   $smarty->assign("record", $rows[0]);
} else {
  $smarty->assign("id", "NEW");
}

$result = pg_query($db, "SELECT id, name FROM region ORDER BY name");
$region_values = array();
$region_output = array();
foreach (pg_fetch_all($result) as $row) {
   $region_values[] = $row["id"];
   $region_output[] = $row["name"];
}
$smarty->assign("region_values", $region_values);
$smarty->assign("region_output", $region_output);
$smarty->display("admin/edit_business.tpl");
?>
