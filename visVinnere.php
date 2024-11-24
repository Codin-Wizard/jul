<?php
require_once("_config.php");
require_once("_Topp.php");
?>
<style>
.carousel-container {
            width: 80%;
            margin: 50px auto;
            overflow: hidden;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            background-color: #fff;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease;
        }

        .box {
            min-width: calc(100% / 4);
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            background-color: #e63946; /* Julerød farge */
            color: #fff;
            border: 2px solid #f1faee;
            border-radius: 10px;
            margin: 10px;
            background-image: url('https://i.imgur.com/ZNjBQMG.png'); /* Snøfnugg bakgrunn */
            background-size: cover;
            background-blend-mode: screen;
        }

        .box h3 {
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #f1faee;
        }

        .present-name {
            font-size: 1em;
            margin-bottom: 5px;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2em;
            color: #457b9d;
            background-color: #fff;
            border: 2px solid #457b9d;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
        }

        .arrow.left {
            left: 10px;
        }

        .arrow.right {
            right: 10px;
        }
    </style>
<div class="carousel-container">
    <div class="carousel" id="carousel">
       
    </div>
    <div class="arrow left" id="prev">&#10094;</div>
    <div class="arrow right" id="next">&#10095;</div>
</div>

    <script>
        const carousel = document.getElementById('carousel');

        for (let i = 1; i < 25; i++) {
       /* const giftBox = document.createElement('div')
        giftBox.classList.add('gift-box-vinner')
        const lid = document.createElement('div')
        lid.classList.add('lid-vinner')
        const bow = document.createElement('div')
        bow.classList.add('bow-vinner')
*/
        const box = document.createElement('div')
        box.classList.add('box')

        const overskrift = document.createElement('h3')
        overskrift.textContent = `Boks ${i}`

        const trinn1Vinner = document.createElement('div')
        trinn1Vinner.textContent = 'navn1'
        trinn1Vinner.classList.add('present-name')

        const trinn2Vinner = document.createElement('div')
        trinn2Vinner.textContent = 'navn2'
        trinn2Vinner.classList.add('present-name')

        const trinn3Vinner = document.createElement('div')
        trinn3Vinner.textContent = 'navn2'
        trinn3Vinner.classList.add('present-name')

        lid.appendChild(bow)
        box.append(overskrift, trinn1Vinner, trinn2Vinner, trinn3Vinner)
       // giftBox.append(lid, box)
        carousel.append(box)
    }


        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        let currentIndex = 0;

        // Antall bokser
        const totalBoxes = 24;
        const boxesToShow = 4; // Hvor mange bokser som vises om gangen

        function updateCarousel() {
            const boxWidth = carousel.children[0].offsetWidth;
            carousel.style.transform = `translateX(-${currentIndex * boxWidth}px)`;
        }

        next.addEventListener('click', () => {
            if (currentIndex < totalBoxes - boxesToShow) {
                currentIndex++;
                updateCarousel();
            }
        });

        prev.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });
    </script>
<?php
require_once("_Bunn.php");
?>