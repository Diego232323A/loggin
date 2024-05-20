<?php
header('Content-Type: application/json');

// URL de la PokeAPI para obtener datos del Pokémon Ditto
$url = 'https://pokeapi.co/api/v2/pokemon/ditto';

// Realizar la solicitud HTTP a la PokeAPI
$response = file_get_contents($url);

// Verificar si la solicitud fue exitosa
if ($response === FALSE) {
    echo json_encode(['error' => 'No se pudo acceder a la PokeAPI']);
    exit();
}

// Convertir la respuesta JSON a un array asociativo de PHP
$data = json_decode($response, true);

// Devolver la respuesta en formato JSON
echo json_encode($data);
?>
