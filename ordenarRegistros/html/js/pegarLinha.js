function ordenar(coluna, direcao) {

    var linha = $(coluna).parent().parent();

    var id = $(linha).attr("id");

    var dados = {
        id: id,
        direcao: direcao
    };

    $.ajax({
        url: 'ordenar.php',
        method: 'POST',
        cache: false,
        data: dados,
        success: (data) => {

            //alert('Gravado com sucesso');

            location.reload();

        },
        error: (data) => {

            //alert('Erro');

        }

    });


    //<a href="../../subirDescer.php?id=dados" > </a>

}