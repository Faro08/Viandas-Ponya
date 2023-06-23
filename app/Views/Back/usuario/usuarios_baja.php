<main>
    <div class="d-flex justify-content-center mt-3">
        <h1>Crud Usuarios</h1>
    </div>
    <div class="mt-3">
        <div class="container mt-5">
            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('/crud-usuarios') ?>" class="btn btn-secondary m-1">Activos</a>


            </div>
        </div>
        <div class="container">
            <table class="table table-bordered" id="">
                <thead>
                    <tr>
                        <!-- filas de la tabla --->
                        <th> id </th>
                        <th> nombre </th>
                        <th> apellido </th>
                        <th> usuario </th>
                        <th> email </th>
                        <th> perfil </th>
                        <th> direccion </th>
                        <th> accion </th>
                    </tr>
                </thead>

                <tbody>
                    <!--estructura de repeticion para mostrar productos --->
                    <?php if($usuarios): ?>
                    <?php foreach($usuarios as $usuario): ?>
                    <?php if($usuario['baja'] === 'SI'): ?>
                    <tr>
                        <td> <?php echo $usuario['id'] ?> </td>
                        <td> <?php echo $usuario['nombre'] ?> </td>
                        <td> <?php echo $usuario['apellido'] ?> </td>
                        <td> <?php echo $usuario['usuario'] ?> </td>
                        <td> <?php echo $usuario['email'] ?> </td>
                        <td> <?php echo $usuario['perfil_id'] ?> </td>
                        <td> <?php echo $usuario['direccion'] ?> </td>

                        <td>
                            <!-- borrar/editar --->
                            <a href="<?php echo base_url('editar-usuario/'.$usuario['id']);?>" class="btn btn-primary"
                                type="button">Editar</a>
                            <a href="<?php echo base_url('activar-usuario/'.$usuario['id']);?>" class="btn btn-success"
                                type="button">Dar alta</a>

                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>