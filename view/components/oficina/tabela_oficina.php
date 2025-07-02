
<table class="table">
    <caption>
        Oficinas
    </caption>
    <thead>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Opções</th>
    </thead>
    <tbody>
        <?php
            include "../../model/oficina/oficina_model.php";
            $resultado = visualizar_todas_oficinas();
            foreach ($resultado as $infos):
                
        ?>
            <tr>
                <td><?= $infos['nome'] ?></td>
                <td><?= $infos['descricao'] ?></td>
                <td>
                    <div class="d-grid gap-2">
                        <form method="post" action="editar_oficina.php?id_oficina=<?= $infos['id'] ?>" >
                            <input type="hidden" name="form_flag" value="editar">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                        <form method="post" action="../../controller/oficina/oficina_control.php">
                            <input type="hidden" name="id_oficina" value="<?= $infos['id'] ?>">
                            <input type="hidden" name="opcao" value="excluir">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>