<?php

//irá precisar de uma coluna chamada sorte 


class User{
    

    private $nome;
    private $cpf;
    private $telefone;
    private $tipo;

    public function __construct($data){

        $this->setNome($data['nome']);
        $this->setCpf($data['cpf']);
        $this->setTelefone($data['telefone']);
        $this->setTipoDePagamento($data['tipo']);
        
    }

    private function setNome($nome){

        $this->nome = $nome;
    }

    private function setCpf($cpf){

        $this->cpf = $cpf;
    }

    private function setTelefone($telefone){

        $this->telefone = $telefone;
    }

    private function setTipoDePagamento($tipo){

        $this->tipo = $tipo;
    }


    public function store(){

        $DB = pg_connect("host=localhost port=5432 dbname=gerenciarlogin user=rianwlp password=xxx15159");

        $row = array("nome"=>$this->nome, "cpf" =>$this->cpf, "telefone"=>$this->telefone, "tipo"=> $this->tipo);

        pg_insert($DB, "ordenar", $row);


        
    }

    
}

?>