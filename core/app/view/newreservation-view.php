<section class="content">
  <?php
  //echo date('N',strtotime('2018-04-17'));
  $pacients = PacientData::getAll();
  //$medics = MedicData::getAll();

  $statuses = StatusData::getAll();
  $payments = PaymentData::getAll();

  ?>

  <div class="row">
    <div class="col-md-10">
      <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Nueva Cita</font>
      </p>
      <form class="form-horizontal" role="form" method="post" action="./?action=addreservation" id="newreservation">
        <div class="form-group">
          <div class="col-lg-3 col-lg-offset-2">
            <label for="XD" class="control-label">Folio</label>
            <input type="text" name="no" class="form-control" id="XD" placeholder="Folio">
          </div>
          <div class="col-lg-7">
            <label for="XD" class="control-label">Servicio</label>
            <input type="text" name="title" required class="form-control" id="XD" placeholder="Servicio">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Paciente</label>
          <div class="col-lg-10">
            <select name="pacient_id" class="form-control" required>
              <option value="">-- Seleccionar --</option>
              <?php foreach ($pacients as $p) : ?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->no . " - " . $p->name . " " . $p->lastname; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-3 col-md-offset-2">
            <label for="XD" class="control-label">Área Médica</label>
            <select name="category_id" id="category_id" class="form-control" required>
              <option value="">-- Seleccionar --</option>
              <?php foreach (CategoryData::getAll() as $p) : ?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-lg-7">
            <label for="XD" class="control-label">Fisioterapeuta</label>
            <select name="medic_id" id="medic_id" class="form-control" required>
              <option value="">-- Seleccionar Área--</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Fecha/Hora</label>
          <div class="col-lg-5">
            <input type="text" name="date_at" id="date_at" required class="pickadate2 form-control" id="XD" placeholder="Fecha">
          </div>
          <div class="col-lg-5">
            <select name="time_at" id="time_at" required class="form-control">
              <option value="">-- Seleccionar --</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Diagnóstico</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="note" placeholder="Diagnóstico"></textarea>
          </div>
          <label for="XD" class="col-lg-2 control-label">Observaciones</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="sick" placeholder="Observaciones"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Tratamiento</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="symtoms" placeholder="Tratamiento"></textarea>
          </div>
          <label for="XD" class="col-lg-2 control-label">Nota</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="medicaments" placeholder="Nota"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Estado de la cita</label>
          <div class="col-lg-10">
            <select name="status_id" class="form-control" required>
              <?php foreach ($statuses as $p) : ?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Estado del pago</label>
          <div class="col-lg-10">
            <select name="payment_id" class="form-control" required>
              <?php foreach ($payments as $p) : ?>
                <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Costo</label>
          <div class="col-lg-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input type="text" class="form-control" name="price" placeholder="Costo">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Agregar Cita</button>
          </div>
        </div>
      </form>

      <script type="text/javascript">
        $(".pickadate2").pickadate({
          format: 'yyyy-mm-dd',
          min: '<?php echo date('Y-m-d', time() - (24 * 60 * 60)); ?>',
          onSet: function(context) {
            if ($("#medic_id").val() == "") {
              alert("Debes Seleccionar un Fisioterapeuta!");
              $('#time_at')
                .find('option')
                .remove()
                .end();
            } else {

              $.get("./?action=gethours", "medic_id=" + $("#medic_id").val() + "&date_at=" + $("#date_at").val(), function(data) {
                $("#time_at").html(data);
                console.log((data));

              });


            }
            //        console.log((data));
          }
        });


        $("#newreservation").submit(function(e) {
          if ($("#date_at").val() == "" || $("#time_at").val() == "") {
            e.preventDefault();
            alert("Debes Seleccionar fecha y hora!");
          }

        });

        $(document).ready(function() {

          $("#category_id").change(function() {

            $.get("./?action=getmedics", "cat_id=" + $("#category_id").val(), function(data) {
              $("#medic_id").html(data);
              console.log(data);
            });


          });

        });
      </script>

    </div>
  </div>
</section>