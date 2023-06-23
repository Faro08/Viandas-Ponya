<main>
    <div class="container text-center mt-5">
        <div>
            <!--recuperamos datos con la función Flashdata para mostrarlos-->
            <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-warning">

                <?= session()->getFlashdata('msg')?>
            </div>
            <?php endif;?>
        </div>
        <!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
        <?php $validation = \Config\Services::validation(); ?>

        <div class="container mt-1 mb-1 d-flex justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <!-- titulo del formulario-->
                    <h2>Ingresar</h2>
                </div>
                <!-- envio de datos a la ruta /send-form -->
                <form method="post" action="<?php echo base_url('/send-login') ?>">
                    <div class="card-body" media="(max-width:768px)">


                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" value="<?php echo set_value('email')?>" class="form-control"
                                placeholder="Email">
                            <!-- Error -->
                            <?php if ($validation->getError('email')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('email'); ?>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña</label>
                            <input name="pass" type="password" class="form-control">

                            <!-- Error -->
                            <?php if ($validation->getError('pass')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('pass'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <input type="submit" value="Ingresar" class="btn btn-success">
                        <input type="reset" value="Limpiar" class="btn btn-danger">
                    </div>
                </form>
                <p class="m-0">No estas registrado ? <a class="color-3" style="text-decoration: none;"
                        href="<?php echo base_url('register');?>"><b>Crear cuenta</b></a>
            </div>

        </div>
</main>