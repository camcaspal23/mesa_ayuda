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
                  
                  <div class="tile-footer">
                    <button class="btn btn-primary" name="crear" type="submit">Crear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
