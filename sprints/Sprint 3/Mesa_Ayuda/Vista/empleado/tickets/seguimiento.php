<!--Cuando se haga el manejo de sesiones,
 se va enviar el usuario en sesion para la actualizacion del caso-->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Solucionar caso</h1>
            <p>Formulario de Solucion de casos -vista Empleado</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item"><a href="#">Solucionar caso</a></li>
        </ul>
    </div>

    <div class="col-md-15">

        <div class="tile">
            <h3 class="tile-title">Seguimiento de caso</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="?c=ticket&a=ActualizarSeguimiento" method="POST">

                    <div class="form-group row">
                        <label class="control-label col-md-3">Descripción</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="Descripcion" rows="3"
                                      readonly="readonly"><?= $p->getDescripcion() ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Seguimiento</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="Seguimiento"
                                      rows="3"><?= $p->getSeguimiento() ?></textarea>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" name="registrar" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i>Realizar Seguimiento
                            </div>
                        </div>
                    </div>
                    <!--Datos hidden-->
                    <div class="form-group row">
                        <input type="hidden" name="id" value="<?= $p->getIdTicket() ?>">
                        <input type="hidden" name="estado" value="<?= $p->getIdAprobacion() ?>">
                        <input type="hidden" name="tipon" value="<?= $p->getIdNivelCaso() ?>">
                        <input type="hidden" name="usuario" value="<?= $p->getIdUsuario() ?>">
                        <input type="hidden" name="Solucion" value="<?= $p->getSolucion() ?>">
                        <input type="hidden" name="FechaCreacion" value="<?= $p->getFechaCreacion() ?>">
                        <input type="hidden" name="FechaSolucion" value="<?= $p->getFechaSolucion() ?>">
                        <input type="hidden" name="usuarioSolucion" value="<?= $p->getUsuarioSolucion() ?>"></div>


                </form>
            </div>
        </div>
    </div>


</main>