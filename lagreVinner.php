<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mottar data fra AJAX-forespørselen
    $fornavn = strip_tags($_POST["fornavn"]) ;
    $etternavn = strip_tags($_POST["etternavn"]);
    $klasse = strip_tags($_POST["klasse"]);
    $dagensDato = date("Y.m.d");

    // Lag tekstformat for CSV-fil
    $nyTekst = $fornavn . ";" . $etternavn. ";" . $klasse . ";" . $dagensDato;

    
    $filnavn = "navn.csv";
    $overskrift = "Fornavn;Etternavn;Klasse;Dato";

    $nyFil = !file_exists($filnavn);//Sjekker om filen finnes
    //Åpne filen i Append modus (a) som legger til nye data på slutten av filen
    $fil = fopen($filnavn, 'a');
    
    if ($nyFil) {
        fwrite($fil, $overskrift . PHP_EOL);
    }

    // Skriv dataene til CSV-filen
    if (fwrite($fil, $nyTekst . PHP_EOL)) {
        echo "Vinneren er lagret";
    } else {
        echo "Feil ved lagring av vinneren";
    }
     
    // Lukk filen
    fclose($fil);
}
?>
