
<?php
include_once("templates/header.php");
include_once("conexao.php");

?>

<link rel="stylesheet" href="css/display_reservation.css">

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkIn = $_POST["check-in"];
    $checkOut = $_POST["checkout"]; 
    $pacote = $_POST["pacote"];
    

    //  Calcular preço com base no pacote selecionado
    $dailyRate = ($pacote == "basico") ? 549.90 : 700.90;

  
    $checkInDate = new DateTime($checkIn);
    $checkOutDate = new DateTime($checkOut);

    // Calcular o número de dias
    $interval = $checkInDate->diff($checkOutDate);
    $numberOfDays = $interval->format('%a') + 1; //  incluir o dia de check-out

    // Calcular o preço total
    $preco = $numberOfDays * $dailyRate;

    
    // Inserir dados no banco de dados
    $sql = "INSERT INTO reservas (checkIn, checkOut, pacote, dailyRate, numberOfDays, preço)
            VALUES ('$checkIn', '$checkOut', '$pacote', '$dailyRate', '$numberOfDays', '$preco')";

    if ($conexao->query($sql) === TRUE) {
        echo "";
    } else {
        echo "" . $conexao->error;
    }
    

    // Exibir detalhes da reserva
    echo "<div class='reservation-details'>";

    echo "<h2>Reserva Confirmada</h2>";
    echo "<p><strong>Check-In:</strong> $checkIn</p>";
    echo "<p><strong>Check-Out:</strong> $checkOut</p>";
    echo "<p><strong>Tipo de Quarto:</strong> Casal</p>";
    echo "<p><strong>Pacote:</strong> $pacote</p>";
    echo "<p><strong>Diária:</strong> R$ " . number_format($dailyRate, 2, ',', '.') . "</p>";
    echo "<p><strong>Número de Dias:</strong> $numberOfDays</p>";
    echo "<p><strong>Preço Total:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";
    echo "<img src='imgs/quartocasal.jpg' alt='Imgquarto1' class='reservation-image'>";

    echo "</div>";


    // Botão "Continuar para o Carrinho" para redirecionar para carrinho.php
    echo "<form method='post' action='carrinho.php'>";
    echo "<input type='hidden' name='checkIn' value='$checkIn'>";
    echo "<input type='hidden' name='checkOut' value='$checkOut'>";
    echo "<input type='hidden' name='pacote' value='$pacote'>";
    echo "<input type='hidden' name='dailyRate' value='$dailyRate'>";
    echo "<form method='post' action='carrinho.php'>";
    echo "<input type='hidden' name='preco' value='$preco'>";
    echo "<button type='submit'>Continuar para o Carrinho</button>";
    echo "</form>";
    

} else {
    header("Location: quartocasal.php");
    exit();
}

include_once("templates/footer.php");
?>