<section class="content">
   <div class="row">
      <div class="col-md-12">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Fisioperapeutas</font>
         </p>
         <div class="container">
            <div class="row">
               <div class="col text-center">
                  <a href="index.php?view=newmedic" class="btn btn-success"><i class='fa fa-user-md'></i> Nuevo Fisioterapeuta</a>
               </div>
            </div>
         </div>
         <br>
         <br>
         <?php
         $users = MedicData::getAll();
         if (count($users) > 0) {
            // si hay usuarios
            ?>
            <div class="col-12">
               <div class="box box-primary" data-widget="box-widget">
                  <div class="box-header">
                     <table class="table table-bordered table-striped datatable">
                        <!--<table class="responsive-table table table-bordered table-hover">-->
                        <thead>
                           <th>Matrícula</th>
                           <th>Foto</th>
                           <th>Nombre completo</th>
                           <th>Dirección</th>
                           <th>Email</th>
                           <th>Teléfono</th>
                           <th>Especialidad</th>
                           <th></th>
                        </thead>
                        <?php
                           foreach ($users as $user) {
                              ?>
                           <tr>
                              <td><?php echo $user->no; ?></td>
                              <td style="width:50px; height: 50px; border-radius: 5%;"><?php if ($user->image != "") : ?><img src="storage/<?php echo $user->image; ?>" class="img-responsive"><?php endif; ?></td>
                              <td><?php echo $user->name . " " . $user->lastname; ?></td>
                              <td><?php echo $user->address; ?></td>
                              <td><?php echo $user->email; ?></td>
                              <td><?php echo $user->phone; ?></td>
                              <td><?php if ($user->category_id != null) {
                                             echo $user->getCategory()->name;
                                          } ?></td>
                              <td style="width:100px;">
                                 <center>
                                    <div class="btn-group-justified">
                                       <a href="index.php?view=editmedic&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:goldenrod" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                       <a onClick="return confirm('¿Esta seguro que desea eliminar al Fisioterapeuta?')" href="index.php?view=delmedic&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:red" rel="tooltip" title="Eliminar"><i class="fa fa-trash"> </i></a>
                                    </div>
                                 </center>
                              </td>
                           </tr>
                        <?php
                           }
                           ?>
                     </table>
                  </div>
               </div>
            </div>
         <?php
         } else {
            echo "<p class='alert alert-danger'>No hay Fisioterapeutas</p>";
         }

         ?>
      </div>
   </div>
</section>