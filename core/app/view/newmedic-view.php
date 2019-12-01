<section class="content">
   <?php
   $categories = CategoryData::getAll();
   ?>
   <div class="row">
      <div class="col-md-12">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Nuevo Fisioterapeuta</font>
         </p>

         <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=FisioAdd" role="form">
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Imagen</label>
               <div class="col-md-6">
                  <input type="file" name="image">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Área</label>
               <div class="col-md-6">
                  <select name="category_id" class="form-control">
                     <option value="">-- seleccionar --</option>
                     <?php foreach ($categories as $cat) : ?>
                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Matrícula</label>
               <div class="col-md-6">
                  <input type="text" name="no" class="form-control" id="no" placeholder="Matrícula">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Nombre</label>
               <div class="col-md-6">
                  <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Apellido</label>
               <div class="col-md-6">
                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Apellido">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Dirección</label>
               <div class="col-md-6">
                  <input type="text" name="address" class="form-control" id="address" placeholder="Dirección">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Email</label>
               <div class="col-md-6">
                  <input type="text" name="email" class="form-control" id="email" placeholder="Email">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Teléfono</label>
               <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Teléfono">
               </div>
            </div>
            <div class="row">
               <div class="col-md-2"></div>
               <?php
               $data = array(1 => "Lunes", 2 => "Martes", 3 => "Miercoles", 4 => "Jueves", 5 => "Viernes");
               ?>
               <div class="col-md-7">
                  <?php foreach ($data as $k => $v) : ?>
                     <div class="form-group">
                        <div class="col-md-1">
                           <label for="XD" class="control-label"><?php echo $v; ?></label>
                           <input type="checkbox" checked name="time_active_<?php echo $k; ?>">
                        </div>
                        <div class="col-md-2">
                           <label for="inputEmail1" class="control-label">Entrada </label>
                           <input type="time" name="time1_start_<?php echo $k; ?>" class="form-control" id="time1_start" value="10:00" placeholder="Entrada">
                        </div>
                        <div class="col-md-2">
                           <label for="inputEmail1" class="control-label">Salida </label>
                           <input type="time" name="time1_finish_<?php echo $k; ?>" class="form-control" id="time1_finish" value="17:00" placeholder="Salida">
                        </div>
                        <div class="col-md-2">
                           <label for="inputEmail1" class="control-label">Duración de la cita </label>
                           <input type="text" name="duration_<?php echo $k; ?>" required class="form-control" id="duration" value="60" placeholder="Duración de la cita">
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-lg-offset-2 col-lg-10">
                  <button type="submit" class="btn btn-success">Agregar Fisioterapeuta</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>