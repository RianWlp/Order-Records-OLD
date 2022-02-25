<?php

include_once 'html/header.html';
include_once 'app/models/tabela.php';

$tabela = new CriarTabela();
?>

<form onsubmit='chamar(); return false;'>

    <h1> Dados </h1>

    <div class="row text-center">

        <div class="col section-1 section-description">

            <div class='alinhar'>

                <input type="text" name="nome" placeholder="Seu Nome" />

            </div>

            <div class='alinhar'>

                <input type="text" name="cpf" placeholder="Seu CPF" />

            </div>


            <div class='alinhar'>

                <input type="text" name="telefone" placeholder="Seu Telefone" />

            </div>



        </div>

    </div>


    <div class="row text-center">



        <div class="col section-1 section-description espaco">

            <div>
                <label for="credito">

                    <input class="" type="radio" name="tipo" value="1">
                    Credito
                </label>

                <label for="debito">

                    <input type="radio" name="tipo" value="0" checked>
                    Debito
                </label>

            </div>


        </div>

    </div>



    <div class="row text-center">

        <div class="col section-1 section-description">
            <button type='submit'>
                Registrar
            </button>
        </div>


    </div>

</form>

<script>
function chamar() {

    $.ajax({
        url: 'processarInfo.php',
        method: 'POST',
        cache: false,
        data: $('form').serialize(),
        success: (data) => {

            alert('Gravado com sucesso');
            location.reload();

        },
        error: (data) => {

            alert('Erro');

        }

    });

}
</script>


<table id="table">
    <tr>
        <td>Nome</td>
        <td>CPF</td>
        <td>Telefone</td>
        <td>Tipo Pagamento</td>

    </tr>
    <?= $tabela->montarTabela()?>
</table>

<?php
   

include_once 'html/footer.html';


?>