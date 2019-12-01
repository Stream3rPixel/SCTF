<?php
$p = PacientData::getById($_GET["id"]);
?>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <BR>
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Archivos</font>
         </p>
         <h2><?php echo $p->name . " " . $p->lastname; ?>
         </h2>
         <a href="./?view=newfile&pid=<?php echo $p->id; ?>" class="btn btn-default">Nuevo archivo</a>
         <br><br>
         <?php
         $users = FileData::getAllByPacientId($p->id);
         if (count($users) > 0) {
            // si hay usuarios
            ?>
            <div class="col-12">
               <div class="box box-primary">
                  <div class="box-body">
                     <table class="table table-bordered table-hover datatable">
                        <div class="panel-responive">
                           <table class="table table-bordered table-hover datatable">
                              <thead>
                                 <th>Archivo</th>
                                 <th>Tipo</th>
                                 <th>Fecha</th>
                                 <th></th>
                              </thead>
                              <?php
                                 foreach ($users as $user) {
                                    ?>
                                 <tr>
                                    <td><?php echo $user->title; ?></td>
                                    <td><?php echo $user->getDoctype()->name; ?></td>
                                    <td><?php echo $user->created_at; ?></td>
                                    <td>
                                       <center>
                                          <div class="btn-group">
                                             <a href="index.php?action=files&opt=download&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:dodgergray" rel="tooltip" title="Descargar"><i class='fa fa-download'></i></a>
                                             <a href="index.php?view=editfile&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:goldenrod" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                             <a onClick="return confirm('¿Estas seguro que deseas eliminar al paciente?')" href="index.php?action=files&opt=del&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:red" rel="tooltip" title="Eliminar"><i class="fa fa-trash"> </i></a>
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
                  echo "<p class='alert alert-danger'>No hay archivos</p>";
               }
               ?>
               </div>
            </div>
</section>