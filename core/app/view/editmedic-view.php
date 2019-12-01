<section class="content">
   <?php
   $user = MedicData::getById($_GET["id"]);
   $categories = CategoryData::getAll();
   ?>
   <div class="row">
      <div class="col-md-12">
      <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Editar Fisioterapeuta</font>
      </p>
         <br>
         <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=updatemedic" role="form">
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
               <label for="XD" class="col-lg-2 control-label">Área</label>
               <div class="col-md-6">
                  <select name="category_id" class="form-control">
                     <option value="">-- Seleccionar --</option>
                     <?php foreach ($categories as $cat) : ?>
                        <option value="<?php echo $cat->id; ?>" <?php if ($user->category_id == $cat->id) {
                                                                        echo "selected";
                                                                     } ?>><?php echo $cat->name; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Matrícula</label>
               <div class="col-md-6">
                  <input type="text" name="no" value="<?php echo $user->no; ?>" class="form-control" id="no" placeholder="Matrícula">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Nombre</label>
               <div class="col-md-6">
                  <input type="text" name="name" value="<?php echo $user->name; ?>" required class="form-control" id="name" placeholder="Nombre">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Apellido</label>
               <div class="col-md-6">
                  <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" class="form-control" id="lastname" placeholder="Apellido">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Dirección</label>
               <div class="col-md-6">
                  <input type="text" name="address" value="<?php echo $user->address; ?>" class="form-control" id="username" placeholder="Dirección">
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
            <div class="row">
               <div class="col-md-2"></div>
               <?php
               $data = array(1 => "Lunes", 2 => "Martes", 3 => "Miercoles", 4 => "Jueves", 5 => "Viernes");
               ?>
               <div class="col-md-7">
                  <?php
                  foreach ($data as $k => $v) :
                     $datax = $user->{'time' . $k . '_data'};
                     $datax = htmlspecialchars_decode($datax);
                     $datax = unserialize($datax);
                     //print_r($datax);
                     ?>
                     <div class="form-group">
                        <div class="col-md-1">
                           <label for="XD" class="control-label"><?php echo $v; ?></label>
                           <input type="checkbox" <?php if ($datax["time_active"] == 1) {
                                                         echo "checked";
                                                      } ?> name="time_active_<?php echo $k; ?>">
                        </div>
                        <div class="col-md-2">
                           <label for="inputEmail1" class="control-label">Entrada </label>
                           <input type="time" name="time1_start_<?php echo $k; ?>" class="form-control" id="time1_start" value="<?php echo $datax['time1_start']; ?>" placeholder="Entrada">
                        </div>
                        <div class="col-md-2">
                           <label for="inputEmail1" class="control-label">Salida </label>
                           <input type="time" name="time1_finish_<?php echo $k; ?>" class="form-control" id="time1_finish" value="<?php echo $datax['time1_finish']; ?>" placeholder="Salida">
                        </div>
                        <div class="col-md-2">
                           <label for="inputEmail1" class="control-label">Duración de la cita </label>
                           <input type="text" name="duration_<?php echo $k; ?>" required class="form-control" id="duration" value="<?php echo $datax['duration']; ?>" placeholder="Duración de la cita">
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
            <div class="form-group">
               <div class="col-lg-offset-2 col-lg-10">
                  <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                  <button type="submit" class="btn btn-success">Actualizar Fisioterapeuta</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>