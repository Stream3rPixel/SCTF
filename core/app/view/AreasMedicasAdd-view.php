<div class="content">
  <div class="row">
    <div class="col-md-12">
      <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Nueva Área Médica</font>
      
      </p>
      <br>
      <form class="form-horizontal" method="post" id="AreasMedicasAdd" action="index.php?view=AreasMedicasAdd" role="form">


        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Nombre</label>
          <div class="col-md-6">
            <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Agregar Área Médica</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php

if (count($_POST) > 0) {
  $user = new CategoryData();
  $user->name = $_POST["name"];
  $user->add();

  print "<script>window.location='index.php?view=AreasmedicasHome';</script>";
}


?>