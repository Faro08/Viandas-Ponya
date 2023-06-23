<main>
    <div class="container text-center mt-5">
        <div>
            <?php if (session('mensaje')) {?>

            <div class='alert alert-danger' role="alert">
                <?php echo session('mensaje');?>
            </div>


            <?php } ?>
        </div>
        <!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
        <?php $validation = \Config\Services::validation(); ?>

        <div class="container mt-1 mb-5 d-flex justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <!-- titulo del formulario-->
                    <h2>Editar Ususario</h2>
                </div>
                <!-- envio de datos a la ruta -->
                <form method="post" action="<?php echo base_url('modificar-usuario/'.$user_obj['id']); ?>">
                    <div class="card-body" media="(max-width:768px)">
                        <div class="mb-3">
                            <label for="perfil" class="form-label"> Perfil</label>
                            <select disabled name="perfil" class="form-control" id="perfil "
                                value="<?php echo $user_obj['perfil_id'] ?>">
                                <option value="">Seleccionar perfil</option>
                                <?php foreach ($perfiles as $perfil) { ?>
                                <option value="<?php echo $perfil['id']; ?>"
                                    <?php if( $user_obj['perfil_id'] === $perfil['id']): ?> selected="selected">
                                    <?php else : ?> >
                                    <?php endif; ?>
                                    <?php echo $perfil['id'], ". ", $perfil['descripcion']; }?>
                                </option>
                            </select>
                            <!-- Error  -->
                            <?php if ($validation->getError('perfil')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('perfil'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-2">
                            <label for="nombre" class="form-label">Nombre</label>
                            <!-- ingreso sel nombre-->
                            <input name="nombre" type="text" class="form-control"
                                value="<?php echo $user_obj['nombre']?>" placeholder="Nombre">
                            <!-- Error -->
                            <?php if ($validation->getError('nombre')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('nombre'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" class="form-control"
                                value="<?php echo $user_obj['apellido']?>" placeholder="Apellido">
                            <!-- Error -->
                            <?php if ($validation->getError('apellido')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('apellido'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" name="direccion" class="form-control"
                                value="<?php echo $user_obj['direccion']?>" placeholder="Direccion">
                            <!-- Error -->
                            <?php if ($validation->getError('direccion')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('direccion'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control"
                                value="<?php echo $user_obj['email']?>" placeholder="correo@algo.com">
                            <!-- Error -->
                            <?php if ($validation->getError('email')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('email'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" value="<?php echo $user_obj['usuario']?>"
                                class="form-control" placeholder="Usuario">
                            <!-- Error -->
                            <?php if ($validation->getError('usuario')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('usuario'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if ($user_obj['perfil_id'] === '1'): ?>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña</label>
                            <input name="pass" type="password" class="form-control"
                                placeholder="Contraseña (mínimo 5 caracteres)">
                            <!-- Error -->
                            <?php if ($validation->getError('pass')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('pass'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endif; ?>
                        <input type="submit" value="Enviar" class="btn btn-success">
                        <a class="btn btn-danger" href="<?php echo base_url('crud-usuarios');?>">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
</main>