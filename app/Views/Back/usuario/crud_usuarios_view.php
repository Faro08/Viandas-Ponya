<main>
    <div class="d-flex justify-content-center">
        <h1>Crud Productos</h1>
    </div>
    <div class="mt-3">
        <div class="container mt-5">
            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('/wip') ?>" class="btn btn-success ">Agregar Usuario</a>
                <a href="<?php echo site_url('/wip') ?>" class="btn btn-secondary">Dados de baja</a>
            </div>
        </div>
        <table class="table table-bordered" id="">
            <thead>
                <tr>
                    <!-- filas de la tabla --->
                    <th> id </th>
                    <th> nombre </th>
                    <th> apellido </th>
                    <th> usuario </th>
                    <th> email </th>
                    <th> pass </th>
                    <th> perfil </th>
                    <th> direccion </th>
                </tr>
            </thead>

            <tbody>
                <!--estructura de repeticion para mostrar productos --->
                <?php if($usuarios): ?>
                <?php foreach($usuarios as $usuario): ?>
                <?php if($usuario['baja'] === 'NO'): ?>
                <tr>
                    <td> <?php echo $usuario['id'] ?> </td>
                    <td> <?php echo $usuario['nombre'] ?> </td>
                    <td> <?php echo $usuario['apellido'] ?> </td>
                    <td> <?php echo $usuario['usuario'] ?> </td>
                    <td> <?php echo $usuario['email'] ?> </td>
                    <td> <?php echo $usuario['pass'] ?> </td>
                    <td> <?php echo $usuario['perfil_id'] ?> </td>
                    <td> <?php echo $usuario['direccion'] ?> </td>

                    <td>
                        <!-- borrar/editar --->
                        <a href="<?php echo base_url('editar-usuario/'.$usuario['id']);?>" class="btn btn-primary"
                            type="button">Editar</a>
                        <a href="<?php echo base_url('eliminar-usuario/'.$usuario['id']);?>" class="btn btn-danger"
                            type="button">Borrar</a>

                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</main>