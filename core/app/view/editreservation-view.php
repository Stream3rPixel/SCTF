<section class="content">
  <?php
  $reservation = ReservationData::getById($_GET["id"]);
  $pacients = PacientData::getAll();
  $medics = MedicData::getAll();
  $statuses = StatusData::getAll();
  $payments = PaymentData::getAll();
  ?>
  <div class="row">
    <div class="col-md-10">
      <p align="center" style="font-weight: bold;">
        <font size="5" color="#01374C">Editar Cita</font>
      </p>
      <br>
      <form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Folio</label>
          <div class="col-lg-10">
            <input type="text" name="no" value="<?php echo $reservation->no; ?>" class="form-control" id="XD" placeholder="Folio">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Servicio</label>
          <div class="col-lg-10">
            <input type="text" name="title" value="<?php echo $reservation->title; ?>" required class="form-control" id="XD" placeholder="Servicio">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Paciente</label>
          <div class="col-lg-10">
            <select name="pacient_id" class="form-control" required>
              <option value="">-- Seleccionar --</option>
              <?php foreach ($pacients as $p) : ?>
                <option value="<?php echo $p->id; ?>" <?php if ($p->id == $reservation->pacient_id) {
                                                          echo "selected";
                                                        } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Fisioterapeuta</label>
          <div class="col-lg-10">
            <select name="medic_id" class="form-control" required>
              <option value="">-- Seleccionar --</option>
              <?php foreach ($medics as $p) : ?>
                <option value="<?php echo $p->id; ?>" <?php if ($p->id == $reservation->medic_id) {
                                                          echo "selected";
                                                        } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Fecha/Hora</label>
          <div class="col-lg-5">
            <input type="text" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="pickadate form-control" id="XD" placeholder="Fecha">
          </div>
          <div class="col-lg-5">
            <input type="text" name="time_at" value="<?php echo $reservation->time_at; ?>" required class="pickatime form-control" id="XD" placeholder="Hora">
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Diagnóstico</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="note" placeholder="Diagnóstico"><?php echo $reservation->note; ?></textarea>
          </div>
          <label for="XD" class="col-lg-2 control-label">Observaciones</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="sick" placeholder="Observaciones"><?php echo $reservation->sick; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Tratamiento</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="symtoms" placeholder="Tratamiento"><?php echo $reservation->symtoms; ?></textarea>
          </div>
          <label for="XD" class="col-lg-2 control-label">Nota</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="medicaments" placeholder="Nota"><?php echo $reservation->medicaments; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Estado de la cita</label>
          <div class="col-lg-10">
            <select name="status_id" class="form-control" required>
              <?php foreach ($statuses as $p) : ?>
                <option value="<?php echo $p->id; ?>" <?php if ($p->id == $reservation->status_id) {
                                                          echo "selected";
                                                        } ?>><?php echo $p->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Estado del pago</label>
          <div class="col-lg-10">
            <select name="payment_id" class="form-control" required>
              <?php foreach ($payments as $p) : ?>
                <option value="<?php echo $p->id; ?>" <?php if ($p->id == $reservation->payment_id) {
                                                          echo "selected";
                                                        } ?>><?php echo $p->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="XD" class="col-lg-2 control-label">Costo</label>
          <div class="col-lg-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <input type="text" class="form-control" value="<?php echo $reservation->price; ?>" name="price" placeholder="Costo">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
            <button type="submit" class="btn btn-success">Actualizar Cita</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>