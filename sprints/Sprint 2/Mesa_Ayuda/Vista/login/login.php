<?php error_reporting(0); ?>
  <body>
<section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <img src="assets/img/logo_poli.png">
        <center>  
        <h1>Mesa de Ayuda</h1>
        </center>
      </div>
      <div class="login-box">
        <form class="login-form" action="?c=login&a=validacionUno" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" name="user"  type="text" placeholder="Usuario" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" name="pass"  type="password" placeholder="Contraseña">
          </div>
                    
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" ><i class="fa fa-sign-in fa-lg fa-fw"></i>Ingresar</button>

          </div><br>
          <center>
            
          <label class="control-label" style="color:RED;"><?=$mensaje?></label>
          </center>

          
        </form>
        
      </div>
    </section>
