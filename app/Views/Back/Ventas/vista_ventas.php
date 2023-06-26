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
                        <th> Detalles</th>
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
                        <td>
                            <?php // Imagen
                          $path = '<img src='. base_url("assets/bootstrap-icons-1.10.4/search.svg"). ' width="25" height="25" alt="icono carrito">';
                            echo anchor('detalles-venta/' . $venta['id'], $path); 
                            ?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
        <!-- MODAL mostrar detalles venta -->
        <div class="modal" id="exampleModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
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
<script>
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
})
</script>