<?php

include_once 'direcaoInterface.php';

class descer implements direcaoInterface{

    public function ordenar($id){

      $DB = pg_connect("host=localhost port=5432 dbname=gerenciarlogin user=rianwlp password=xxx15159");
      //===========================================================
      
      $sql = pg_query($DB,"SELECT sorte FROM ordenar WHERE $id = id LIMIT 1;");
      
      $sortePosicaoAtual = pg_fetch_all($sql)[0]["sorte"];

      $where = array("id"=>(int)$id);
      $colunas = array("sorte"=>$sortePosicaoAtual);

      //==============
      
      $nextRecord = pg_query($DB,"SELECT id,sorte FROM ordenar WHERE $sortePosicaoAtual > sorte ORDER BY sorte DESC LIMIT 1;");
      
      $nextRecord = pg_fetch_all($nextRecord)[0]; 

      $nextRecordId = (int)$nextRecord['id'];
      $nextRecordSorte = (int)$nextRecord['sorte'];
      
      pg_update($DB,"ordenar",['sorte'=>$nextRecordSorte],['id'=>(int)$id]);
      pg_update($DB,"ordenar",$colunas,['id'=>$nextRecordId]);  
    
      
    }
}