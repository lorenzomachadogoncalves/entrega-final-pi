<table class="table">
    <caption>Participantes</caption>
    <thead>
        <tr>
            <th scope="col">Status</th>
            <th scope="col">Nome</th>
            <th scope="col">Ocupação</th>
            <th scope="col">Telefone</th>
            <th scope="col">Associado</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "../../model/participante/participante_model.php";
            $resultado = visualizar_participantes();

            foreach ($resultado as $infos):
                $is_associado = $infos["is_associado"];
                $is_ativo = $infos['is_ativo'];
                $opcao = $is_ativo ? 'desativar' : 'ativar';
                $button_label = $is_ativo ? 'Desativar' : 'Ativar';

                if (!$mostrar_ativos && !$mostrar_associados) {
                    $mostrar = true;
                } else {
                    $mostrar = (!$mostrar_ativos || $is_ativo) && (!$mostrar_associados || $is_associado);
                } ?> 
                <?php if ($mostrar): ?>
                    <tr>
                        <td class="<?= $is_ativo ? 'table-success' : 'table-danger' ?>"><?= $is_ativo ? 'Ativo' : 'Inativo' ?></td>
                        <td><?= $infos['nome'] ?></td>
                        <td><?= $infos['ocupacao'] ?></td>
                        <td><?= $infos['telefone'] ?></td>
                        <td><?= $infos['is_associado'] ? 'Associado' : 'Não associado' ?></td>
                        <td>
                            <div class="d-grid gap-2">
                                <form method="post" action="../participante/editar_participante.php?id_participante=<?= $infos['id'] ?>">
                                    <input type="hidden" name="form_flag" value="editar">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                                <form method="post" action="../../controller/participante/participante_control.php">
                                    <input type="hidden" name="id_participante" value="<?= $infos['id'] ?>">
                                    <input type="hidden" name="opcao" value="<?= $opcao ?>">
                                    <button type="submit" class="<?= $is_ativo ? 'btn btn-warning' : 'btn btn-success' ?>"><?= $button_label ?></button>
                                </form>
                                <?php if ($is_associado): ?>
                                    <form method="post" action="../contribuicao/view_contribuicao_participante.php?id_participante=<?= $infos["id"] ?>">
                                        <button type="submit" class="btn btn-secondary" value="<?= $infos["id"] ?>">Contribuições</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endif;?>
            <?php endforeach; ?>
    </tbody>
</table>


