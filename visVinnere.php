<?php
require_once("_config.php");
require_once("_Topp.php");
?>
 <div class="carousel">
      <div class="carousel__item carousel__item--visible">
        <img src="bilder/sleigh.png" />
      </div>
      <div class="carousel__item">
        <img src="bilder/snowflake.png" />
      </div>
      <div class="carousel__item">
        <img src="bilder/sleigh.png" />
      </div>

      <div class="carousel__actions">
        <button id="carousel__button--prev" aria-label="Previous slide"><</button>
        <button id="carousel__button--next" aria-label="Next slide">></button>
      </div>
    </div>
    <script src="./visVinnerAni.js"></script>
<?php
require_once("_Bunn.php");
?>