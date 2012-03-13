<?
require_once "config.php";
require_once "bounce.php";

$id = $_POST["id"];
$display_name = $_POST["display_name"];
$display_email = $_POST["display_email"];
$display_url = $_POST["display_url"];
$display_phone = $_POST["display_phone"];
$blurb = $_POST["blurb"];
$facebook_url = $_POST["facebook_url"];
$twitter_handle = $_POST["twitter_handle"];
$logo_url = $_POST["logo_url"];
$logo_width = $_POST["logo_width"];
$logo_height = $_POST["logo_height"];
$company_name = $_POST["company_name"];
$contact_person = $_POST["contact_person"];
$contact_email = $_POST["contact_email"];
$contact_phone = $_POST["contact_phone"];
$postal_address = $_POST["postal_address"];
$postal_city = $_POST["postal_city"];
$postal_postcode = $_POST["postal_postcode"];
$region = $_POST["region"];
$agent_id = $_SESSION["agent_id"];

/* in some cases we allow blanks and convert them to NULL in the DB */
if ($logo_width == "") { $logo_width = null; }
if ($logo_height == "") { $logo_height = null; }
if ($logo_url == "") { $logo_url = null; }

$db = getDb();
if ($id == "NEW") {
  $result = pg_query_params($db, "INSERT INTO business (id, display_name, display_email, display_url, display_phone, blurb, facebook_url, twitter_handle, logo_url, logo_width, logo_height, company_name, contact_person, contact_email, contact_phone, postal_address, postal_city, postal_postcode, region, modified_by, created, modified) VALUES (DEFAULT, $1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19, now(), now())", array($display_name, $display_email, $display_url, $display_phone, $blurb, $facebook_url, $twitter_handle, $logo_url, $logo_width, $logo_height, $company_name, $contact_person, $contact_email, $contact_phone, $postal_address, $postal_city, $postal_postcode, $region, $agent_id));
} else {
  $result = pg_query_params($db, "UPDATE business SET display_name = $1, display_email = $2, display_url = $3, display_phone = $4, blurb = $5, facebook_url = $6, twitter_handle = $7, logo_url = $8, logo_width = $9, logo_height = $10, company_name = $11, contact_person = $12, contact_email = $13, contact_phone = $14, postal_address = $15, postal_city = $16, postal_postcode = $17, region = $18, modified_by = $19, modified = now() WHERE id = $20",  array($display_name, $display_email, $display_url, $display_phone, $blurb, $facebook_url, $twitter_handle, $logo_url, $logo_width, $logo_height, $company_name, $contact_person, $contact_email, $contact_phone, $postal_address, $postal_city, $postal_postcode, $region, $agent_id, $id));
}
header("location: business.php");
?>
