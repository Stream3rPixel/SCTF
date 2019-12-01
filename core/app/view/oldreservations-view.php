<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="btn-group pull-right">
         </div>
         <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Cita Anteriores</font>
      </p>
         <?php
            $users = ReservationData::getOld();
            if(count($users)>0){
            	// si hay usuarios
            	?>
         <div class="box box-primary">
            <div class="box-body">
               <table class="table table-bordered table-hover datatable">
                  <thead>
                     <th>Folio</th>
                     <th>Servicio</th>
                     <th>Paciente</th>
                     <th>Fisioterapeuta</th>
                     <th>Fecha</th>
                     <th>Estado</th>
                     <th>Pago</th>
                     <th>Costo</th>
                     <th>Acciones</th>
                  </thead>
                  <?php
                     foreach($users as $user){
                     	$pacient  = $user->getPacient();
                     	$medic = $user->getMedic();
                     	?>
                  <tr>
                     <td><?php echo $user->no; ?></td>
                     <td><?php echo $user->title; ?></td>
                     <td><?php echo $pacient->name." ".$pacient->lastname; ?></td>
                     <td><?php echo $medic->name." ".$medic->lastname; ?></td>
                     <td><?php echo $user->date_at." ".$user->time_at; ?></td>
                     <td><?php echo $user->getStatus()->name; ?></td>
                     <td><?php echo $user->getPayment()->name; ?></td>
                     <td>$ <?php echo number_format($user->price,2,".",",");?></td>
                     <td style="width:150px;">
                        
                        <a href="./report/reservation-word.php?id=<?php echo $user->id;?>"  class="btn btn-default" style="color:dodgerblue" rel="tooltip" title="Descargar"><i class="fa fa-file-word-o"></i></a>
                        <a href="index.php?view=editreservation&id=<?php echo $user->id;?>" class="btn btn-default" style="color:goldenrod" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                        <a onClick="return confirm('¿Estas seguro que deseas eliminar la cita?')" href="index.php?action=delreservation&id=<?php echo $user->id;?>" class="btn btn-default" style="color:red" rel="tooltip" title="Eliminar"><i class="fa fa-trash"> </i></a>
                     </td>
                  </tr>
                  <?php
                     }
                     ?>
               </table>
            </div>
         </div>
         <?php
            }else{
            	echo "<p class='alert alert-info'>No hay citas</p>";
            }
            
            
            ?>
      </div>
   </div>
</section>