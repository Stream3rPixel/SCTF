<section class="content">
  <?php $user = CategoryData::getById($_GET["id"]); ?>
  <div class="row">
    <div class="col-md-12">
      <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Editar Área Médica</font>
      </p>
      <br>
      <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecategory" role="form">


        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Nombre</label>
          <div class="col-md-6">
            <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
            <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>