<?php

include_once 'app/models/user.php';

    $user = new User(['nome'=> $_POST['nome'], 'cpf'=> $_POST['cpf'], 'telefone'=> $_POST['telefone'],'tipo'=>$_POST['tipo']]);
    $user->store();

    
    
    
?>