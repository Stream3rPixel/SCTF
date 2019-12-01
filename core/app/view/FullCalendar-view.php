<section class="content">
   <div class="row">
      <div class="clearfix visible-sm-block"></div>
      <div class="col-md-10 col-lg-offset-1">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Calendario</font>
         </p>

         <div class="box box-primary">
            <div class="box-body">
               <form class="form-horizontal" role="form" method="post" id="filterreservation">
                  <div class="form-group">
                     <div class="col-lg-4">
                        <select name="medic_id" id="category_id" class="form-control select2" required>
                           <option value="">Seleccionar Fisioterapeuta</option>
                           <?php foreach (MedicData::getAll() as $p) : ?>
                              <option value="<?php echo $p->id; ?>">
                                 <?php echo " " . $p->name . " " . $p->lastname; ?>
                              </option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="col-lg-4">
                        <select name="status_id" id="category_id" class="form-control" required>
                           <option value="">Estado de la Cita</option>
                           <?php foreach (StatusData::getAll() as $p) : ?>
                              <option value="<?php echo $p->id; ?>">
                                 <?php echo $p->name; ?>
                              </option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class=" col-lg-4">
                        <button class="btn btn-primary btn-block">Filtrar Citas</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="box box-primary">
            <div class="box-body">
               <script>
                  $("#filterreservation").submit(function(e) {
                     e.preventDefault();
                     console.log("xxxx");
                     $.get("./?action=filterreservation", $("#filterreservation").serialize(), function(data) {
                        console.log(data);
                        $(".dataload").html(data);

                     });
                  });

                  $(document).ready(function() {
                     $.get("./?action=filterreservation", "", function(data) {
                        console.log(data);
                        $(".dataload").html(data);
                     });
                  });
               </script>
               <div class="clearfix"></div>
               <br>
               <div class="dataload"></div>
            </div>
         </div>
      </div>
   </div>
</section>