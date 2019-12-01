<section class="container">
  <div class="row">
    <div class="col-md-10">
      <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Registrar Usuarios</font>
      </p>
      <br>
      <br>
      <br>
      <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=UsuarioAdd" role="form">
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Nombre</label>
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Apellido</label>
          <div class="col-md-6">
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Nickname</label>
          <div class="col-md-6">
            <input type="text" name="username" class="form-control" required id="username" placeholder="Usuario">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Email</label>
          <div class="col-md-6">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>

        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Contrase&ntilde;a</label>
          <div class="col-md-6">
            <input type="password" name="password" class="form-control" id="XD" placeholder="Contrase&ntilde;a">
          </div>
        </div>

        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Administrador</label>
          <div class="col-md-6">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="is_admin">
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>