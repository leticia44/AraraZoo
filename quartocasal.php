<?php
    include_once("templates/header.php"); 
?>
<link rel="stylesheet" href="css/quartocasal.css">
<div class="quartocasal">
    <div class="quartocasalfoto">
        <img src="imgs/3.jpg" width="550px">
    </div>
    <div class="quartocasalfoto">
        <img src="imgs/quartocasal.jpg" class="fotodoquarto">
    </div>
    <div class="quartocasalfoto">
        <img src="imgs/pacotescasal.png" class="fotodoprecodoquarto">
    </div>
</div>
<br> <br> <br> <br> 
<form method="post" action="display_reservation.php">
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


