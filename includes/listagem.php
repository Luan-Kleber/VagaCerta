<?php

$mensagem = '';
if(isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 'success':
            $mensagem = "<div class='alert alert-success'>Ação executada com sucesso!</div>";
            break;
        
        default:
            $mensagem = "<div class='alert alert-danger'>Ação não excutada!</div>";
            break;
    }
}

$resultados = '';

foreach($vagas as $vaga) {
    $resultados .= "<tr>
                        <td>$vaga->id</td>
                        <td>$vaga->titulo</td>
                        <td>$vaga->descricao</td>
                        <td>".($vaga->status == 't' ? 'Ativo' : 'Inativo')."</td>
                        <td>".date('d/m/Y à\s H:s:i', strtotime($vaga->data))."</td>
                        <td>
                            <a href='editar.php?id=".$vaga->id."'>
                                <button type='button' class='btn btn-primary'>Editar</button>
                            </a>
                            <a href='excluir.php?id=".$vaga->id."'>
                                <button type='button' class='btn btn-danger'>Excluir</button>
                            </a>
                        </td>
                    </tr>";
}

$resultados = !empty($resultados) ? $resultados : "<tr><td colspan=6 class='text-center'>Nenhum resultado encontrado</td></tr>"

?>
<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova Vaga</button>
        </a>
    </section>
    
    <section>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>

</main>