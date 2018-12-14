
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Lista de Tickets Abiertos</h1>
          <p>Esta es la lista total de tickets Abiertos por el cliente a falta de solucion. esta vista pertenece a los usuario tipo Cliente</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg" ></i></li>
          <li class="breadcrumb-item"><a href="#">Incio</a></li>
          <li class="breadcrumb-item active"><a href="#">ticket</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Ticket</th>
                    <th>Estado</th>
                    <th>Usuario Creador</th>
                    <th>Descripción</th>
                    <th>Fecha Cración</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach 
                ($this->modelo->ListarAbierto() as $r): ?>
                  <tr>
                    <td><?=$r->idTicket?></td>
                    <td><?=$r->tipoEstado?></td>
                    <td><?=$r->usuario?></td>
                    <td><?=$r->Descripcion?></td>
                    <td><?=$r->FechaCreacion?></td>
                  </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>