
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Lista de Tickets pendientes</h1>
          <p>Esta es la lista total de tickets pendientes de solucion. esta vista pertenece a los usuario tipo Empleado</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
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
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Estado Aprobación</th>
                    <th>Tipo de Caso</th>
                    <th>Usuario Creador</th>
                    <th>Descripción</th>
                    <th>Fecha Cración</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach 
                ($this->modelo->Listar() as $r): ?>
                  <tr>
                    <td><?=$r->idTicket?></td>
                    <td><?=$r->tipoEstado?></td>
                    <td><?=$r->TipoAprobacion?></td>
                    <td><?=$r->tipoCaso?></td>
                    <td><?=$r->usuario?></td>
                    <td><?=$r->Descripcion?></td>
                    <td><?=$r->FechaCreacion?></td>
                    <td><a href="?c=ticket&a=SolucionarEmpleado&id=<?=$r->idTicket?>">Solucionar</a></td>
                  </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
