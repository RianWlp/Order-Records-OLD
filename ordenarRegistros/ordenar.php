<?php

include_once 'app/models/subir.php';
include_once 'app/models/descer.php';

$subir = new subir();
$descer = new descer();

$id = $_POST['id'];
$direcao = $_POST['direcao'];


if ($direcao == "subir"){

    $subir->ordenar($id);
    
}

if($direcao == "descer"){

    var_dump($id);
    $descer->ordenar($id);
   
}



//header("Location: cadastro.php");

?>