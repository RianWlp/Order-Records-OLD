<?php


class CriarTabela{


    public function montarTabela() {

        $DB = pg_connect("host=localhost port=5432 dbname=gerenciarlogin user=rianwlp password=xxx15159");
        
        $records = pg_query($DB,"SELECT * FROM ordenar ORDER BY sorte DESC;");

        $records = pg_fetch_all($records);
    
        $table = <<<HTML
        <thead>
        <tbody>

HTML;

        $tamanhoRegistros = count($records);
        
        foreach ($records as $index => $record) {   

            $table .= <<<HTML
            <tr id="{$record['id']}"> 
            <td> {$record['nome']} </td>
            <td> {$record['cpf']}</td>
            <td> {$record['telefone']}</td>
            <td> {$record['tipo']}</td>
            <td >
            HTML;


            if($index != $tamanhoRegistros-1){
              
            $table .= <<<HTML
            <a  onclick='ordenar(this, "descer")'>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
            </svg>
            </a>
HTML;
            }
            
            //var_dump($record,-1);

              
            if($index != 0){

            $table .= <<<HTML
            <a onclick='ordenar(this,"subir")'>

            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
            </svg>
            </a></td></tr> 

      
HTML;
            }
    

            
        }



            $table.=<<<HTML

            </tbody>
            </thead>
            HTML;

         //header("Location: cadastro.php");    
        return $table;

        
    }

    
}



?>