</aside>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Lista de Tickets Solucionados</h1>
            <p>Esta es la lista total de tickets Abiertos por el cliente a falta de solucion. esta vista pertenece a los
                usuario tipo Cliente</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
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
                            <th>Usuario</th>
                            <!--<th>Estado Aprobación</th>-->
                            <th>Tipo de Caso</th>
                            <th>Usuario Solucion</th>
                            <th>Solucion</th>
                            <th>Fecha Solucion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $usuario = $_SESSION['usuario'] ?>
                        <?php foreach
                        ($this->modelo->ListarSolucionado() as $r): ?>
                            <?php if ($r->usuario == $usuario->usuario): ?>
                                <tr>
                                    <td><?= $r->idTicket ?></td>
                                    <td><?= $r->tipoEstado ?></td>
                                    <td><?= $r->usuario ?></td>
                                     <!-- <td><?= $r->TipoAprobacion ?></td>-->
                                    <td><?= $r->tipoCaso ?></td>
                                    <td><?= $r->usuarioSolucion ?></td>
                                    <td><?= $r->Solucion ?></td>
                                    <td><?= $r->FechaSolucion ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>