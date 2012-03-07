<?
session_start();

if (!isset($_SESSION["agent_id"])) {
   header("location: login.php");
   exit();
}
?>