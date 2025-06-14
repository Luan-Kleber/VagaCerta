<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="POST">

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" value="<?=$objVaga->titulo?>">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"><?=$objVaga->descricao?></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="status" value="t" checked> Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="status" value="f" <?=$objVaga->status == 'f' ? 'checked' : ''?>> Inativo
                    </label>
                </div>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>

</main>