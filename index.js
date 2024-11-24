let elevTabell = [];

class Elever2024 {
  constructor(fornavn, etternavn, klasse) {
    this.fornavn = fornavn;
    this.etternavn = etternavn;
    this.klasse = klasse;
    this.trinn = this.elevTrinn(klasse);
  }

  elevTrinn(klasse) {
    if (klasse && klasse.length > 0) {
      return klasse.charAt(0);
    }
    return null; //Siste linje er tom veldig irriterende
  }
}

function tilFeldigVinner() {
  const date = new Date();
  const dag = date.getDate();
  const month = date.getMonth() + 1;  

  let vinner;
  let tall = Math.floor(Math.random() * elevTabell.length);
  vinner = elevTabell[tall];
  
  //if (dag === 18) {vinner = elevTabell.find(elev => elev.fornavn === "Vittorio"); } 
  return {
    fornavn: vinner.fornavn,
    etternavn: vinner.etternavn,
    klasse: vinner.klasse
  };
}

window.addEventListener("load", async () => {
  try {
    const response = await fetch("Elever2024.csv");
    const tekst = await response.text();

    const linje = tekst.split("\r\n");
    for (let i = 1; i < linje.length; i++) {
      let felt = linje[i].split(";");
      // Siste linje igjen, sikrer for minst 3 felt
      if (felt.length >= 3) {
        elevTabell.push(new Elever2024(felt[0], felt[1], felt[2]));
      } else {
        console.warn(`Skipper linje ${i} pågrunn av manglende felt`);
      }


    }
    const gave = document.querySelector(".gift-box");
    gave.addEventListener("click", async () => {
      const visVinner = document.querySelector(".present-name"); 
      const vinner = tilFeldigVinner(); 
      visVinner.textContent = `Den som vant var ${vinner.fornavn} ${vinner.etternavn}`;

      
      $.ajax({
        type: "POST",
        url: "lagreVinner.php", 
        data: {
          fornavn: vinner.fornavn,  
          etternavn: vinner.etternavn,
          klasse: vinner.klasse 
        }
      });
      
    });
  } catch (error) {
    console.error("Error", error);
  }
});

