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
                        <!-- filas de la tabla --->
                        <th> Id</th>
                        <th> Usuario</th>
                        <th> Fecha</th>
                        <th> Total </th>
                    </tr>
                </thead>

                <tbody>
                    <!--estructura de repeticion para mostrar productos --->
                    <?php if($ventaDetalle): ?>
                    <?php foreach($ventaDetalle as $venta): ?>
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
                            <!-- filas de la tabla --->

                            <th> Fecha</th>
                            <th> Total </th>
                        </tr>
                    </thead>

                    <tbody>
                        <!--estructura de repeticion para mostrar productos --->
                        <?php if($ventaDetalle): ?>
                        <?php foreach($ventaDetalle as $venta): ?>
                        <tr>

                            <td> <?php echo  $venta['fecha']  ?> </td>
                            <td> <?php echo $venta['total_venta'] ?> </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php endif ;?>

</main>