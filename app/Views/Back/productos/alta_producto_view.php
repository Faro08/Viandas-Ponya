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

        <div class="container mt-1 mb-1 d-flex justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <!-- titulo del formulario-->
                    <h2>Nuevo Producto</h2>
                </div>
                <!-- envio de datos a la ruta /send-form -->
                <form method="post" action="<?php echo base_url('/post-producto') ?>" enctype="multipart/form-data">
                    <div class="card-body" media="(max-width:768px)">
                        <div class="mb-2">
                            <label for="nombre" class="form-label">Nombre</label>
                            <!-- ingreso del nombre-->
                            <input name="nombre" type="text" class="form-control"
                                value="<?php echo set_value('nombre')?>" placeholder="Nombre">
                            <!-- Error -->
                            <?php if ($validation->getError('nombre')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('nombre'); ?>
                            </div>
                            <?php } ?>
                        </div>

                        <!-- Categorias -->
                        <div class="mb-3">
                            <label for="categoria" class="form-label"> Categoria</label>
                            <select name="categoria" class="form-control" id="categoria "
                                value="<?php echo set_value('categoria_id') ?>">
                                <option value="">Seleccionar categoria</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria['id']; ?>"
                                    <?php if( old('categoria_id') === $categoria['id']): ?> selected="selected">
                                    <?php else : ?> >
                                    <?php endif; ?>
                                    <?php echo $categoria['id'], ". ", $categoria['descripcion']; }?>
                                </option>
                            </select>
                            <!-- Error -->
                            <?php if ($validation->getError('categoria')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('categoria'); ?>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="text" name="costo" value="<?php echo set_value('costo')?>" class="form-control"
                                placeholder="Costo">
                            <!-- Error -->
                            <?php if ($validation->getError('costo')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('costo'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="precio_venta" class="form-label">Precio de venta</label>
                            <input type="text" name="precio_venta" value="<?php echo set_value('precio_venta')?>"
                                class="form-control" placeholder="Precio de venta">
                            <!-- Error -->
                            <?php if ($validation->getError('precio_venta')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('precio_venta'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" name="stock" value="<?php echo set_value('stock')?>" class="form-control"
                                placeholder="Stock">
                            <!-- Error -->
                            <?php if ($validation->getError('stock')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('stock'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="stock_min" class="form-label">Stock minimo</label>
                            <input type="text" name="stock_min" value="<?php echo set_value('stock_min')?>"
                                class="form-control" placeholder="Stock minimo">
                            <!-- Error -->
                            <?php if ($validation->getError('stock_min')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('stock_min'); ?>
                            </div>
                            <?php } ?>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control-file" name="imagen">
                        </div>

                        <input type="submit" value="Enviar" class="btn btn-success">
                        <a class="btn btn-danger" href="<?php echo base_url('crear');?>">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
</main>