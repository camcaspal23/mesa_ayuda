<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Cantidad de casos</h1>
          <p></p>
          
        </div>

        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active"><a href="#">Cantidad de Casos</a></li> 
          <p></p>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">

              <table class="table table-hover table-bordered" id="sampleTable">
                <h1>Casos</h1>
                <thead>
                  <tr>
                    <th>Total</th>
                    <th>Pendientes</th>
                    <th>Solucionados</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td><?php $p=$this->modelo->CantidadTotal()?><?=$p->Cantidad?></td>
                  <td><?php $p=$this->modelo->CantidadAbiertos()?><?=$p->Cantidad?></td>
                  <td><?php $p=$this->modelo->CantidadSolucionados()?><?=$p->Cantidad?></td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>