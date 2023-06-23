<main class="bg-ponya">
    <div class="d-flex justify-content-center mt-3">
        <h1>Menu Disponible</h1>
    </div>
    <div class="container mb-5
    ">
        <hr><br>
        <div class="row">
            <?php if (empty($productos)) : ?>
            <p class="text-center">No hay productos disponibles</p>
            <?php else : ?>
            <?php foreach($productos as $producto): ?>
            <div class="col-lg-3">
                <div class="card mb-5" style="width: 18rem; height:382px; max-height:382px">
                    <img src="<?=base_url()?>/assets/uploads/<?=$producto['imagen']?>" class="card-img-top" alt=""
                        height="200">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['nombre_producto']?></h5>
                        <p class="card-text">
                            Menu:
                            <?php foreach($categorias as $categoria): ?>
                            <?php if($producto['categoria_id'] === $categoria['id']):?>
                            <?php echo $categoria['descripcion']?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </p>

                        <?php if (session()->perfil_id ==2): ?>

                        <?php if($producto['stock'] > $producto['stock_min'] ):?>
                        <p> Disponible
                        </p>

                        <p>
                            <?php 
                            echo form_open('carrito-agrega');
                            echo form_hidden ('id', $producto['id']);
                            echo form_hidden ('precio_venta', $producto['precio_venta']);
                            echo form_hidden ('nombre_producto', $producto['nombre_producto']);
                        ?>
                        <div>
                            <?php 
                            $btn = array(
                                'class' => 'btn button-ordenarOnline',
                                'value' => 'Agragar al carrito',
                                'name' => 'action'
                            );
                            echo form_submit($btn);
                            echo form_close();
                        ?>
                        </div>
                        </p>


                        <?php else : ?>
                        <p> <b>Agotado</b>
                        </p>
                        <?php endif;?>

                        <?php else : ?>
                        <a href="<?php echo base_url('login');?>" class="btn button-ordenarOnline">Ingresar para
                            ordenar</a>
                        <?php endif ; ?>

                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif ; ?>
        </div>
    </div>



</main>