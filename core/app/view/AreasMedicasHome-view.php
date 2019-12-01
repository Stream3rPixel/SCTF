<section class="content">
   <div class="row">
      <div class="col-md-12">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Áreas Médicas</font>
         </p>
         <div class="container">
            <div class="row">
               <div class="col text-center">
                  <a href="index.php?view=AreasMedicasAdd" class="btn btn-success"><i class='fa fa-th-list'></i> Nueva Área Médica</a>
               </div>
            </div>
         </div>
         <br>
         <br>
         <?php
         $users = CategoryData::getAll();
         if (count($users) > 0) {
            // si hay usuarios
            ?>
            <div class="col-12">
               <div class="box box-primary" data-widget="box-widget">
                  <div class="box-header">
                     <table class="table table-bordered table-striped datatable">
                        <!--<table class="responsive-table table table-bordered table-hover">-->
                        <thead>
                           <th>Nombre</th>
                           <th></th>
                        </thead>
                        <?php
                           foreach ($users as $user) {
                              ?>
                           <tr>
                              <td><?php echo $user->name . " " . $user->lastname; ?></td>
                              <td style="width:100px;">
                                 <center>
                                    <div class="btn-group-justified">
                                       <a href="index.php?view=AreasMedicasEdit&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:goldenrod" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                       <a onClick="return confirm('¿Esta seguro que desea eliminar el área Médica?')" href="index.php?view=AreasMedicasDel&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:red" rel="tooltip" title="Eliminar"><i class="fa fa-trash"> </i></a>
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
            <?php
            } else {
               echo "<p class='alert alert-danger'>No hay Categorias</p>";
            }


            ?>
            </div>
      </div>
</section>