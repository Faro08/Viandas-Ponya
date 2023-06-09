<main class="bg-ponya ">
    <div class="container text-center container-about">
        <h1 class="mt-5 font-handlee separador-titulo-200">CONTACTO</h1>
        <div>
            <!--recuperamos datos con la función Flashdata para mostrarlos-->
            <?php if (session()->getFlashdata('success')) {
      echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    } ?>
        </div>
        <!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
        <?php $validation = \Config\Services::validation(); ?>
        <div class="mt-5 row gx-5">
            <div class="col-lg-7 px-5">
                <h3 class="font-handlee" style="text-align: justify">Podes contactarnos con el siguiente formulario y
                    nos pondremos
                    en contacto a la brevedad</h3>
                <!-- FORMULARIO DE CONSULTA -->
                <form class="pt-3" method="post" action="<?php echo base_url('/send-consulta') ?>">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label font-handlee">Nombre</label>
                            <input name="nombre" type="text" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label font-handlee">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="nombre@ejemplo.com"
                                required>
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label font-handlee">Mensaje</label>
                        <textarea name="mensaje" class="form-control" id="exampleFormControlTextarea1" rows="8"
                            required></textarea>
                    </div>
                    <input type="submit" value="Enviar" class="btn btn-lg button-ordenarOnline font-handlee mb-5"
                        style="width:200px;">
                    <button class="btn btn-lg button-ordenarOnline font-handlee mb-5" style="width:200px;"
                        type="reset">Limpiar</button>
                </form>
            </div>
            <div class="col-lg-5 pt-4 pb-4">
                <!-- <h1 class="mt-5 font-handlee">CONTACTO</h1> -->
                <!-- <h3>Nuestro horario es de 11:00 a 23:00</h3>
                <h3>Estamos en Rivadavia 632 Corrientes, Capital</h3>
                <h3>viandasponya@gmail.com</h3>
                <h3>3794 - 123456</h3> -->
                <div class="container d-flex p-1 contact-info-items">
                    <img class="icon-color-green2 me-3" src="assets/bootstrap-icons-1.10.4/clock-history.svg"
                        alt="icono horario" width="27" height="27">
                    <h4 class="font-handlee">Horario de 11:00 a 23:00</h4>
                </div>
                <div class="container d-flex p-1 contact-info-items">
                    <img class="icon-color-green2 me-3" src="assets/bootstrap-icons-1.10.4/geo-alt.svg"
                        alt="icono localizacion" width="27" height="27">
                    <h4 class="font-handlee">Estamos en Rivadavia 632 </h4>
                </div>
                <div class="container d-flex p-1 contact-info-items">
                    <img class="icon-color-green2 me-3" src="assets/bootstrap-icons-1.10.4/envelope.svg"
                        alt="icono envelope" width="27" height="27">
                    <h4 class="font-handlee">viandasponya@gmail.com</h4>
                </div>
                <div class="container d-flex p-1 contact-info-items">
                    <img class="icon-color-green2 me-3" src="assets/bootstrap-icons-1.10.4/telephone.svg"
                        alt="icono telefono" width="27" height="27">
                    <h4 class="font-rochester">3794 - 123456</h4>
                </div>
                <div class="container d-flex p-1 contact-info-items">
                    <img class="icon-color-green2 me-3" src="assets/bootstrap-icons-1.10.4/whatsapp.svg"
                        alt="icono whatsapp" width="27" height="27">
                    <h4 class="font-rochester">3794 - 789012</h4>
                </div>
            </div>
        </div>
    </div>
</main>