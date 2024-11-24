window.addEventListener("load", async () => {

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
    try {
        const response = await fetch("vinnere.csv");
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
        console.log(elevTabell);
        
    } catch (error) {
        console.error("Error", error);
    }


//SLideshow
    let slidePosition = 0;
    const slides = document.getElementsByClassName('carousel__item');
    const totalSlides = slides.length;
    const next = document.getElementById('carousel__button--next')
    const prev = document.getElementById('carousel__button--prev')

    if (next) {
        next.addEventListener("click", function () {
            moveToNextSlide();
        });
    }

    if (prev) {
        prev.addEventListener("click", function () {
            moveToPrevSlide();
        });

    }

    function updateSlidePosition() {
        for (let slide of slides) {
            slide.classList.remove('carousel__item--visible');
            slide.classList.add('carousel__item--hidden');
        }

        slides[slidePosition].classList.add('carousel__item--visible');
    }

    function moveToNextSlide() {
        if (slidePosition === totalSlides - 1) {
            slidePosition = 0;
        } else {
            slidePosition++;
        }

        updateSlidePosition();
    }

    function moveToPrevSlide() {
        if (slidePosition === 0) {
            slidePosition = totalSlides - 1;
        } else {
            slidePosition--;
        }

        updateSlidePosition();
    }

});

