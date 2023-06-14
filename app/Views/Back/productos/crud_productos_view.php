<main>
    <div class="d-flex justify-content-center">
        <h1>Crud Productos</h1>
    </div>
    <div class="mt-3">
        <div class="container mt-5">
            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('/producto-form') ?>" class="btn btn-success ">Agregar Producto</a>
                <a href="<?php echo site_url('/eliminados') ?>" class="btn btn-secondary">Eliminados</a>
            </div>
        </div>
        <table class="table table-bordered" id="">
            <thead>
                <tr>
                    <!-- filas de la tabla --->
                    <th> id </th>
                    <th> producto </th>
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