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
        <select id="reserva" name="pacote" style="height: 25px; width: 175px; border-radius: 15px; text-align: center; border: none;">
          <option value="basico">Pacote Básico</option>
          <option value="completo">Pacote Completo</option>
        </select> <br> 
      </div>
      <input type="hidden" id="valorReserva" name="valorReserva"> <!-- Campo oculto para o valor da reserva -->
      <input type="hidden" id="numeroDias" name="numeroDias"> <!-- Campo oculto para o número de dias -->
      <button type="submit" id="reservarButton">RESERVAR</button>
    </div>
  </form>
</div>
<br> <br> <br> <br> <br> 

<script>
  function calcularValoresERedirecionar() {
    const checkin = new Date(document.getElementById('checkin').value);
    const checkout = new Date(document.getElementById('checkout').value);

    const diffEmMS = Math.abs(checkout - checkin);
    const diffEmDias = Math.ceil(diffEmMS / (1000 * 60 * 60 * 24));

    let valorReserva = 0;

    // Definição dos valores dos pacotes
    const pacoteSelecionado = document.getElementById('reserva').value;
    if (pacoteSelecionado === 'basico') {
      valorReserva = 659.90 * diffEmDias;
    } else if (pacoteSelecionado === 'completo') {
      valorReserva = 800.90 * diffEmDias;
    }

    // Atualizando campos ocultos com os valores calculados
    document.getElementById('valorReserva').value = valorReserva;
    document.getElementById('numeroDias').value = diffEmDias;

    // Enviar o formulário para a página do carrinho
    document.querySelector('form').submit();
  }
</script>



<?php
  include_once("templates/footer.php");
?>