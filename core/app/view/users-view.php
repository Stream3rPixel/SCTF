<?php $u = UserData::getById($_SESSION["user_id"]); ?>
<?php if ($u->is_admin) : ?>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <p align="center" style="font-weight: bold;">
               <font size="5" color="#01374C">Usuarios</font>
            </p>
            <div class="container">
               <div class="row">
                  <div class="col text-center">
                     <a href="index.php?view=newuser" class="btn btn-success"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
                  </div>
               </div>
            </div>
            <br>
            <br>
            <?php
               ?>
            <?php
               $users = UserData::getAll();
               if (count($users) > 0) {
                  // si hay usuarios
                  ?>
               <div class="box box-primary">
                  <div class="box-body">
                     <table class="table table-bordered table-striped datatable">
                        <thead>
                           <th>Nombre completo</th>
                           <th>Nick</th>
                           <th>Email</th>
                           <th>Activo</th>
                           <th>Admin</th>
                           <th></th>
                        </thead>
                        <?php
                              foreach ($users as $user) {
                                 ?>
                           <tr>
                              <td><?php echo $user->name . " " . $user->lastname; ?></td>
                              <td><?php echo $user->email; ?></td>
                              <td><?php echo $user->username; ?></td>
                              <td>
                                 <?php if ($user->is_active) : ?>
                                    <i class="glyphicon glyphicon-ok"></i>
                                 <?php endif; ?>
                              </td>
                              <td>
                                 <?php if ($user->is_admin) : ?>
                                    <i class="glyphicon glyphicon-ok"></i>
                                 <?php endif; ?>
                              <td style="width:100px;">
                                 <center>
                                    <div class="btn-group-justified">
                                       <a href="index.php?view=edituser&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:goldenrod" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                       <a onClick="return confirm('¿Esta seguro que desea eliminar al Usuario?')" href="index.php?action=deluser&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:red" rel="tooltip" title="Eliminar"><i class="fa fa-trash"> </i></a>
                                    </div>
                                 </center>
                              </td>
                           </tr>
                     <?php
                           }
                           echo "</table></div></div>";
                        } else {
                           // no hay usuarios
                        }
                        ?>
                     </table>
                  </div>
               </div>
   </section>
<?php endif; ?>