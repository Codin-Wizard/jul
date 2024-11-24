<?php 
    require_once("_config.php");
    beskyttSide("A");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $fornavn = strip_tags($_POST["fornavn"]);
        $etternavn = strip_tags($_POST["etternavn"]);
        $dagensDato = date("Y.m.d");

        $nyTekst = $fornavn.";".$etternavn.";".$dagensDato;
        //Åpne filen i Append modus (a) som legger til nye data på slutten av filen
        $fil = fopen("navn.csv",'a');
        //Legg til ny tekst etterfulgt av en ny linje
        echo fwrite($fil, $nyTekst."\n");  //PHP_EOL la på både \r\n
    }
    require_once("_Topp.php");
 ?>
<h2>Registrere navn</h2>
<form action="regNavn.php" method="post">
    <table>
        <tr>
            <td>Fornavn:</td>
            <td><input type="text" name="fornavn"></td>
        </tr>
        <tr>
            <td>Etternavn:</td>
            <td>
                <input type="text" name="etternavn">
                <input type="submit" value="Lagre">
            </td>
        </tr>
    </table>

</form>
<?php 
    require_once("_Bunn.php");
 ?>