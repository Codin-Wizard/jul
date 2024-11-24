<?php
require_once("_config.php");
$melding = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = strip_tags($_POST["inpBrukernavn"]);
    $passord = strip_tags($_POST["inpPassord"]);
    if ($brukernavn == "admin" && $passord == 'hemmelig') {
        $_SESSION["Rolle"] = "A";
        header("Location: ./index.php");
        die();
    } else {
        $melding = "Feil brukernavn eller passord";
    }
}
require_once("_Topp.php");
?>
<form action="login.php" method="post" id="login-form-container" class="login-form-container">
    <div class="login-form">
        <h2>Login</h2>
        <label for="username">Navn:</label>
        <input type="text" id="username" placeholder="Skriv ditt navn" name="inpBrukernavn">

        <label for="password">Passord:</label>
        <input type="password" id="password" placeholder="Skriv ditt passord" name="inpPassord">
        <p style="color:red;"><?php echo $melding; ?></p>

        <button type="submit" id="submit-login">Logg inn</button>
        <a href="./index.php"><button type="button" id="close-login">Lukk</button></a>
    </div>
</form>

<?php
require_once("_Bunn.php");
?>