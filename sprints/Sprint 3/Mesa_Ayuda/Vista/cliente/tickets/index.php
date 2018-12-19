<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Crear Ticket</h1>
          <p>Formulario de creacion de incidente -vista Cliente</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Crear Ticket</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">

                <form method="POST" action="?c=ticket&a=Guardar">


                  <div class="form-group">
                    <label for="exampleTextarea">Descripción</label>
                    <textarea required class="form-control" name="Descripcion" rows="3" ></textarea>
                  </div>

                    <!--
                      Modelo de Fecha
                    <div class="tile-body">
                      <label for="exampleSelect1">Fecha de Creación</label>
                      <input required class="form-control" name="fechaCreacion" id="demoDate" type="text" placeholder="Seleccionar Fecha">
                    </div>-->

                    <div class="form-group">
                  <label class="control-label col-md-3">Categoria Ticket</label>

                  <div class="col-md-8">
                    <select class="form-control" name="categoria">
                      <option value="">Sin Categoria</option>
                      <option value="1">Academico</option>
                      <option value="2">Administrativo</option>
                      <option value="3">Financiero</option>
                      <option value="4">Informativo</option>
                      <option value="5">PQR</option>
                      <option value="6">Tecnologico</option>
                    </select>
                  </div>
                </div>


                  <div class="tile-footer">
                    <button class="btn btn-primary" type="button" name="crear"  data-target="#exampleModalCenter" data-toggle="modal"66>Crear</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Notificacion de creacion de Ticket</h5>
                          </div>
                          <div class="modal-body">
                            <?php $usuario = $_SESSION['usuario'] ?>
                            <?php
                          //sleep(5);
                            foreach
                            ($this->modelo->ListarUltimoAbierto() as $r): ?>
                                    
                                    <tr>
                                      Registrado con número de ticket " <td><?= $r->idTicket+1 ?></td> ", el estado del ticket es: <td><?= $r->tipoEstado ?></td>. <br/>El ticket fue creado: <td><?= $r->FechaCreacion ?></td>
                                    </tr>
                                
                            <?php endforeach; ?>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
