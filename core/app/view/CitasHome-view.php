<section class="content">
   <div class="row">
      <div class="col-md-12">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Citas</font>
         </p>
         <form class="form-horizontal" role="form">
            <input type="hidden" name="view" value="CitasHome">
            <?php
            $pacients = PacientData::getAll();
            $medics = MedicData::getAll();
            ?>
            <input type="text" name="q" <?php if (isset($_GET["q"]) && $_GET["q"] != "") {
                                             echo $_GET["q"];
                                          } ?>" style="visibility:hidden">
            <input type="text" name="date_at" value="<?php if (isset($_GET["date_at"]) && $_GET["date_at"] != "") {
                                                         echo $_GET["date_at"];
                                                      } ?>" style="visibility:hidden">
            <div class="form-group">
               <div class="col-lg-3">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-male"></i></span>
                     <select name="pacient_id" class="form-control">
                        <option value="">Paciente</option>
                        <?php foreach ($pacients as $p) : ?>
                           <option value="<?php echo $p->id; ?>" <?php if (isset($_GET["pacient_id"]) && $_GET["pacient_id"] == $p->id) {
                                                                        echo "selected";
                                                                     } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                     <select name="medic_id" class="form-control">
                        <option value="">Fisioterapeuta</option>
                        <?php foreach ($medics as $p) : ?>
                           <option value="<?php echo $p->id; ?>" <?php if (isset($_GET["medic_id"]) && $_GET["medic_id"] == $p->id) {
                                                                        echo "selected";
                                                                     } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="col-lg-2">
                  <div class="input-group">
                     <span class="input-group-addon"><i class='fa fa-calendar-o'></i></span>
                     <a href="./index.php?view=newreservation" class="btn btn-success btn-block"> Nueva cita</a>
                  </div>
               </div>
               <div class="col-lg-2">
                  <div class="input-group">
                     <span class="input-group-addon"><i class='fa fa-history'></i></span>
                     <a href="./index.php?view=oldreservations" class="btn btn-default btn-block"> Citas Anteriores</a>
                  </div>
               </div>
               <div class="col-lg-2">
                  <button class="btn btn-primary btn-block">Buscar</button>
               </div>
            </div>
         </form>
         <?php
         $users = array();
         if ((isset($_GET["q"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"]) && isset($_GET["date_at"])) && ($_GET["q"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "" || $_GET["date_at"] != "")) {
            $sql = "select * from reservation where ";
            if ($_GET["q"] != "") {
               $sql .= " title like '%$_GET[q]%' and note like '%$_GET[q] %' ";
            }

            if ($_GET["pacient_id"] != "") {
               if ($_GET["q"] != "") {
                  $sql .= " and ";
               }
               $sql .= " pacient_id = " . $_GET["pacient_id"];
            }

            if ($_GET["medic_id"] != "") {
               if ($_GET["q"] != "" || $_GET["pacient_id"] != "") {
                  $sql .= " and ";
               }

               $sql .= " medic_id = " . $_GET["medic_id"];
            }

            if ($_GET["date_at"] != "") {
               if ($_GET["q"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "") {
                  $sql .= " and ";
               }

               $sql .= " date_at = \"" . $_GET["date_at"] . "\"";
            }

            $users = ReservationData::getBySQL($sql);
         } else {
            $users = ReservationData::getAll();
         }
         if (count($users) > 0) {
            // si hay usuarios
            ?>
            <div class="col-12">
               <div class="box box-primary" data-widget="box-widget">
                  <div class="box-header">
                     <table class="table table-bordered table-striped datatable">
                        <!--<table class="responsive-table table table-bordered table-hover">-->
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
                           foreach ($users as $user) {
                              $pacient  = $user->getPacient();
                              $medic = $user->getMedic();
                              ?>
                           <tr>
                              <td><?php echo $user->no; ?></td>
                              <td><?php echo $user->title; ?></td>
                              <td><?php echo $pacient->name . " " . $pacient->lastname; ?></td>
                              <td><?php echo $medic->name . " " . $medic->lastname; ?></td>
                              <td><?php echo $user->date_at . " " . $user->time_at; ?></td>
                              <td><?php echo $user->getStatus()->name; ?></td>
                              <td><?php echo $user->getPayment()->name; ?></td>
                              <td>$ <?php echo number_format($user->price, 2, ".", ","); ?></td>
                              <td>
                                 <center>
                                    <div class="btn-group">
                                       <a href="./report/reservation-word.php?id=<?php echo $user->id; ?>" class="btn btn-default" style="color:dodgerblue" rel="tooltip" title="Descargar"><i class='fa fa-file-word-o'></i></a>
                                       <a href="index.php?view=editreservation&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:goldenrod" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                                       <a onClick="return confirm('¿Estas seguro que deseas eliminar la cita?')" href="index.php?action=delreservation&id=<?php echo $user->id; ?>" class="btn btn-default" style="color:red" rel="tooltip" title="Eliminar"><i class="fa fa-trash"> </i></a>
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
            echo "<p class='alert alert-info'>No hay citas</p>";
         }

         ?>
      </div>
   </div>
</section>