<?php
include_once("templates/header.php");
?>

<link rel="stylesheet" href="css/displayreservation.css">

<?php
include_once("templates/header.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkIn = $_POST["check-in"];
    $checkOut = $_POST["checkout"]; 
    $pacote = $_POST["pacote"];

    //  Calcular preço com base no pacote selecionado
    $dailyRate = ($pacote == "basico") ? 659.90 : 800.90;

    // Convert check-in and check-out dates to DateTime objects
    $checkInDate = new DateTime($checkIn);
    $checkOutDate = new DateTime($checkOut);

    // Calcular o número de dias
    $interval = $checkInDate->diff($checkOutDate);
    $numberOfDays = $interval->format('%a') + 1; // Add 1 to include check-out day

   // Calcular o preço total
    $preco = $numberOfDays * $dailyRate;

    // Exibir detalhes da reserva
    echo "<div class='reservation-details'>";

    echo "<h2>Reserva Confirmada</h2>";
    echo "<p><strong>Check-In:</strong> $checkIn</p>";
    echo "<p><strong>Check-Out:</strong> $checkOut</p>";
    echo "<p><strong>Tipo de Quarto:</strong> Familia</p>";
    echo "<p><strong>Pacote:</strong> $pacote</p>";
    echo "<p><strong>Diária:</strong> R$ " . number_format($dailyRate, 2, ',', '.') . "</p>";
    echo "<p><strong>Número de Dias:</strong> $numberOfDays</p>";
    echo "<p><strong>Preço Total:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";
    echo "<img src='imgs/quartofamilia.jpg' alt='Imgquarto1' class='reservation-image'>";

    echo "</div>";

    //  botão "Continuar" para redirecionar pra carrinho.php
    echo "<form method='post' action='carrinho.php'>";
    echo "<input type='hidden' name='checkIn' value='$checkIn'>";
    echo "<input type='hidden' name='checkOut' value='$checkOut'>";
    echo "<input type='hidden' name='pacote' value='$pacote'>";
    echo "<input type='hidden' name='dailyRate' value='$dailyRate'>";
    echo "<input type='hidden' name='numberOfDays' value='$numberOfDays'>";
    echo "<input type='hidden' name='preco' value='$preco'>";
    echo "<button type='submit'>Continuar</button>";
    echo "</form>";

} else {
    header("Location: quartofamilia.php");
    exit();
}

include_once("templates/footer.php");
?>

