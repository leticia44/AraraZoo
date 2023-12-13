<?php
    include_once("templates/header.php"); 
?>
<link rel="stylesheet" href="css/agende.css">
<div class="planodefundo">
  <img src="imgs/ararazoohotelbranca.png" class="logosemfundo">
  <video autoplay loop muted plays-inline class="back-video">
    <source src="imgs/videoarara.mp4" type="video/mp4">
  </video>
</div>
<div class="reservesua">
  <img src="imgs/reserva.jpg" class="reservesuaimg">
</div>
<div class="body">
    <div class="card">
        <div class="img-box">
        <a href="<?= $BASE_URL ?>quartocasal.php"><img src="imgs/quartocasal.jpg"></a>
        </div>
        <div class="content">
        <a href="<?= $BASE_URL ?>quartocasal.php"><img src="imgs/preçoquartocasal.png" width="525px"></a>
        </div>
    </div>
</div>
<div class="body">
    <div class="card">
        <div class="img-box">
        <a href="<?= $BASE_URL ?>quartofamilia.php"><img src="imgs/quartofamilia.jpg"></a>
        </div>
        <div class="content">
        <a href="<?= $BASE_URL ?>quartofamilia.php"><img src="imgs/preçoquartofamilia.png" width="525px"></a>
        </div>
    </div>
</div>
<?php
  include_once("templates/footer.php");
?>
