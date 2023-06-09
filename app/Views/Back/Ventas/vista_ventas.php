<main>
    <?php if (session()->perfil_id ==1): ?>
    <div class="d-flex justify-content-center mt-3">
        <h1>Ventas</h1>
    </div>
    <div class="mt-3">
        <div class="container mb-5">
            <table class="table table-bordered" id="">
                <thead>
                    <tr>
                        <th> Id</th>
                        <th> Usuario</th>
                        <th> Fecha</th>
                        <th> Total </th>
                        <th> Detalles</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if($ventaDetalle): ?>
                    <?php foreach($ventaDetalle as $venta): ?>
                    <?php $ventaId = $venta['id']?>
                    <tr>
                        <td> <?php echo $venta['id'] ?> </td>
                        <td>
                            <?php foreach($usuarios as $usuario): ?>
                            <?php if($venta['usuario_id'] === $usuario['id']):?>
                            <?php echo $usuario['usuario']?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td> <?php echo  $venta['fecha']  ?> </td>
                        <td> <?php echo $venta['total_venta'] ?> </td>
                        <td>
                            <?php // Imagen
                          $path = '<img src='. base_url("assets/bootstrap-icons-1.10.4/search.svg"). ' width="25" height="25" alt="icono carrito">';
                            echo anchor('detalles-venta/' . $venta['id'], $path); 
                            ?>


                        </td>
                    </tr>

                    <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>
            </table>

        </div>

        <?php else :?>
        <div class="d-flex justify-content-center mt-3">
            <h1>Mis compras</h1>
        </div>
        <div class="mt-3">
            <div class="container mb-5">
                <table class="table table-bordered" id="">
                    <thead>
                        <tr>
                            <th> Fecha</th>
                            <th> Total </th>
                            <th> Detalles</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if($ventaDetalle): ?>
                        <?php foreach($ventaDetalle as $venta): ?>
                        <tr>
                            <td> <?php echo  $venta['fecha']  ?> </td>
                            <td> <?php echo $venta['total_venta'] ?> </td>
                            <td>
                                <?php // Imagen
                          $path = '<img src='. base_url("assets/bootstrap-icons-1.10.4/search.svg"). ' width="25" height="25" alt="icono carrito">';
                            echo anchor('detalles-venta/' . $venta['id'], $path); 
                            ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php endif ;?>
</main>