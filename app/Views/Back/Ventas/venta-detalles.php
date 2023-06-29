<main>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">

                <?php if(session()->perfil_id == 1): ?>
                <div>
                    <div class="d-flex justify-content-center mt-3">
                        <h1>Venta</h1>
                    </div>
                    <table class="table table-bordered" id="">
                        <thead>
                            <tr>
                                <th> Id</th>
                                <th> Usuario</th>
                                <th colspan="2"> Fecha</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> <?php echo $venta['id'] ?> </td>
                                <td>
                                    <?php foreach($usuarios as $usuario): ?>
                                    <?php if($venta['usuario_id'] === $usuario['id']):?>
                                    <?php echo $usuario['usuario']?>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td colspan="2"> <?php echo  $venta['fecha']  ?> </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th class="text-center" colspan="5">Productos</th>

                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventaDetalle as $detalle) : ?>
                            <tr>
                                <td>
                                    <?php
                                $productosModel = new \App\Models\Producto_model();
                                $producto = $productosModel->find($detalle['producto_id']);
                                echo $producto['nombre_producto'];
                                ?>
                                </td>

                                <td><?php echo $detalle['cantidad']; ?></td>
                                <td><?php echo $detalle['precio_venta']; ?></td>
                                <td><?php echo $detalle['cantidad'] * $detalle['precio_venta']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="3">Total Venta</th>
                                <th>$<?php echo $venta['total_venta']; ?></th>
                            </tr>
                        </thead>
                    </table>

                </div>


                <?php elseif(session()->perfil_id == 2): ?>
                <div>
                    <div class="d-flex justify-content-center mt-3">
                        <h1>Compra</h1>
                    </div>
                    <table class="table table-bordered" id="">
                        <thead>
                            <tr>
                                <th> Nro</th>
                                <th> Usuario</th>
                                <th colspan="2"> Fecha</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> <?php echo $venta['id'] ?> </td>
                                <td>
                                    <?php foreach($usuarios as $usuario): ?>
                                    <?php if($venta['usuario_id'] === $usuario['id']):?>
                                    <?php echo $usuario['usuario']?>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td colspan="2"> <?php echo  $venta['fecha']  ?> </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th class="text-center" colspan="5">Productos</th>

                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventaDetalle as $detalle) : ?>
                            <tr>
                                <td>
                                    <?php
                                $productosModel = new \App\Models\Producto_model();
                                $producto = $productosModel->find($detalle['producto_id']);
                                echo $producto['nombre_producto'];
                                ?>
                                </td>

                                <td><?php echo $detalle['cantidad']; ?></td>
                                <td><?php echo $detalle['precio_venta']; ?></td>
                                <td><?php echo $detalle['cantidad'] * $detalle['precio_venta']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="3">Total Compra</th>
                                <th>$<?php echo $venta['total_venta']; ?></th>
                            </tr>
                        </thead>
                    </table>

                </div>
                <div class="d-flex justify-content-end mb-5">
                    <a class="btn btn-lg button-ordenarOnline font-handlee" type="button" onclick="handlePrint()"><img
                            class="icon-color-white"
                            src="<?php echo base_url("assets/bootstrap-icons-1.10.4/printer-fill.svg");?>"
                            alt="icono impresora" width="25" height="25"></a>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</main>
<script>
const handlePrint = () => {
    window.print();
}
</script>