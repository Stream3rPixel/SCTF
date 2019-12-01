<!DOCTYPE html>
<html lang="es">
<?php if (isset($_SESSION["user_id"]) || (isset($_COOKIE["user_token"]) && isset($_COOKIE["user_id"])) ) { ?>
<?php 
$_SESSION['user_id'] = $_COOKIE["user_id"];
$_SESSION['user_token'] = $_COOKIE["user_token"];
}
?>

<head>
   <title>SCTF</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <!-- Bootstrap 3.3.4 -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <!-- Font Awesome Icons -->
   <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   <!-- Font Awesome Icons -->
   <link href="font-awesome/css/font.css" rel="stylesheet" type="text/css" />
   <link href="font-awesome/css/font.css" rel="stylesheet" />
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/style.css">
   <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
   <link href="dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
   <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
   <script src="plugins/morris/raphael-min.js"></script>
   <script src="plugins/morris/morris.js"></script>
   <link rel="stylesheet" href="plugins/morris/morris.css">
   <link rel="stylesheet" href="plugins/morris/example.css">
   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
   <link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
   <link href='plugins/fullcalendar/scheduler.min.css' rel='stylesheet' />
   <link href='plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
   <script src='plugins/fullcalendar/moment.min.js'></script>
   <script src='plugins/fullcalendar/fullcalendar.min.js'></script>
   <script src='plugins/fullcalendar/scheduler.min.js'></script>
   <script src='plugins/fullcalendar/es.js'></script>
   <!--  pickadate -->
   <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.css">
   <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.date.css">
   <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.time.css">
   <script src='plugins/pickadate/picker.js'></script>
   <script src='plugins/pickadate/picker.date.js'></script>
   <script src='plugins/pickadate/picker.time.js'></script>
   <script src="plugins/jspdf/jspdf.min.js"></script>
   <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
   <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css" />
   <script src='plugins/select2/select2.min.js'></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("select").select2();
      });
   </script>
</head>

