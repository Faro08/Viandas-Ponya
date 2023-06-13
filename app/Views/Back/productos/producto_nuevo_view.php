<html>

<?php
        include("Producto_controller.php"); 
    // var contenedor
    $sql= "select * from productos"; 
    $resultado= mysqli_query($productos, $sql);
    ?>

<h1>Crud de Productos</h1>
<div class="mt-3">
    <table class="table table-bordered" id="">
        <thead>
            <tr>
                <!-- filas de la tabla --->
                <th>id </th>
                <th> producto </th>
                <th> costo </th>
                <th> precio-Venta </th>
                <th> stock </th>
                <th> imagen </th>
                <th> acción </th>
            </tr>
        </thead>

        <tbody>
            <!--estructura de repeticion para mostrar productos --->
            <?php if($producto): ?>
            <?php foreach($producto as $producto): ?>
            <tr>
                <td> <?php echo $filas['id'] ?> </td>
                <td> <?php echo $filas['nombre_producto'] ?> </td>
                <td> <?php echo $filas['costo'] ?> </td>
                <td> <?php echo $filas['precioVenta'] ?> </td>
                <td> <?php echo $filas['stock'] ?> </td>
                <td> <?php echo $filas['imagen'] ?> </td>
                <td>
                    <!--accion borrar/editar --->
                    <?php  echo "<a href=''>Editar </a>"; ?>
                    <?php  echo "<a href=''>Borrar </a>"; ?>

                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php   
                 mysqli_close($productos);
            ?>
</div>

</html>