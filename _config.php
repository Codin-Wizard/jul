<?php 
session_start();
if(!isset($_SESSION["Rolle"]))
    $_SESSION["Rolle"] = "";
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$rot = "/Ovelser/Eksempelweb/";
function beskyttSide($rolle) {
    global $rot;
    if($_SESSION["Rolle"]!= $rolle) {
        header("Location: ".$rot."login.php");
        die();
    }
}
?>