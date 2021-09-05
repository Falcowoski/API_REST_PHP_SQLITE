<?php

include('../public/index.php');

use App\SQLiteQuery;

echo '<br/> Hello!';

$sqlite = new SQLiteQuery($pdo); // Criação do objeto SQLiteQuery

if(isset($_GET['type']) && isset($_GET['deleted'])) {
    echo '<br/> Type e Deleted existem!';
} else if (isset($_GET['type'])) {
    echo '<br/> Type existe!';
} else if(isset($_GET['deleted'])) {
    echo '<br/> Deleted existe!';
} else {
    echo '<br/> Type e Deleted não existem!';
}