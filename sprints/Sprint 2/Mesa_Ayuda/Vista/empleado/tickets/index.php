
    <html>
<body>
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
      <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th aria-controls="sampleTable">ID</th>
                    <th aria-controls="sampleTable">Estado</th>
                    <th aria-controls="sampleTable">Estado Aprobación</th>
                    <th aria-controls="sampleTable">Tipo de Caso</th>
                    <th aria-controls="sampleTable">Usuario Creador</th>
                    <th aria-controls="sampleTable">Descripción</th>
                    <th aria-controls="sampleTable">Fecha Cración</th>
                    <th aria-controls="sampleTable">Acciones</th>
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
                    <td><a href="?c=ticket&a=SolucionarEmpleado&id=<?=$r->idTicket?>">Solucionar | </a><a href="?c=ticket&a=SeguimientoEmpleado&id=<?=$r->idTicket?>">Seguimiento</a></td>
                  </tr>
              <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="diseño/js/jquery-3.2.1.min.js"></script>
<script src="diseño/js/main .js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="diseño/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="diseño/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="diseño/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>
</html>