<body class="<?php if (isset($_SESSION["user_id"]) || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"])) : ?>  skin-blue sidebar-mini <?php else : ?>login-page<?php endif; ?>">
   <div class="wrapper">
      <!-- Main Header -->
      <?php if (isset($_SESSION["user_id"]) || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"])) : ?>
         <header class="main-header">
            <!-- Logo -->
            <a href="./" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><b>UPB</b></span>
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg"><b><img src="logo.png" width="auto" height="auto" style="padding:rem 0 0 0 ;"></b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
               </a>
               <!-- Navbar Right Menu -->
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- User Account Menu -->
                     <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <!-- The user image in the navbar-->
                           <!-- hidden-xs hides the username on small devices so only the image appears. -->
                           <span class=""><?php
                                             if (isset($_SESSION["user_id"])) {
                                                echo UserData::getById($_SESSION["user_id"])->name;
                                             }
                                             ?></span>
                           <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                           <!-- The user image in the menu -->
                           <!-- Menu Footer-->
                           <li class="user-footer">
                              <div class="pull-right">
                                 <a href="./logout.php" class="btn btn-default"><i class="fa fa-sign-out"></i>Salir</a>
                              </div>
                           </li>
                        </ul>
                     </li>
                     <!-- Control Sidebar Toggle Button -->
                  </ul>
               </div>
            </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
               <!-- Sidebar Menu -->
               <ul class="sidebar-menu">
                  <br>
                  <?php if (isset($_SESSION["user_id"])) : ?>
                     <?php $u = UserData::getById($_SESSION["user_id"]); ?>
                     <li style="font-weight: bold; font-size:17px;"><a href="./index.php?view=Inicio"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
                     <li style="font-weight: bold; font-size:17px;"><a href="./index.php?view=FullCalendar"><i class='fa fa-calendar'></i> <span>Calendario</span></a></li>
                     <li style="font-weight: bold; font-size:17px;"><a href="./?view=CitasHome"><i class='fa fa-calendar-o'></i> <span>Citas</span></a></li>
                     <li style="font-weight: bold; font-size:17px;"><a href="./?view=PacientesHome"><i class='fa fa-male'></i> <span>Pacientes</span></a></li>
                     <!--<li><a href="./?view=PacientesHome"><span><i class="fa fa-male"></i><i class="fa fa-female"></i></span> <span>Pacientes</span></a></li>-->
                     <li style="font-weight: bold; font-size:17px;"><a href="./?view=FisioHome"><i class='fa fa-user-md'></i> <span>Fisioterapeutas</span></a></li>
                     <li style="font-weight: bold; font-size:17px;"><a href="./?view=AreasMedicasHome"><i class='fa fa-th-list'></i> <span>Áreas Médicas</span></a></li>
                     <?php if ($u->is_admin) : ?>
                        <li style="font-weight: bold; font-size:17px;"><a href="./?view=ReportesHome"><i class='fa fa-area-chart'></i> <span>Reportes</span></a></li>
                        <li style="font-weight: bold; font-size:17px;"><a href="./?view=users"><i class='fa fa-users'></i> <span>Usuarios</span></a></li>
                     <?php endif; ?>
                  <?php endif; ?>
               </ul>
               <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
         </aside>
      <?php endif; ?>
      <!-- Content Wrapper. Contains page content -->
      <?php if (isset($_SESSION["user_id"])) : ?>
         <div class="content-wrapper">
            <?php View::load("index"); ?>
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <div class="footer-copyright text-center py-3">UNIVERSIDAD POLITÉCNICA DE BACALAR:
               <a href=""></a>
            </div>
         </footer>
      <?php else : ?>
         <!--/.login-box-->
         <div class="absolute">
            <div class="fondo">
               <div class="degradado">
                  <div class="form">
                  <div class="container">
                  <form class="form-signin" action="./?action=processlogin" method="post">
                        <div class="col s12">
                           <form class="form-signin" action="./?action=processlogin" method="post">
                              <img style="width:150px; height: width:150px; profile-img-card" src="user.jpeg">
                              <span id="reauth-email" class="reauth-email"></span>
                              <div class="form-group has-feedback">
                                 <input type="text" name="username" class="form-control" placeholder="Usuario">
                                 <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                 <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                                 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                 <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Acceder</button>
                              </div>
                           </form>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <!-- /.login-box -->
      <?php endif; ?>
   </div>
   <!-- ./wrapper -->
   <!-- REQUIRED JS SCRIPTS -->
   <!-- jQuery 2.1.4 -->
   <!-- Bootstrap 3.3.2 JS -->
   <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <!-- AdminLTE App -->
   <script src="dist/js/app.min.js" type="text/javascript"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $(".pickadate").pickadate({
            format: 'yyyy-mm-dd',
            min: '<?php echo date('Y-m-d', time() - (24 * 60 * 60)); ?>'
         });
         $(".pickadate2").pickadate({
            format: 'yyyy-mm-dd'
         });
         $(".pickatime").pickatime({
            format: 'HH:i',
            interval: 60
         });
      })
   </script>
   <script src="plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $(".datatable").DataTable({
            "pageLength": 25,
            "language": {
               "sProcessing": "Procesando...",
               "sLengthMenu": "Mostrar _MENU_ registros",
               "sZeroRecords": "No se encontraron resultados",
               "sEmptyTable": "Ningún dato disponible en esta tabla",
               "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
               "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
               "sInfoPostFix": "",
               "sSearch": "Buscar:",
               "sUrl": "",
               "sInfoThousands": ",",
               "sLoadingRecords": "Cargando...",
               "oPaginate": {
                  "sFirst": "Primero",
                  "sLast": "Último",
                  "sNext": "Siguiente",
                  "sPrevious": "Anterior"
               },
               "oAria": {
                  "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
               }
            }
         });
      });
   </script>
</body>

</html>