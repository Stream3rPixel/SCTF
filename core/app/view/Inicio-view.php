<?php

$start = new DateTime(date('Y-m-d'));
$interval = $start->sub(DateInterval::createFromDateString('15 days'));
$sd = strtotime(date_format($interval, "Y-m-d"));
$ed = strtotime(date("Y-m-d"));
$ntot = 0;
$nsells = 0;
$sumatot = array();
for ($i = $sd; $i <= $ed; $i += (60 * 60 * 24)) {
   $operations[$i] = ReservationData::getGroupByDate(date("Y-m-d", $i), date("Y-m-d", $i));


   //    $sumatot[date("Y-m-d",$i)]=$sum;
}


?>

<section class="content">


   <p align="center" style="font-weight: bold;">
      <font size="5" color="#01374C">Inicio</font>
   </p>
   <br>
   <!-- Button trigger modal -->
   <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-calendar-o"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Citas</span>
               <span class="info-box-number"><?php echo count(ReservationData::getAll()); ?></span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">

            <span class="info-box-icon bg-blue"><i class="fa fa-male"></i><i class="fa fa-female"></i></span>

            <div class="info-box-content">
               <span class="info-box-text">Pacientes</span>
               <span class="info-box-number"><?php echo count(PacientData::getAll()); ?></span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-user-md"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Fisioterapeutas</span>
               <span class="info-box-number"><?php echo count(MedicData::getAll()); ?></span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>
      <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-th-list"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Áreas Médicas</span>
               <span class="info-box-number"><?php echo count(CategoryData::getAll()); ?></span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- /.col -->
   </div>
   <!-- /.row -->

   <br>
   <br>
   <br>

   <div class="box box-primary">
      <div class="box-header">
         <h2 align="center">Estadística de Citas</h2>
         <div class="box-body">
            <div id="graph" class="animate" data-animate="fadeInUp"></div>
         </div>
      </div>
      <script>
         <?php
         echo "var c=0;";
         echo "var dates=Array();";
         echo "var data=Array();";
         echo "var total=Array();";
         for ($i = $sd; $i <= $ed; $i += (60 * 60 * 24)) {
            echo "dates[c]=\"" . date("Y-m-d", $i) . "\";";
            echo "data[c]=" . $operations[$i][0]->s . ";";
            echo "total[c]={x: dates[c],y: data[c]};";
            echo "c++;";
         }
         ?>
         // Use Morris.Area instead of Morris.Line
         Morris.Bar({
            element: 'graph',
            data: total,
            xkey: 'x',
            ykeys: ['y', ],
            labels: ['Y']
         }).on('click', function(i, row) {
            console.log(i, row);
         });
      </script>
</section>