<main>
    <div class="d-flex justify-content-center mt-3">
        <h1>Crud Productos</h1>
    </div>
    <div class="mt-3">
        <div class="container mt-3">
            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('/producto-form') ?>" class="btn btn-success m-1">Agregar
                    Producto</a>
                <a href="<?php echo site_url('/eliminados') ?>" class="btn btn-secondary m-1">Eliminados</a>
            </div>
        </div>
        <div class="container mb-5">
            <table class="table table-bordered" id="">
                <thead>
                    <tr>
                        <!-- filas de la tabla --->
                        <th> id </th>
                        <th> producto </th>
                        <th> categoria </th>
                        <th> costo </th>
                        <th> precio venta </th>
                        <th> stock </th>
                        <th> imagen </th>
                        <th> acción </th>
                    </tr>
                </thead>

                <tbody>
                    <!--estructura de repeticion para mostrar productos --->
                    <?php if($productos): ?>
                    <?php foreach($productos as $producto): ?>
                    <?php if($producto['eliminado'] === 'NO'): ?>
                    <tr>
                        <td> <?php echo $producto['id'] ?> </td>
                        <td> <?php echo $producto['nombre_producto'] ?> </td>
                        <td>
                            <?php foreach($categorias as $categoria): ?>
                            <?php if($producto['categoria_id'] === $categoria['id']):?>
                            <?php echo $categoria['descripcion']?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td> <?php echo $producto['costo'] ?> </td>
                        <td> <?php echo $producto['precio_venta'] ?> </td>
                        <td> <?php echo $producto['stock'] ?> </td>
                        <td>
                            <img src="<?=base_url()?>/assets/uploads/<?=$producto['imagen']?>" height="100px" alt="">
                        </td>
                        <td>
                            <!-- borrar/editar --->
                            <a href="<?php echo base_url('editar/'.$producto['id']);?>" class="btn btn-primary"
                                type="button">Editar</a>
                            <a href="<?php echo base_url('eliminar/'.$producto['id']);?>" class="btn btn-danger"
                                type="button">Eliminar</a>

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