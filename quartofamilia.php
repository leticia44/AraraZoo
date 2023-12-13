<?php
  include_once("templates/header.php");
?>

<link rel="stylesheet" href="css/quartofamilia.css">
<div class="quartofamilia">
  <div class="quartofamiliafoto">
    <img src="imgs/4.jpg"  width="550px">
  </div>
<div class="quartofamiliafoto">
        <img src="imgs/quartofamilia.jpg" class="fotodoquarto">
    </div>
    <div class="quartofamiliafoto">
        <img src="imgs/pacotefamilia.png" class="fotodoprecodoquarto">
    </div>
<br> <br> <br> <br> 
<form method="post" action="displayreservation.php">
<div class="quartocasalinput">
    <div>
    <h2> CHECK-IN:</h2>
    <input type="date" name="check-in" class="reservas"> <br>
</div>
<div>
    <h2> CHECK-OUT:</h2>
    <input type="date" name="checkout" class="reservas"> <br>
</div>
<div>
    <h2> PACOTE:</h2>
    <select id="reserva" name="pacote"  style="  height: 25px; width: 175px; border-radius: 15px; text-align: center; border: none;  ">
            <option value="basico">Pacote Básico</option>
            <option value="completo">Pacote Completo</option>
</select> <br> </div>

<button type="submit" id="reservarButton">RESERVAR</button>
</form>
</div>
</div>
<br> <br> <br> <br> <br> 

<?php
  include_once("templates/footer.php");
?>