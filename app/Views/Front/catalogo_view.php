<main class="bg-opnya">
    <div class="container">
        <div class="row mt-4 productos-destacados">
            <div class="col">
                <h2>Platos</h2>
                <hr><br>
                <div class="row">
                    <?php
                // Obtener una instancia del modelo de productos
                $productosModel = new \App\Models\Producto_model();

                // Obtener los productos utilizando la instancia del modelo
                $productos = $productosModel->findAll();

                // Verificar si hay productos
                if (empty($productos)) {
                    echo '<p class="text-center">No hay productos disponibles</p>';
                } else {
                    // Recorre los productos y muestra las cards
                    foreach ($productos as $producto) {
                        // Verificar si el producto no está marcado como eliminado
                        if ($producto['eliminado'] === 'NO') {
                            $nombreProd = $producto['nombre_producto'];
                            $imagen = $producto['imagen'];

                            // Genera una card para cada producto
                            echo '
                            <div class="col-3">
                                <div class="card">
                                    <img src="assets/uploads/' . $imagen . '" class="card-img-top" alt="..."  height = "200">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $nombreProd . '</h5>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ver</a>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img id="producto-imagen" src="" alt="Imagen del producto" width="95" height="84">
                        </div>
                        <div class="col-6">
                            <h4 id="producto-nombre"></h4>
                            <p id="producto-descripcion"></p>
                            <p id="producto-stock"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Comprar ahora</button>
                    <button type="button" class="btn btn-primary">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
</main>