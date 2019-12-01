<section class="content">
   <div class="row">
      <div class="col-md-12">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Reportes</font>
         </p>
         <form class="form-horizontal" role="form">
            <input type="hidden" name="view" value="ReportesHome">
            <?php
            $pacients = PacientData::getAll();
            $medics = MedicData::getAll();
            $statuses = StatusData::getAll();
            $payments = PaymentData::getAll();
            ?>
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
               <div class="col-lg-3">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-check-square"></i></span>
                     <select name="status_id" class="form-control">
                        <option value="">Estado</option>
                        <?php foreach ($statuses as $p) : ?>
                           <option value="<?php echo $p->id; ?>" <?php if (isset($_GET["status_id"]) && $_GET["status_id"] == $p->id) {
                                                                        echo "selected";
                                                                     } ?>><?php echo $p->name; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                     <select name="payment_id" class="form-control">
                        <option value="">Pago</option>
                        <?php foreach ($payments as $p) : ?>
                           <option value="<?php echo $p->id; ?>" <?php if (isset($_GET["payment_id"]) && $_GET["payment_id"] == $p->id) {
                                                                        echo "selected";
                                                                     } ?>><?php echo $p->name; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="col-lg-3">
                  <input type="text" name="start_at" value="<?php if (isset($_GET["start_at"]) && $_GET["start_at"] != "") {
                                                               echo $_GET["start_at"];
                                                            } ?>" class="pickadate2 form-control" placeholder="Fecha inicio">
               </div>
               <div class="col-lg-3">
                  <input type="text" name="finish_at" value="<?php if (isset($_GET["finish_at"]) && $_GET["finish_at"] != "") {
                                                                  echo $_GET["finish_at"];
                                                               } ?>" class="pickadate2 form-control" placeholder="Fecha Fin">
               </div>
               <div class="col-lg-6">
                  <button class="btn btn-primary btn-block">Procesar</button>
               </div>
            </div>
         </form>
         <?php
         $users = array();
         if ((isset($_GET["status_id"]) && isset($_GET["payment_id"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"])) && ($_GET["status_id"] != "" || $_GET["payment_id"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "" || ($_GET["start_at"] != "" && $_GET["finish_at"] != ""))) {
            $sql = "select * from reservation where ";
            if ($_GET["status_id"] != "") {
               $sql .= " status_id = " . $_GET["status_id"];
            }

            if ($_GET["payment_id"] != "") {
               if ($_GET["status_id"] != "") {
                  $sql .= " and ";
               }
               $sql .= " payment_id = " . $_GET["payment_id"];
            }

            if ($_GET["pacient_id"] != "") {
               if ($_GET["status_id"] != "" || $_GET["payment_id"] != "") {
                  $sql .= " and ";
               }
               $sql .= " pacient_id = " . $_GET["pacient_id"];
            }

            if ($_GET["medic_id"] != "") {
               if ($_GET["status_id"] != "" || $_GET["pacient_id"] != "" || $_GET["payment_id"] != "") {
                  $sql .= " and ";
               }

               $sql .= " medic_id = " . $_GET["medic_id"];
            }


            if ($_GET["start_at"] != "" && $_GET["finish_at"]) {
               if ($_GET["status_id"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "" || $_GET["payment_id"] != "") {
                  $sql .= " and ";
               }

               $sql .= " ( date_at >= \"" . $_GET["start_at"] . "\" and date_at <= \"" . $_GET["finish_at"] . "\" ) ";
            }

            //echo $sql;
            $users = ReservationData::getBySQL($sql);
         } else {
            $users = ReservationData::getAllPendings();
         }
         if (count($users) > 0) {
            // si hay usuarios
            $_SESSION["report_data"] = $users;
            ?>
            <div class="panel panel-default">
               <div class="panel-heading">
                  Reportes
               </div>
               <table class="table table-bordered table-hover">
                  <thead>
                     <th>Folio</th>
                     <th>Servicio</th>
                     <th>Paciente</th>
                     <th>Fisioterapeuta</th>
                     <th>Fecha</th>
                     <th>Estado</th>
                     <th>Pago</th>
                     <th>Costo</th>
                  </thead>
                  <?php
                     $total = 0;
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
                     </tr>
                  <?php
                        $total += $user->price;
                     }
                     echo "</table>";
                     ?>
                  <div class="panel-body">
                     <h4>Total: $ <?php echo number_format($total, 2, ".", ","); ?></h4>
                  </div>
                  <div class="panel-footer">
                     <a onclick="thePDF()" id="makepdf" class="btn btn-red"><i class='fa fa-file-pdf-o'> Descargar PDF</i></a>
                  </div>
                  <script type="text/javascript">
                     function thePDF() {
                        var doc = new jsPDF('l', 'pt');

                        doc.setFontSize(16);
                        doc.text("UNIVERSIDAD POLITÉCNICA DE BACALAR", 40, 45);


                        doc.setFontSize(16);
                        doc.text("SISTEMA DE CITAS DE TERAPIA FÍSICA", 40, 80);




                        var columns = [{
                              title: "# Folio",
                              dataKey: "id"
                           },

                           {
                              title: "Servicio",
                              dataKey: "title"
                           },
                           //{title: "Cita Creada", dataKey: "created_at"}, 
                           {
                              title: "Paciente",
                              dataKey: "pacient"
                           },
                           {
                              title: "Fisioterapeuta",
                              dataKey: "medic"
                           },

                           {
                              title: "Estado",
                              dataKey: "status"
                           },

                           {
                              title: "Fecha de la cita",
                              dataKey: "date"
                           },

                           {
                              title: "Costo",
                              dataKey: "price"
                           },

                           {
                              title: "Pago",
                              dataKey: "payment"
                           },
                        ];
                        var rows = [
                           <?php foreach ($users as $product) :
                                 $pacientx  = $product->getPacient();
                                 $medicx = $product->getMedic();  ?> {
                                 "id": "<?php echo $product->no; ?>",
                                 "title": "<?php echo $product->title; ?>",
                                 "created_at": "<?php echo $product->created_at; ?>",
                                 "pacient": "<?php echo $pacientx->name . " " . $pacient->lastname; ?>",
                                 "medic": "<?php echo $medicx->name . " " . $medicx->lastname; ?>",

                                 "status": "<?php echo $product->getStatus()->name; ?>",
                                 "date": "<?php echo $product->date_at . " " . $product->time_at; ?>",

                                 "price": "$ <?php echo $product->price; ?>",

                                 "payment": "<?php echo $product->getPayment()->name; ?>",
                              },
                           <?php endforeach; ?>
                        ];
                        doc.autoTable(columns, rows, {
                           theme: 'grid',
                           overflow: 'linebreak',
                           styles: {
                              fillColor: [100, 100, 100]
                           },
                           columnStyles: {
                              id: {
                                 fillColor: 255
                              }
                           },
                           margin: {
                              top: 100
                           },
                           afterPageContent: function(data) {}
                        });

                        function formatDate(date) {
                           var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                           var day = date.getDate();
                           var monthIndex = date.getMonth();
                           var year = date.getFullYear();
                           return day + ' ' + 'De' + ' ' + monthNames[monthIndex] + ' ' + 'Del' + ' ' + year;
                        }

                        doc.setFontSize(10);
                        doc.text("Fecha: " + formatDate(new Date()), 40, doc.autoTableEndPosY() + 25);

                        doc.setFontSize(6);
                        doc.save('reports-<?php echo date("d-m-Y h:i:s", time()); ?>.pdf');
                     }
                  </script>
               <?php
               } else {
                  echo "<p class='alert alert-info'>Filtrar datos</p>";
               }
               ?>
            </div>
      </div>
</section>