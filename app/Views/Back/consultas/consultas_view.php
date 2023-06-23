<main>
    <div class="d-flex justify-content-center mt-3">
        <h1>Consultas</h1>
    </div>
    <div class="mt-3">
        <div class="container mb-5">
            <table class="table table-bordered" id="">
                <thead>
                    <tr>
                        <!-- filas de la tabla --->
                        <th> id </th>
                        <th> nombre </th>
                        <th> email </th>
                        <th> mensaje </th>
                        <th> leída </th>
                        <th> accion </th>
                    </tr>
                </thead>

                <tbody>
                    <!--estructura de repeticion para mostrar consultas --->
                    <?php if($consultas): ?>
                    <?php foreach($consultas as $consulta): ?>

                    <tr>
                        <td> <?php echo $consulta['id'] ?> </td>
                        <td> <?php echo $consulta['nombre'] ?> </td>
                        <td> <?php echo $consulta['email'] ?> </td>
                        <td> <?php echo $consulta['mensaje'] ?> </td>
                        <td> <?php echo $consulta['leida'] ?> </td>

                        <td>
                            <!-- marcar como leida --->
                            <?php if($consulta['leida'] === "NO"):?>
                            <a href="<?php echo base_url('leer-consulta/'.$consulta['id']);?>" class="btn btn-success"
                                type="button">Marcar leída</a>
                            <?php endif ?>

                        </td>
                    </tr>

                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</main>