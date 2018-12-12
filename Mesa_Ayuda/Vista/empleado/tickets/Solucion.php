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
            <h3 class="tile-title">Solución de caso</h3>
            <div class="tile-body">
              <!--<form class="form-horizontal" action="?c=ticket&a=Actualizar" method="POST">-->
              <form class="form-horizontal" action="#" method="POST">
                <div class="form-group row">
                  <label class="control-label col-md-3">Estado de aprobación</label>
                  <input type="hidden" name="id" value="<?=$p->getIdTicket()?>">
                  <input type="hidden" name="FechaCreacion" value="<?=$p->getFechaCreacion()?>">
                  <input type="hidden" name="usuario" value="<?=$p->getIdUsuario()?>">
                  <div class="col-md-8">
                    <select class="form-control" name="estado">
                      <option value="<?=$p->getIdAprobacion()?>">Sin estado</option>
                      <option value="1">Aprobado</option>
                      <option value="2">No Aprobado</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Nivel de caso</label>
                  <div class="col-md-8">
                    <select class="form-control" name="tipon">
                      <option value="<?=$p->getIdNivelCaso()?>">Sin Tipo</option>
                      <option value="1">Alta</option>
                      <option value="2">Media</option>
                      <option value="3">Baja</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Descripción</label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="Descripcion" rows="3" readonly="readonly" ><?=$p->getDescripcion()?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Solución</label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="Solucion" rows="3"><?=$p->getSolucion()?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Fecha de Solucion</label>
                  <div class="col-md-8">
                    <input class="form-control" name="FechaSolucion" id="demoDate" placeholder="Fecha" >
                  </div>
                </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" name="registrar" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Solucionar
                </div>
              </div>
            </div> 
              </form>
            </div>
          </div>
        </div>
    


    </main>