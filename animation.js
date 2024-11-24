
const lid = document.getElementById("lid");
const boxBody = document.getElementById("box-body");
const presentName = document.getElementById("present-name");
const giftBox = document.getElementById("gift-box");
const fallingSnow = document.getElementById("falling-snow");

function openGiftBox() {
  lid.style.transform = "translateY(-100px) rotate(10deg)";
  lid.style.transition = "transform 0.5s ease-out";
  presentName.style.display = "block"; // Show the name inside
  presentName.style.opacity = "1";
}
if (giftBox) {
  giftBox.addEventListener("click", () => {
    openGiftBox();
  });
  
}

const menu = document.getElementById("menu");
const sideMenu = document.getElementById("side-menu");

function toggleMenu() {
  if (sideMenu.style.display === "none" || sideMenu.style.display === "") {
    sideMenu.style.display = "block"; // Vis menyen
    menu.style.color = 'white';
  } else {
    sideMenu.style.display = "none"; // Skjul menyen
    menu.style.color = 'black';
  }
}

// Åpne menyen når hamburger-ikonet klikkes
menu.addEventListener("click", toggleMenu);

document.addEventListener("click", (event) => {
  if (!sideMenu.contains(event.target) && !menu.contains(event.target)) {
    sideMenu.style.display = "none"; 
    menu.style.color = 'black';
  }
});

function createSnowflakes() {
  for (let i = 0; i < 150; i++) {
    const snowflake = document.createElement("div");
    snowflake.classList.add("snowflake-bilde");

    const bilde = document.createElement("img");
    bilde.src = "./bilder/snowflake.png";
    snowflake.appendChild(bilde);

    snowflake.style.left = `${Math.random() * window.innerWidth}px`;

    const size = Math.random() * 10 + 5;

    snowflake.style.width = `${size}px`;
    snowflake.style.height = `${size}px`;
    bilde.style.width = "100%";
    bilde.style.height = "100%";

    snowflake.style.animationDuration = `${Math.random() * 3 + 2}s`; // Between 2s and 5s

    const horizontalShift = Math.random() * 100 - 50; // Random shift between -50px and 50px
    snowflake.style.setProperty("--translateX", `${horizontalShift}px`);
    fallingSnow.append(snowflake);
  }
  for (let i = 0; i < 50; i++) {
    const snowflakeRound = document.createElement("div");
    snowflakeRound.classList.add("snowflake");

    snowflakeRound.style.left = `${Math.random() * window.innerWidth}px`;
    const size = Math.random() * 10 + 5;
    snowflakeRound.style.width = `${size}px`;
    snowflakeRound.style.height = `${size}px`;

    snowflakeRound.style.animationDuration = `${Math.random() * 3 + 2}s`; // Between 2s and 5s

    const horizontalShift = Math.random() * 100 - 50; // Random shift between -50px and 50px
    snowflakeRound.style.setProperty("--translateX", `${horizontalShift}px`);
    fallingSnow.append(snowflakeRound);
  }
}

//Slede
let movingRight = true;

function resetAnimation(santa) {
  santa.style.animation = "none";
  santa.offsetHeight;
  santa.style.animation = "";
}

function direction(santa, index) {
  resetAnimation(santa);
  const container = document.querySelector(".sleigh");
  if (movingRight) {
    santa.classList.remove(`santa${index}`);
    santa.classList.add(`santa${index}-flip`);
    container.classList.add("flip");
  } else {
    santa.classList.remove(`santa${index}-flip`);
    santa.classList.add(`santa${index}`);
    container.classList.remove("flip");
  }
}

const santas = document.querySelectorAll(
  ".santa0, .santa1, .santa2, .santa3, .santa4, .santa5"
);
setInterval(() => {
  santas.forEach((santa, index) => direction(santa, index));
  movingRight = !movingRight;
}, 16000);

window.addEventListener("load", createSnowflakes);
