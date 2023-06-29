<main class="bg-ponya">
    <div class="container-fluid" id="carrito">
        <div class="cart">
            <div class="heading mt-5">
                <h2 id="h3" align="center">Productos en tu Carrito</h2>
            </div>
            <div class="text" align="center">
                <?php 
               
               $session=session();
               $cart = \Config\Services::cart();
               $cart = $cart->contents();
              
            // Si el carrito está vacio, mostrar el siguiente mensaje
            if (empty($cart)) 
            {
                echo 'Carrito vacío, visita el <a class="color-4" style="text-decoration: none;"
                href="catalogo-productos"><b>
                    Catalogo</b></a> para comprar';
                }
                ?>
            </div>
        </div>
        <table class="table table-hover table-dark table-responsive-md" border="0" cellpadding="5px" cellspacing="1px">
            <!--table class="table table-striped"-->
            <?php // Todos los items de carrito en "$cart".
         
             // if ($cart = $this->cart->contents()): //Esta función devuelve un array de los elementos agregados en el carro 
            if ($cart == TRUE):?>
            <div class="container">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-hover  table-striped ml-3">
                        <tr class="table-light">
                            <td>id</td>
                            <td>Nombre producto</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>Total</td>
                            <td>Quitar Producto</td>
                        </tr>

                        <?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito
            echo form_open('carrito-actualiza');//ruta
                $gran_total = 0;
                $i = 1; //
               // foreach ($this->cart->contents() as $items): 
                 foreach ($cart as $item):
                  //  echo "<table class='table table-striped'>";
                    echo  form_hidden('cart[' . $item['id'] . '][id]', $item['id']); 
                    echo  form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']); 
                    echo  form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                    echo  form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                    echo  form_hidden('cart[' . $item['id'] .'][qty]', $item['qty']);
            ?>
                        <tr class="table-light">
                            <td> <?php echo $i++; ?> </td>
                            <td> <?php echo $item['name']; ?> </td>
                            <td>$ <?php echo number_format($item['price'], 2); ?> </td>
                            <td> <?php echo $item ['qty']; ?> </td>

                            <?php $gran_total = $gran_total + $item['price'] * $item['qty']; ?>

                            <td> $ <?php echo number_format($item['subtotal'], 2) ?> </td>
                            <td>
                                <?php // Imagen
                          $path = '<img src='. base_url("assets/bootstrap-icons-1.10.4/cart-x.svg"). ' width="25" height="25" alt="icono carrito">';
                            echo anchor('carrito-elimina/' . $item['rowid'], $path); 
                            ?>
                            </td>
                        </tr>
                        <?php 
                endforeach;     ?>
                        <tr class="table-light">
                            <td colspan="4"> </td>
                            <td> <b>$
                                    <?php //Gran Total
                            echo number_format($gran_total, 2); 
                            ?>
                                </b></td>
                            <td colspan="5" align="center">
                                <!-- Borrar carrito usa mensaje de confirmacion javascript implementado en head_view -->
                                <input type="button" class='btn btn-primary btn-lg' value="Borrar Carrito"
                                    onclick="window.location = 'borrar'">
                                <!-- Submit boton. Actualiza los datos en el carrito -->
                                <!--input type="submit" class ='btn btn-primary btn-lg' value="Actualizar"-->
                                <!-- " Confirmar orden envia a carrito_controller/muestra_compra  -->
                                <input type="button" class='btn btn-success btn-lg' value="Comprar"
                                    onclick="window.location = 'carrito-comprar'">
                            </td>
                        </tr>
                        <?php echo form_close();
			
            endif; ?>
                    </table>
                </div>
            </div>
            <br>
            <?php if (session()->getFlashdata('success')) {
      echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    } ?>
</main