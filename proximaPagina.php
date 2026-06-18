<?php

    $meioLocomocao = $_POST['meioLocomocao'];
    $tempoFaculdade = $_POST['tempoFaculdade'];
    $veiculoProprio = $_POST['veiculoProprio'];
    $tempoDestino = $_POST['tempoDestino'];

    echo "Meio de Locomoção: " . $meioLocomocao . "<br>";
    echo "Tempo de Deslocamento até a Faculdade: " . $tempoFaculdade . "<br>";
    echo "Veículos Próprios: " . $veiculoProprio . "<br>";
    echo "Tempo no Transporte até o Destino: " . $tempoDestino . "<br>";

?>