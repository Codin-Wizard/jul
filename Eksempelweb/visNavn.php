<?php 
    require_once("_config.php");

    require_once("_Topp.php");
 ?>
<h2>Utliste navn</h2>
<table>
    <thead>
        <tr>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Lagringsdato</th>
        </tr>
    </thead>
    <tbody id="rader"></tbody>
</table>
<script>
    class Elev {
        constructor(fornavn, etternavn, dato) {
            this.fornavn = fornavn;
            this.etternavn = etternavn;
            this.dato = dato;
        }
    }
    var elevTab = [];
    async function body_onload() {
        var response = await fetch("navn.csv");
        var tekst = await response.text();
        var linje = tekst.split("\n");
        for (let i = 0; i < linje.length; i++) {
           var felt = linje[i].split(";");
            elevTab.push(new Elev(felt[0],felt[1],felt[2]));
        }
        visNavn();
    }
    function visNavn() {
        for (let i = 0; i < elevTab.length; i++) {
            let tabell = document.getElementById("rader");
            let  nyrad = tabell.insertRow();
            let celle1 = nyrad.insertCell(0);
            let celle2 = nyrad.insertCell(1);
            let celle3 = nyrad.insertCell(2);
            celle1.textContent = elevTab[i].fornavn;
            celle2.textContent = elevTab[i].etternavn;
            celle3.textContent = elevTab[i].dato;
        }
    }
    body_onload();
</script>
<?php 
    require_once("_Bunn.php");
 ?>