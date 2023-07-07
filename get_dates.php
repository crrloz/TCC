<?php
// Lógica para recuperar as datas e URLs do banco de dados e retornar em formato JSON

// Exemplo de dados fictícios
$dates = array(
  array('data' => '2023-07-01', 'url' => 'pagina1.html'),
  array('data' => '2023-07-05', 'url' => 'pagina2.html')
);

header('Content-Type: application/json');
echo json_encode($dates);