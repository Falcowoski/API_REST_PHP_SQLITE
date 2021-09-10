<?php

require '../vendor/autoload.php';

use App\SQLiteConnection;
use App\SQLiteQuery;

$pdo = (new SQLiteConnection())->connect(); // Inicializa a conexão com o banco de dados

// if($pdo != null) {
//     echo 'A conexão com o banco de dados SQLite foi realizada com sucesso!';
// } else {
//     echo 'Não foi possível se conectar ao banco de dados SQLite!';
// }