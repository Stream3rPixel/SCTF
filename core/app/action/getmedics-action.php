<?php
$medics = MedicData::getAllByCategoryId($_GET["cat_id"]);
?>
<option value=""> -- Seleccionar Fisioterapeuta --</option>
<?php foreach($medics as $m):?>
<option value="<?php echo $m->id; ?>"><?php echo $m->no; ?> - <?php echo $m->name; ?> <?php echo $m->lastname; ?></option>
<?php endforeach; ?>