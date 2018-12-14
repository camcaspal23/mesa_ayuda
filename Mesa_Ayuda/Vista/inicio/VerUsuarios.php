<!--    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Lista de Usuarios</h1>
          <p>Esta es la lista total de usuarios creados. esta vista pertenece a los usuario tipo Administrador</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg" ></i></li>
          <li class="breadcrumb-item"><a href="?c=Inicio">Incio</a></li>
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
                    <th>Cargo</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                <?php /*foreach 
                ($this->modelo->Listar() as $r): ?>
                  <tr>
                    <td><?=$r->idusuario?></td>
                    <td><?=$r->cargo?></td>
                    <td><?=$r->nombre?></td>
                    <td><?=$r->usuario?></td>
                    <td><?=$r->Estado?></td>
                    <th><a href="?c=UsuariosCreacion&a=Crear&id=<?=$r->idusuario?>">Editar</a></th>
                  </tr>
              <?php endforeach;*/ ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>-->