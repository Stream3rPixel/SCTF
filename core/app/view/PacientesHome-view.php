<section class="content">
   <div class="row">
      <div class="col-md-12">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Pacientes</font>
         </p>
         <div class="container">
            <div class="row">
               <div class="col text-center">
                  <a href="index.php?view=newpacient" class="btn btn-success"><i class='fa fa-male'></i> Nuevo Paciente</a>
               </div>
            </div>
         </div>
         <br>
         <br>
         <?php
         $users = PacientData::getAll();
         if (count($users) > 0) {
            // si hay usuarios
            ?>
            <div class="col-12">
               <div class="box box-primary" data-widget="box-widget">
                  <div class="box-header">
                     <table class="table table-bordered table-striped datatable">
                        <!--<table class="responsive-table table table-bordered table-hover">-->
                        <thead>
                           <th>CURP.</th>
                           <th>Foto</th>
                           <th>Nombre completo</th>
                           <th>Dirección</th>
                           <th>Email</th>
                           <th>Teléfono</th>
                           <th>Operaciones</th>
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
                              <td>
                                 <center>
                                    <div class="btn-group">
                                       <a href="./?view=pacient&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:dodgerblue" rel="tooltip" title="Descargar"><i class='fa fa-folder-open'></i></a>
                                       <a href="index.php?view=editpacient&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:goldenrod" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                       <a onClick="return confirm('¿Estas seguro que deseas eliminar al paciente?')" href="index.php?view=delpacient&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:red" rel="tooltip" title="Eliminar"><i class="fa fa-trash"> </i></a>
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
            echo "<p class='alert alert-danger'>No hay pacientes</p>";
         }

         ?>
      </div>
   </div>
</section>