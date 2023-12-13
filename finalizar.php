<?php
  include_once("templates/header.php");
?>

<?php

function getCardBrand($cardNumber) {
    
    return 'visa';
}


$cardNumberPlaceholder = '** ** ** 1234';
$cardNamePlaceholder = 'John Doe';
$cardValidPlaceholder = '12/23';
?>



<style>
    * {
  margin: 0;
  padding: 0;
}
.card {
    box-sizing: border-box;
    width: 300px;
    height: 180px;
    background:#BFCFF9;  
    border-radius: 10px;
    color: black;
    font-family: 'Jura', sans-serif;
    padding: 20px;
    position: relative;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
  }
  
  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }
  
  .card-number {
    position: absolute;
    bottom: 60px;
    left: 20px;
    font-size: 20px;
  }
  
  .card-name {
    position: absolute;
    bottom: 30px;
    left: 20px;
    font-size: 15px;
  }
  
  .card-valid {
    position: absolute;
    bottom: 30px;
    right: 20px;
    font-size: 15px;
  }
  .card-brand {
        width: 50px;
        height: 30px;
        position: absolute;
        top: 10px;
        left: 10px;
      }
  
      .live-update {
        margin-top: 20px;
      }
      .forms1 {
    padding: 10px;
    margin-top: -0px;
    display: block;
    margin-bottom: -5px;
    background-color: #BFCFF9;
    border-radius: 15px;
    font-size: 16px;
    border: none;
    width: 400px;
    
  }
  .forms{
    margin: 0 auto; /* Center the form horizontally */
        width: 60%; /* Adjust the width as needed */
        padding: 20px; /* Add padding for better appearance */
        border-radius: 15px;
        font-size: 16px;
        border: none;
        margin-top: 50px; /* Adjust the margin-top as needed */
   
  
  }
  
  .live-update {
    margin: 0 auto;
    width: 360px;
  }
  
  h2 {
      font-size: 22px;
      font-family: 'Jura', sans-serif;
    }
  
    button{
    display: block;
    margin-left: auto;
    margin-right: auto;
    background-color: #2E57C0;
    margin-top: 20px;
    border-radius: 20px;
    width: 200px;
    white-space: nowrap;
    height: 40px;
    font-size: 15px;
    color: white;
    font-family:'Jura', sans-serif;
    border: none;
}

.titulo{
    margin-top: 100px;
    margin-bottom:70px;
    font-size: 20px !important;

}

</style>
<div class="titulo"> 
<h1> <center> Continuar Compra </center> </h1> </div>
<form class="forms">

  <div style="display: flex; justify-content: space-between;">
    <div>
      <h2> Nome no cartão:</h2>
      <input type="text" name="card_name" id="cardNameInput" class="forms1"> <br> 
      <h2> Número do cartão: </h2>
      <input type="text" name="card_number" id="cardNumberInput" class="forms1"><br>
      <h2>Parcela: </h2>
      <select name="card_parcel" id="cardParcelInput" class="forms1">
        <?php for ($i = 1; $i <= 6; $i++): ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?>x sem juros</option>
        <?php endfor; ?>
      </select><br>
    </div>
       
   
    <div>
     <h2> Data de validade: </h2>
     <input type="text" name="card_valid" id="cardValidInput" class="forms1"><br>
      <h2> CVC: </h2>
       <input type="text" name="card_code" id="cardCodeInput" class="forms1"><br>
    </div>
  </div>

<?php

$cardBrand = getCardBrand($cardNumberPlaceholder);
?>

<div class="live-update card" id="liveUpdateCard">
  <img class="card-brand" src="path/to/<?php echo $cardBrand; ?>.png" alt="Card Brand">
  <div class="card-number"><?php echo $cardNumberPlaceholder; ?></div>
  <div class="card-name"><?php echo $cardNamePlaceholder; ?></div>
  <div class="card-valid">Validade: <?php echo $cardValidPlaceholder; ?></div>
</div>

<!-- <button type="button" href="obrigadaArara">Finalizar Compra</button> -->

<button type="button" onclick="location.href='obrigadaArara.php'">Finalizar Compra</button>
</form>
<br> <br>

 
<script>
  
  function updateCard() {
    const cardNumberInput = document.getElementById('cardNumberInput');
    const cardNumber = cardNumberInput.value;
    const cardName = document.getElementById('cardNameInput').value;
    const cardValid = document.getElementById('cardValidInput').value;

    const liveUpdateCard = document.getElementById('liveUpdateCard');
    const cardBrandImage = liveUpdateCard.querySelector('.card-brand');
    const cardNumberDiv = liveUpdateCard.querySelector('.card-number');

    cardNumberDiv.textContent = cardNumber;

    
    const firstDigit = cardNumber.charAt(0);
    switch (firstDigit) {
      case '3':
        case '7':
        cardBrandImage.src = 'imgs/americam.png'; 
        break;
      case '4':
      case '2':
      case '9':
        cardBrandImage.src = 'imgs/visa.png'; 
        break;
      case '5':
        case'1':
        cardBrandImage.src = 'imgs/mastercard.png'; 
        break;
      case '6':
        case '8':
        case '0':
        cardBrandImage.src = 'imgs/elo.png'; 
        break;
      default:
        cardBrandImage.src = 'imgs/visa.png'; 
    }
    // Defina o tamanho da imagem
    cardBrandImage.style.width = '100px';
    cardBrandImage.style.height = '50px';

    // Update card name and valid date
    liveUpdateCard.querySelector('.card-name').textContent = cardName;
    liveUpdateCard.querySelector('.card-valid').textContent = 'Validade: ' + cardValid;
  }

  // Function to clear the form
  function clearForm() {
    document.getElementById('cardForm').reset();
    updateCard(); // Update the card after clearing the form
  }

  // Add event listeners to input fields for live updating
  const formInputs = document.querySelectorAll('input[type="text"]');
  formInputs.forEach(input => {
    input.addEventListener('input', updateCard);
  });

  // Update the card on page load
  updateCard();
</script>



<?php
  include_once("templates/footer.php");
?>
