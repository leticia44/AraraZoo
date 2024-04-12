<?php
session_start();
include_once("templates/header.php");

// Definindo o valor padrão para a reserva
if (isset($_POST['preco'])) {
    $_SESSION['valorReserva'] = $_POST['preco'];
} else if (!isset($_SESSION['valorReserva'])) {
    $_SESSION['valorReserva'] = "0.00";
}
?>

<link rel="stylesheet" href="css/carrinho.css">
<link rel="stylesheet" href="css/carrinhojs.css">
</head>
<body>
<br>
<br>

<div class="titulo">
             <center>   <img src="imgs/carrinho.jpg" width="450px" /> </center>
            </div>
    <style>
  
    </style>
</head>
<body>

<div id="carrinho">
    <!-- O carrinho será preenchido dinamicamente -->
</div>
<p>Total: R$ <span id="total">0.00</span></p>

<!-- Exibição do valor da reserva -->
<?php if (isset($_POST['finalizarCompra'])) : ?>
    <p>Valor da Reserva: R$ 0.00</p>
<?php else : ?>
    <p> Valor da Reserva: R$ <span id="valorReserva"> <?php echo number_format((float)$_SESSION['valorReserva'], 2, ',', '.'); ?> </p>
<?php endif; ?>
<!-- Exibição do valor total (produtos + reserva) -->
<!-- <p>Total Geral: R$ <span id="totalGeral">0.00</span></p> -->
<button class="esvaziar-carrinho" onclick="esvaziarCarrinho();limparReserva()">Esvaziar Carrinho</button>
<script>
    window.onload = function() {
        carregarCarrinho();
    };

    function carregarCarrinho() {
        const container = document.getElementById('carrinho');
        container.innerHTML = '';

        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        let total = 0;

        if (carrinho.length === 0) {
            container.innerHTML = '<p>Carrinho vazio</p>';
        } else {
            carrinho.forEach((item, index) => {
                const div = document.createElement('div');
                div.classList.add('produto');
                div.innerHTML = `<p>${item.nome} - R$ ${item.preco.toFixed(2)}</p>
                            <button class="remover-carrinho" onclick="removerProduto(${index})">Remover do Carrinho</button>`;
                container.appendChild(div);
                total += item.preco;
            });
        }

        const totalElement = document.getElementById('total');
        totalElement.textContent = total.toFixed(2);
    }

    function esvaziarCarrinho() {
        localStorage.removeItem('carrinho');
        carregarCarrinho();
        alert('Carrinho esvaziado!');
        
    }

    function removerProduto(index) {
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

        if (index >= 0 && index < carrinho.length) {
            carrinho.splice(index, 1);
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            carregarCarrinho();
            alert('Produto removido do carrinho!');
        }
    }

    function finalizarCompra() {
        localStorage.removeItem('carrinho'); // Limpa o carrinho removendo o item 'carrinho' do localStorage
        carregarCarrinho(); // Atualiza a exibição do carrinho para refletir a remoção dos itens
        alert('Compra finalizada!');
    }
</script>
<body>

<?php
function getCardBrand($cardNumber)
{
    return 'visa';
}


$cardNumberPlaceholder = '** ** ** 1234';
$cardNamePlaceholder = 'John Doe';
$cardValidPlaceholder = '12/23';
?>

<form class="forms" method="post" action="obrigadaArara.php">
    <div style="display: flex; justify-content: space-between;">
        <div>
            <h2> Nome no cartão:</h2>
            <input type="text" name="card_name" id="cardNameInput" class="forms1"> <br>
            <h2> Número do cartão: </h2>
            <input type="text" name="card_number" id="cardNumberInput" class="forms1"><br>
            <h2>Parcela: </h2>
            <select name="card_parcel" id="cardParcelInput" class="forms1">
                <?php for ($i = 1; $i <= 6; $i++) : ?>
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

        <!-- Botão "Finalizar Compra" -->
        <!-- Botão "Finalizar Compra" -->
        <input type="hidden" name="preco" value="<?php echo $_SESSION['valorReserva']; ?>">
    <button type="submit" name="finalizarCompra" onclick="window.location.href='obrigadaArara.php';">Finalizar Compra</button>
</form>
  </form>
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