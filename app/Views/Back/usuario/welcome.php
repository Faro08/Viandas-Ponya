<main>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">

                <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">

                    <?= session()->getFlashdata('msg')?>
                </div>
                <?php endif;?>
                <br><br>
                <?php if(session()->perfil_id == 1): ?>
                <div>
                    <!-- <img class="center" height="100px" width="80px" src="<?php echo base_url ('img/admin.jpg');?>"
                    alt="img admin"> -->
                    <h1>Bienvenido admin</h1>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php print_r($ventaDetalle) ?>
                </div>


                <?php elseif(session()->perfil_id == 2): ?>
                <div>
                    <!-- <img class="center" height="100px" width="80px" src="<?php echo base_url ('img/carrito.jpg');?>"
                    alt="img admin"> -->
                    <h1>Bienvenido usuario</h1>

                </div>

                <?php endif;?>
            </div>
        </div>
    </div>
</main>