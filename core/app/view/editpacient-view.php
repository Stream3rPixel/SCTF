<section class="content">
  <?php $user = PacientData::getById($_GET["id"]); ?>
  <div class="row">
    <div class="col-md-12">
      <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Nuevo Paciente</font>
      </p>
      <br>
      <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=updatepacient" role="form">

        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Imagen</label>
          <div class="col-md-1">
            <?php if ($user->image != "") : ?>
              <img src="storage/<?php echo $user->image; ?>" class="img-responsive">
              <br><?php endif; ?>
            <input type="file" name="image">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">CURP</label>
          <div class="col-md-6">
            <input type="text" name="no" value="<?php echo $user->no; ?>" class="form-control" id="no" placeholder="CURP">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Nombre</label>
          <div class="col-md-6">
            <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Apellido</label>
          <div class="col-md-6">
            <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Género*</label>
          <div class="col-md-6">
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" name="gender" required <?php if ($user->gender == "h") {
                                                                                echo "checked";
                                                                              } ?> value="h"> Hombre
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox2" name="gender" required <?php if ($user->gender == "m") {
                                                                                echo "checked";
                                                                              } ?> value="m"> Mujer
            </label>

          </div>
        </div>

        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Fec. Nacimiento</label>
          <div class="col-md-6">
            <input type="date" name="day_of_birth" class="form-control" value="<?php echo $user->day_of_birth; ?>" id="address1" placeholder="Fec. Nacimiento">
          </div>
        </div>

        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Dirección</label>
          <div class="col-md-6">
            <input type="text" name="address" value="<?php echo $user->address; ?>" class="form-control" id="username" placeholder="Dirección">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Código Postal</label>
          <div class="col-md-6">
            <input type="text" name="cp" value="<?php echo $user->cp; ?>" class="form-control" id="username" placeholder="Código Postal">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Municipio</label>
          <div class="col-md-6">
            <input type="text" name="pob" value="<?php echo $user->pob; ?>" class="form-control" id="username" placeholder="Municipio">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Email</label>
          <div class="col-md-6">
            <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Teléfono</label>
          <div class="col-md-6">
            <input type="text" name="phone" value="<?php echo $user->phone; ?>" class="form-control" id="XD" placeholder="Teléfono">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Diagnóstico</label>
          <div class="col-md-6">
            <textarea name="sick" class="form-control" id="sick" placeholder="Diagnóstico"><?php echo $user->sick; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Tratamiento</label>
          <div class="col-md-6">
            <textarea name="medicaments" class="form-control" id="sick" placeholder="Tratamiento"><?php echo $user->medicaments; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Tratar en el Área:</label>
          <div class="col-md-6">
            <textarea name="alergy" class="form-control" id="sick" placeholder="Tratar en el Área:"><?php echo $user->alergy; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
            <button type="submit" class="btn btn-success">Actualizar Paciente</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>