<!--de la vista pasa al controlador donde hace la peticion de registro con el modelo
El modelo devuelve la peticion al controlador y este lo direciona a la vista ver usuarios

-->
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Crear Usuario</h1>
          <p>Formulario de <?=$formulario?> de Usuarios -vista Administrador</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="?c=inicio">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Crear Usuario</a></li>
        </ul>
      </div>

    <div class="col-md-15">
      
          <div class="tile">
            <h3 class="tile-title"><?=$titulo?> de Usuarios</h3>
            <div class="tile-body">
              <form class="form-horizontal" action="?c=UsuariosCreacion&a=Guardar" method="POST">
                <div class="form-group row">
                <input type="hidden" name="idusuario" value="<?=$u->getIdUsuario()?>">
                  <label class="control-label col-md-3">Nombre</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombre" type="text" value="<?=$u->getNombre()?>" placeholder="Nombre Completo">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Tipo De Documento</label>
                  <div class="col-md-8">
                    <select class="form-control" name="tipoD">
                      <option value="<?=$u->getIdTipoDocumento()?>">Seleccione tipo</option>
                      <option value="1">Cedula</option>
                      <option value="2">Tarjeta de Identidad</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Identificación</label>
                  <div class="col-md-8">
                    <input class="form-control" name="Identificacion" type="text" value="<?=$u->getIdentificacion()?>" placeholder="Identificacion">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Usuario</label>
                  <div class="col-md-8">
                    <input class="form-control" name="usuario" type="text" value="<?=$u->getUsuario()?>" placeholder="Usuario">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Privilegios de usuario</label>
                  <div class="col-md-8">
                    <select class="form-control" name="tipoP">
                      <option value="<?=$u->getIdtipousuario()?>">Seleccione privilegios</option>
                      <option value="1">Administrador</option>
                      <option value="2">Empleado</option>
                      <option value="3">Cliente</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Contraseña</label>
                  <div class="col-md-8">
                    <input class="form-control" name="passNormal" type="password" value="<?=$u->getContraseniaNormal()?>" placeholder="Contraseña">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Validar Contraseña</label>
                  <div class="col-md-8">
                    <input class="form-control" name="passEncriptada" type="password" value="<?=$u->getContraseniaEncriptada()?>" placeholder="Contraseña">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Estado del Usuario</label>
                  <div class="col-md-8">
                    <select class="form-control" name="tipoE">
                      <option value="<?=$u->getIdestadousuario()?>">Seleccione Estado</option>
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                  </div>
                </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" name="registrar" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$titBoton?>
                </div>
              </div>
            </div> 
              </form>
            </div>
          </div>
        </div>
    


    </main>