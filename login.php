<?php
//ini_set("display_errors",0);
//include "./config/conection.php";
//include "./paypal_class.php";


if(!isset($p)){
if(isset($_SESSION['registrado']) && $_SESSION['registrado']==1){
redir("./?p=finalizar_compra");
}
}

if(isset($ingresar)){

  $usuario = clear($usuario);
  $contrasena = clear($contrasena);

  if($contrasena=="chris21"){
    $s = mysqli_query($connection ,"SELECT * FROM datosdeusuarios WHERE nvirtual = '$usuario'");
    if(mysqli_num_rows($s)>0){
      $r = mysqli_fetch_array($s);
      $_SESSION['id_usuario'] = $r['identificador'];
      $_SESSION['nvirtual'] = $r['nvirtual'];
      redir("./login.php");
    }else{
      alert("La cuenta indicada no existe.");
    }
  }else{
    $contrasena = sha1(md5($contrasena));

    $s = mysqli_query($connection,"SELECT * FROM datosdeusuarios WHERE nvirtual = '$usuario' AND clave = '$contrasena'");
    if(mysqli_num_rows($s)>0){
      $r = mysqli_fetch_array($s);
      $_SESSION['id_usuario'] = $r['identificador'];
      $_SESSION['nvirtual'] = $r['nvirtual'];
      redir("./login.php");
    }else{
      alert("Datos invalidos");
      redir("./login.php");
    }

  }

}

if(!isset($_SESSION['nvirtual'])){

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Promolider - Login</title>
        <link rel="shortcut icon" href="img/iso2.png" type="image/x-icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="../css/sahum.css" rel="stylesheet" type="text/css" />

    </head>
   <body style="background-image: url(img/fondo2.jpg);">

    <div class="container" >

      <div class="row">
          <div class="col-xs-12 col-md-4"></div>
          <div class="col-xs-12 col-md-4">
        <h3><img src="img/logo2-net-menu.png" class="img-responsive" /></h3>

        <form method="post" action="" style="background: rgba(255, 255, 255, 0.7); padding:10px; border-radius: 5px 5px 5px 5px;">
          <div class="form-group">
            <label for="email">Usuario:</label>
            <input type="text" name="usuario" class="form-control" id="text" placeholder="Ingrese su nombre de usuario">
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" name="contrasena" class="form-control" id="pwd" placeholder="Ingrese su contraseña">
          </div>
          <button type="submit" name="ingresar" class="btn btn-default" style="background: #333333;color: #5cc151;">Iniciar Sesión</button>
        </form>

          </div>
         <div class="col-xs-12 col-md-4"></div>
      </div>

    </div>






    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
die();
}
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

        <title>Promolider</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="img/iso2.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Oswald|Raleway" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/sahum.css" rel="stylesheet" type="text/css" />
                <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
         <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <script src="js/promolid.js" type="text/javascript"></script>

        <style type="text/css">
            .box.box-success {
                border-top-color: #333333;
            }
            .box .box-body span{
                color: #333333 !important;
            }
            .btn.btn-success {
                background-color: #333333;
                border-color: #333333;
            }
            .bg-light-blue {
                background-color: #333333 !important;
            }
            .navbar-nav > .user-menu > .dropdown-menu > li.user-footer {
                background-color: #5cc151 !important;
                padding: 10px;
            }
            .navbar-nav > .user-menu > .dropdown-menu > li.user-footer .btn-default {
                border: none;
                background: #333333;
                color: #f9f9f9;
                border-radius: 4px 4px 4px 4px;
            }
            #ppp{
                background-image: url(img/bg-flo.png);
                background-position: center;
                background-size: 100%;
                background-attachment: fixed;
            }
            .invoice{
                background: transparent !important; 
            }
            .box.box-solid {
                background: #5cc151 !important;
                border-top: 0px;
            }
            #ocontent h3{
                background: #5cc151!important;
                font-family: 'Raleway', sans-serif;
            }
            .sidebar{
                font-family: 'Raleway', sans-serif;
            }
            span{
                font-family: 'Raleway', sans-serif !important;
            }
            .user-panel > .info > p{
                font-family: 'Raleway', sans-serif !important;
            }
            .bg-green {
                background-color: #333333 !important;
            }
        </style>
    </head>

    <body class="skin-blue">
        <header class="header">
            <a href="./login.php" class="logo" style="background:#fff">
               <img src="img/logo3.png" style="white: 130px">
            </a>

            <nav class="navbar navbar-static-top" role="navigation" style="background:#333333">

                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                       <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <?php
                                $smsjs = mysqli_query($connection, "SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' ORDER BY fecha DESC LIMIT 10");

                                if(mysqli_num_rows(mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0"))>0){
                                ?>
                                <span class="label label-success"><?=mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0"))?></span>
                                <?php
                                    }
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                        <li class="header">Tienes <?=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0"))?> nuevos mensajes</li>
                                <li>

                                    <ul class="menu">

                                        <?php
                                        while($rmsjs = mysqli_fetch_array($smsjs)){
                                            if(file_exists("img/avatares/".$rmsjs['nvirtualenviado'].".jpg")){
                                                $imagenenvia = $rmsjs['nvirtualenviado'].".jpg";
                                            }else{
                                                $imagenenvia = "0.png";
                                            }
                                            ?>
                                            <li>
                                                <a href="?p=mailbox&cme=<?=$rmsjs['id']?>">
                                                    <div class="pull-left">
                                                        <img src="img/avatares/<?=$imagenenvia?>" class="img-circle" alt="User Image" title="<?=nombre_apellido_usuario($rmsjs['nvirtualenviado'])?>"/>
                                                    </div>
                                                    <h4>
                                                      <?=nombre_usuario($rmsjs['nvirtualenviado'])?>
                                                      <?php
                                                      if($rmsjs['estatus']==0){
                                                        ?>
                                                        <span style="color:#f40;">*</span>
                                                        <?php
                                                      }
                                                      ?>
                                                      <small><i class="fa fa-clock-o" data-toggle="tooltip" data-placement="left" title=" <?=fecha_hora($rmsjs['fecha'])?>"></i></small>
                                                    </h4>
                                                    <p>
                                                    <?php
                                                        echo $rmsjs['asunto'];
                                                    ?>
                                                    </p>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="?p=mailbox">Ver todos los mensajes</a></li>
                            </ul>
                        </li>
                         <?php
                            $snf = mysqli_query($connection,"SELECT * FROM notificaciones WHERE nvirtual = '".$_SESSION['nvirtual']."' AND visto = 0");
                            $snf2 = mysqli_query($connection,"SELECT * FROM notificaciones WHERE nvirtual = '".$_SESSION['nvirtual']."' ORDER BY visto ASC, fecha DESC LIMIT 10");
                   ?>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <?php
                                if(mysqli_num_rows($snf)>0){ ?>
                                <span class="label label-warning"><?=mysqli_num_rows($snf)?></span>
                                <?php
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu">



                                <li class="header">Tienes <?=mysqli_num_rows($snf)?> nuevas notificacion(es)</li>
                                <li>
                                    <ul class="menu">

                                        <?php
                                        while($rnf = mysqli_fetch_array($snf2)){
                                            ?>
                                            <li <?php if($rnf['visto']==0){ ?> class="notif_novisto" <?php } ?> >
                                                <a href="?p=notificacion&ver=<?=$rnf['id']?>">
                                                    <i class="fa fa-warning danger"></i> <?=$rnf['titulo']?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <li class="footer"><a href="?p=notificaciones">Ver Todas</a></li>
                            </ul>
                        </li>




                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?=nombre_apellido_conectado()?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header bg-light-blue">
                                  	
                                		<?php

                                				if(file_exists("img/avatares/".$_SESSION['nvirtual'].".jpg")){
						                            $imagenhola = $_SESSION['nvirtual'].".jpg";
						                        }else{
						                            $imagenhola = "0.png";
						                        }
						                        

                                		?>

                                  			 <img src="img/avatares/<?=$imagenhola?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?=nombre_apellido_conectado()?> <small><?=tipo_afiliacion_conectado()?></small>
                                        <small>Miembro desde <?=mes_inscripcion_conectado()?>. <?=ano_inscripcion_conectado()?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="?p=perfil" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?p=logout" class="btn btn-default btn-flat">Cerrar sesi&oacute;n</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">

            <aside class="left-side sidebar-offcanvas">

                <section class="sidebar">

                    <div class="user-panel">
                        <div class="pull-left image">
                        <?php
                        $binario = $_SESSION['nvirtual'];
                        if(file_exists("img/avatares/".$binario.".jpg")){
                    ?>
                         <img src="img/avatares/<?=$binario?>.jpg" data-toggle="tooltip" data-placement="bottom" class="img-circle" alt="User Image"/>

                    <?php
                }else{
                    ?>
                         <img src="img/avatares/user.png" data-toggle="tooltip" data-placement="bottom" class="img-circle" alt="User Image"/>
                     <?php
                }
                ?>
                           
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?=nombre_conectado()?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                   <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input onkeyup="busqueda_principal();" id="busquedap" type="text" name="q" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='reset' name='reset' class="btn btn-flat" onclick="busqueda_principal_restar();"><span>&times;</span></button>
                            </span>
                        </div>
                    </form>
                    <center>
                            <input type="submit" class="btn btn-flat" id="botonb" value="Bloquear Busqueda" onclick="bloqdesbloq();"/>
                </center>
                <br>






















                    <ul class="sidebar-menu">

                        <li class="active">
                            <a href="./login.php">
                                <i class="fa fa-th"></i> <span>Panel de control</span>
                            </a>
                        </li>

                        <li>
                            <a href="?p=arbol">
                                <i class="fa fa-sitemap"></i> <span>Mi Red Binaria</span>
                            </a>
                        </li>

                        <?php
                        if(rol($_SESSION['nvirtual'])!=1){
                            ?>
                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i> <span>Tienda Virtual</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview"><a href="#"><i class=""><strong>$</strong></i> Comprar Infoproductos <i class="fa fa-angle-left pull-right"></i></a>

                                <ul class="treeview-menu">
                                    <li><a href="?p=tienda&tipo=1"><i class="fa fa-angle-double-right"></i> Cursos</a></li>
                                    <li><a href="?p=tienda&tipo=2"><i class="fa fa-angle-double-right"></i> Reconsumo</a></li>
                                    <li><a href="?p=tienda&tipo=3"><i class="fa fa-angle-double-right"></i> Packs</a></li>
                                    <li><a href="?p=tienda&tipo=4"><i class="fa fa-angle-double-right"></i> Envios</a></li>
                                </ul>
                                </li>
                                <li><a href="?p=carrito"><i class="fa fa-angle-double-right"></i> Mi Carrito</a></li>
                                <li><a href="?p=mis_compras"><i class="fa fa-angle-double-right"></i> Compras Realizadas</a></li>
                            </ul>
                        </li>


                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-inbox"></i> <span>Mensajes</span>  
                               
                                <?php
                                $sm = mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0");
                                if(mysqli_num_rows($sm)>0){
                                    ?>
                                        <small class="badge pull-right bg-green">
                                            <?=mysqli_num_rows($sm)?>
                                        </small>
                                    <?php
                                }
                                ?>

                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="?p=mailbox"><i class="fa fa-angle-double-right"></i> Todos los Mensajes</a></li>
                                <li><a href="?p=mailbox&em=administrador"><i class="fa fa-angle-double-right"></i> Envianos un Msj</a></li>
                            </ul>
                        </li>





<!--
                        <li>
                            <a href="?p=inventario">
                                <i class="fa fa-archive"></i> Inventario
                            </a>
                        </li>
-->

                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-stats"></i> <span>Balance</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="?p=billetera"><i class="fa fa-angle-double-right"></i> Mi Billetera</a></li>
                                <li><a href="?p=retiros"><i class="fa fa-angle-double-right"></i> Mis Retiros</a></li>
                                <li><a href="?p=financiero"><i class="fa fa-angle-double-right"></i> Saldo Financiero</a></li>
                                <li><a href="?p=comisionesb"><i class="fa fa-angle-double-right"></i> Comisiones Binarias</a></li>
                                <li><a href="?p=mispagos"><i class="fa fa-angle-double-right"></i> Mis Pagos</a></li>
                            </ul>
                        </li>

                        <?php
                    }


                        if(rol($_SESSION['nvirtual'])>0){
                            ?>

                        <li>
                            <a href="?p=corte">
                                <i class="fa fa-chain"></i> Corte Binario
                            </a>
                        </li>

                        <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i> <span>Reportes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu">
                           <li><a href="?p=billeteras"><i class="fa fa-angle-double-right"></i> Fondos de Usuarios</a></li>
                           <li><a href="#"><i class="fa fa-angle-double-right"></i> Pagos Autorizados</a></li>
                           <li><a href="#"><i class="fa fa-angle-double-right"></i> Ingresos</a></li>
                           <li><a href="?p=lista_bono_inicio"><i class="fa fa-angle-double-right"></i> Lista de Bono de Inicio</a></li>
                           <li><a href="?p=lista_bono_crecimiento"><i class="fa fa-angle-double-right"></i> Lista de Bono de Crecimiento</a></li>
                        </ul>
                        </li>

                        <li class="treeview">
                        	<a href="#">
                        	<i class="fa fa-users"></i> <span>Usuarios</span>
                            	<i class="fa fa-angle-left pull-right"></i>
                            	</a>
                            <ul class="treeview-menu">
                            	<li><a href="?p=usuarios&ver=activos"><i class="fa fa-angle-double-right"></i> Activos</a></li>
                            	<li><a href="?p=usuarios&ver=inactivos"><i class="fa fa-angle-double-right"></i> Inactivos</a></li>
                            	<li><a href="?p=usuarios"><i class="fa fa-angle-double-right"></i> Todos</a></li>
                                <li><a href="?p=bono_inicio"><i class="fa fa-money"></i> Bono de Inicio</a></li>
                                <li><a href="?p=bono_crecimiento"><i class="fa fa-money"></i> Bono de Crecimiento</a></li>
                            </ul>
                           </li>

                           <li class="treeview">
                           <a href="#">
                           <i class="fa fa-check-square-o"></i> <span>Solicitudes</span>
                           <i class="fa fa-angle-left pull-right"></i>
                           </a>
                           <ul class="treeview-menu">
                           <li><a href="?p=afiliaciones_pendientes"><i class="fa fa-angle-double-right"></i> Afiliaciones Pendientes</a></li>
                            <li><a href="?p=compras_pendientes"><i class="fa fa-angle-double-right"></i> Compras Pendientes</a></li>
                           <li><a href="?p=solicitudes"><i class="fa fa-angle-double-right"></i> Solicitud de Fondos</a></li>
                            <li><a href="?p=recargas_pendientes"><i class="fa fa-angle-double-right"></i> Recargas Pendientes</a>
                           </ul>
                           </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gears"></i> <span>Configuraciones</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li><a href="?p=mensajes"><i class="fa fa-angle-double-right"></i> Mensajes Principal</a></li>
                                <li><a href="?p=admin"><i class="fa fa-angle-double-right"></i> Nombrar Sub Admin.</a></li>
                                <li><a href="?p=afiliaciones"><i class="fa fa-angle-double-right"></i> % de Ganancia</a></li>
                                <li><a href="?p=config_productos"><i class="fa fa-angle-double-right"></i> Configurar Productos</a></li>
                                <li><a href="?p=banco"><i class="fa fa-angle-double-right"></i> Manejar Banco(s)</a></li>
                                <li><a href="?p=divisa"><i class="fa fa-angle-double-right"></i> Configurar Divisa</a></li>
                                <li><a href="?p=afiliaciones"><i class="fa fa-angle-double-right"></i> Manejar Afiliaciones</a></li>

                                <li><a href="?p=conf_bono_inicio"><i class="fa fa-angle-double-right"></i> Conf. Bono Inicio</a></li><li><a href="?p=conf_bono_crecimiento"><i class="fa fa-angle-double-right"></i> Conf. Bono Crecimiento</a></li>
                            </ul>
                        </li>





                        <li>
                            <a href="?p=pagos">
                                <i class="fa fa-money"></i> <span>Pagos</span>
                            </a>
                        </li>

                        <?php
                        }
                        ?>



                    </ul>
                </section>
            </aside>






























            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header)
                <section class="content-header">
                    <h1>
                        PROMOLIDER
                        <small>
                            <?php
                                if(!isset($p)){
                                    echo "Panel de control";
                                }elseif($p=="pagos"){
                                    echo "Pagos Pendientes";
                                }elseif($p=="arbol"){
                                    echo "Arbol Binario";
                                }elseif($p=="config"){
                                    echo "Configuración del sistema";
                                }elseif($p=="mispagos"){
                                    echo "Mis Pagos";
                                }
                            ?>
                        </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./"><i class="fa fa-th"></i> PROMOLIDER</a></li>
                        <li class="active">
                              <?php
                                if(!isset($p)){
                                    echo "Panel de control";
                                }elseif($p=="pagos"){
                                    echo "Pagos Pendientes";
                                }elseif($p=="arbol"){
                                    echo "Arbol Binario";
                                }elseif($p=="config"){
                                    echo "Configuración del sistema";
                                }elseif($p=="mispagos"){
                                    echo "Mis Pagos";
                                }
                            ?>
                        </li>
                    </ol>
                </section>-->














                <section id="ppp">
                <?php
                if(!isset($p)){
                    include "modulos/principal.php";
                    }else{
                        ?>
                        <section id="ocontent">
                             <?php
                         if(isset($_SESSION['adv']) && $_SESSION['adv'] != "")
                                        { ?>
                                        <div style="display:block;" id="warning" class="alert alert-danger alert-dismissable">
                                            <i class="fa fa-ban"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b>¡Error!</b> <?=$_SESSION['adv']?>
                                        </div>
                                        <?php

                                          unset($_SESSION['adv']);

                                        }

                                        ?>
                        <?php
                        if(file_exists("modulos/".$p.".php")){
                            include "modulos/".$p.".php";
                        }
                        ?>
                        </section>
                        <?php
                    }
                    ?>
                    </section>






















                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

    </body>
</html>



<section id="cajafixed">
</section>
<section id="bgf">
&nbsp;
</section>

<section id="ajax-loader">
</section>


 <!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="titulofix">&nbsp;

                        </h4>
                    </div>
                    <div class="modal-body" id="productoos">
                    </div>

                    <div class="modal-footer clearfix">

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script>
        $("#barraoficina").toggle();
        $("#iframeoficina").css("border-top","none");
        </script>
        <script>
            function culqi() {
                console.log("La funcion culqi está definida");
                if (Culqi.token) {
                    var token = Culqi.token.id;
                    var email = Culqi.token.email;
                    var monto = getFinalAmount();

                    $.ajax({
                        type: "POST",
                        url: "https://www.promolider.org/sistema/culqi_config/finalizar_compra_culqi_desde_recarga.php",
                        data: {
                            email: email,
                            token: token,
                            precio: monto,
                            descripcion: 'Recarga de Fondos'
                        },
                        dataType:'json',
                        success: function(data){
                            data = JSON.parse(JSON.stringify(data));
                            console.log(data);
                            var response = "Ha ocurrido un error en la transacción. Revise sus datos o intente con con otra tarjeta.";
                            let band=false;
                            if(data.capture==true){
                                response = "Su transacción se ha realizado con éxito.";
                                band=true;
                            }
                            alert(response);
                            if(band==true){
                                alert("Recarga en proceso, espera a que sea revisada por el administrador.");
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText); 
                        }
                    });
                }
                else {
                    console.log(Culqi.error);
                    alert(Culqi.error.user_message);
                }
            };
        </script>
<?php

require "config/conection.php";

include "paypal_class.php";
include "library.php";
define('EMAIL_ADD', 'promoliderpagos@gmail.com');
define('PAYPAL_EMAIL_ADD', 'promoliderpagos@gmail.com');

check_generaciones();

if(! isset($_SESSION['nvirtual']))
{
    header("Location:login/");
    die();
}else{
    if(rol($_SESSION['nvirtual'])>0){
        check_activos_y_calificados();
    }
}

if(isset($p)){
    if(!file_exists("modulos/".$p.".php")){
         $_SESSION['adv'] = "La pagina solicitada no existe. <a href='./'>Pagina Principal</a>";
    }
}

                        if(file_exists("img/avatares/".$_SESSION['nvirtual'].".jpg")){
                            $imagenhola = $_SESSION['nvirtual'].".jpg";
                        }else{
                            $imagenhola = "0.png";
                        }


?>
<!DOCTYPE html>
<html>
    <head>

        <title>PROMOLIDER INTERNACIONAL</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/sahum.css" rel="stylesheet" type="text/css" />
                <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
         <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <script src="js/promolid.js" type="text/javascript"></script>
    </head>

    <body class="skin-blue">
        <header class="header">
            <a href="./" class="logo">
               PROMOLIDER
            </a>

            <nav class="navbar navbar-static-top" role="navigation">

                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                       <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <?php
                                $smsjs = mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' ORDER BY fecha DESC LIMIT 10");

                                if(mysqli_num_rows(mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0"))>0){
                                ?>
                                <span class="label label-success"><?=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0"))?></span>
                                <?php
                                    }
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes <?=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0"))?> nuevos mensajes</li>
                                <li>

                                    <ul class="menu">

                                        <?php
                                        while($rmsjs = mysqli_fetch_array($smsjs)){
                                            if(file_exists("img/avatares/".$rmsjs['nvirtualenviado'].".jpg")){
                                                $imagenenvia = $rmsjs['nvirtualenviado'].".jpg";
                                            }else{
                                                $imagenenvia = "0.png";
                                            }
                                            ?>
                                            <li>
                                                <a href="?p=mailbox&cme=<?=$rmsjs['id']?>">
                                                    <div class="pull-left">
                                                        <img src="img/avatares/<?=$imagenenvia?>" class="img-circle" alt="User Image" title="<?=nombre_apellido_usuario($rmsjs['nvirtualenviado'])?>"/>
                                                    </div>
                                                    <h4>
                                                      <?=nombre_usuario($rmsjs['nvirtualenviado'])?>
                                                      <?php
                                                      if($rmsjs['estatus']==0){
                                                        ?>
                                                        <span style="color:#f40;">*</span>
                                                        <?php
                                                      }
                                                      ?>
                                                      <small><i class="fa fa-clock-o" data-toggle="tooltip" data-placement="left" title=" <?=fecha_hora($rmsjs['fecha'])?>"></i></small>
                                                    </h4>
                                                    <p>
                                                    <?php
                                                        echo $rmsjs['asunto'];
                                                    ?>
                                                    </p>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="?p=mailbox">Ver todos los mensajes</a></li>
                            </ul>
                        </li>
                         <?php
                            $snf = mysqli_query($connection,"SELECT * FROM notificaciones WHERE nvirtual = '".$_SESSION['nvirtual']."' AND visto = 0");
                            $snf2 = mysqli_query($connection,"SELECT * FROM notificaciones WHERE nvirtual = '".$_SESSION['nvirtual']."' ORDER BY visto ASC LIMIT 10");
                            ?>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <?php
                                if(mysqli_num_rows($snf)>0){ ?>
                                <span class="label label-warning"><?=mysqli_num_rows($snf)?></span>
                                <?php
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu">



                                <li class="header">Tienes <?=mysqli_num_rows($snf)?> nuevas notificacion(es)</li>
                                <li>
                                    <ul class="menu">

                                        <?php
                                        while($rnf = mysqli_fetch_array($snf2)){
                                            ?>
                                            <li <?php if($rnf['visto']==0){ ?> class="notif_novisto" <?php } ?> >
                                                <a href="?p=notificacion&ver=<?=$rnf['id']?>">
                                                    <i class="fa fa-warning danger"></i> <?=$rnf['titulo']?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <li class="footer"><a href="?p=notificaciones">Ver Todas</a></li>
                            </ul>
                        </li>




                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?=nombre_apellido_conectado()?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header bg-light-blue">

                                     <?php
                        $binario = $_SESSION['nvirtual'];
                        if(file_exists("img/avatares/".$binario.".jpg")){
    ?>
         <img src="img/avatares/<?=$binario?>.jpg" class="img-circle" alt="User Image"/>

    <?php
}else{
    ?>
         <img src="img/avatares/0.jpg" class="img-circle" alt="User Image"/>
     <?php
}
?>

                                    
                                    <p>
                                        <?=nombre_apellido_conectado()?> <small><?=tipo_afiliacion_conectado()?></small>
                                        <small>Miembro desde <?=mes_inscripcion_conectado()?>. <?=ano_inscripcion_conectado()?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="?p=perfil" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?p=logout" class="btn btn-default btn-flat">Cerrar sesi&oacute;n</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">

            <aside class="left-side sidebar-offcanvas">

                <section class="sidebar">

                    <div class="user-panel">
                        <div class="pull-left image">
                           <img src="img/avatares/<?=$imagenhola?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?=nombre_conectado()?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                   <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input onkeyup="busqueda_principal();" id="busquedap" type="text" name="q" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='reset' name='reset' class="btn btn-flat" onclick="busqueda_principal_restar();"><span>&times;</span></button>
                            </span>
                        </div>
                    </form>
                    <center>
                            <input type="submit" class="btn btn-flat" id="botonb" value="Bloquear Busqueda" onclick="bloqdesbloq();"/>
                </center>
                <br>






















                    <ul class="sidebar-menu">

                        <li class="active">
                            <a href="./login.php">
                                <i class="fa fa-th"></i> <span>Panel de control</span>
                            </a>
                        </li>

                        <li>
                            <a href="?p=arbol">
                                <i class="fa fa-sitemap"></i> <span>Mi Red Binaria</span>
                            </a>
                        </li>

                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i> <span>Tienda Virtual</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview"><a href="#"><i class="fa fa-dollar"></i> Comprar Productos <i class="fa fa-angle-left pull-right"></i></a>

                                <ul class="treeview-menu">
                                	<li><a href="?p=tienda&tipo=1"><i class="fa fa-angle-double-right"></i> Diplomados</a></li>
                                	<li><a href="?p=tienda&tipo=2"><i class="fa fa-angle-double-right"></i> Recompra</a></li>
                                	<li><a href="?p=tienda&tipo=3"><i class="fa fa-angle-double-right"></i> Safips</a></li>
                                	<li><a href="?p=tienda&tipo=4"><i class="fa fa-angle-double-right"></i> Encomiendas</a></li>
                                </ul>
                                </li>
                                <li><a href="?p=carrito"><i class="fa fa-angle-double-right"></i> Mi Carrito</a></li>
                                <li><a href="?p=mis_compras"><i class="fa fa-angle-double-right"></i> Compras Realizadas</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="?p=mailbox">
                                <i class="fa fa-inbox"></i> <span>Mensajes</span>

                                 <?php
                                $sm = mysqli_query($connection,"SELECT * FROM bandeja_entrada WHERE nvirtual = '".$_SESSION['nvirtual']."' AND estatus = 0");
                                if(mysqli_num_rows($sm)>0){
                                    ?>
                                        <small class="badge pull-right bg-green">
                                            <?=mysqli_num_rows($sm)?>
                                        </small>
                                    <?php
                                }
                                ?>
                            </a>
                        </li>




                        <li>
                            <a href="?p=inventario">
                                <i class="fa fa-archive"></i> Inventario
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-stats"></i> <span>Balance</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="?p=billetera"><i class="fa fa-angle-double-right"></i> Mi Billetera</a></li>
                                <li><a href="?p=retiros"><i class="fa fa-angle-double-right"></i> Mis Retiros</a></li>
                                <li><a href="?p=financiero"><i class="fa fa-angle-double-right"></i> Saldo Financiero</a></li>
                                <li><a href="?p=comisionesb"><i class="fa fa-angle-double-right"></i> Comisiones Binarias</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="?p=mailbox&em=administrador">
                            <i class="fa fa-comment"></i> Envianos un Msj
                            </a>
                        </li>
                        <li>
                            <a href="?p=mispagos">
                                <i class="fa fa-money"></i> Mis Pagos
                            </a>
                        </li>

                        <?php


                        if(rol($_SESSION['nvirtual'])>0){
                            ?>

                        <li class="treeview">
                            <a href="pages/calendar.html">
                                <i class="fa fa-gears"></i> <span>Configuraciones</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li><a href="?p=mensajes"><i class="fa fa-angle-double-right"></i> Mensajes Principal</a></li>
                                <li><a href="?p=admin"><i class="fa fa-angle-double-right"></i> Nombrar Administrador</a></li>
                                <li><a href="?p=divisa"><i class="fa fa-angle-double-right"></i> Configurar Divisa</a></li>
                                <li><a href="?p=afiliaciones"><i class="fa fa-angle-double-right"></i> Manejar Afiliaciones</a></li>
                                <li><a href="?p=banco"><i class="fa fa-angle-double-right"></i> Manejar Banco(s)</a></li>
                                <li><a href="?p=corte"><i class="fa fa-angle-double-right"></i> Corte Binario</a></li>
                                <li><a href="?p=usuarios"><i class="fa fa-angle-double-right"></i> Lista de usuarios</a></li>
                                <li><a href="?p=config_productos"><i class="fa fa-angle-double-right"></i> Configurar Productos</a></li>
                                <li><a href="?p=solicitudes"><i class="fa fa-angle-double-right"></i> Solicitud de Fondos</a></li>
                                <li><a href="?p=billeteras"><i class="fa fa-angle-double-right"></i> Fondos de Usuarios</a></li>
                                <li><a href="?p=recargas_pendientes"><i class="fa fa-angle-double-right"></i> Recargas Pendientes</a>
                            </ul>
                        </li>

                        <li>
                            <a href="?p=afiliaciones_pendientes">
                                <i class="fa fa-users"></i> <span>Afiliaciones Pendientes</span>
                                <?php
                                $sa = mysqli_query($connection,"SELECT * FROM por_afiliar");
                                if(mysqli_num_rows($sa)>0){
                                    ?>
                                        <small class="badge pull-right bg-red">
                                            <?=mysqli_num_rows($sa)?>
                                        </small>
                                    <?php
                                }
                                ?>
                            </a>
                        </li>

                         <li>
                            <a href="?p=compras_pendientes">
                                <i class="fa fa-shopping-cart"></i> <span>Compras Pendientes</span>
                                <?php
                                $sco = mysqli_query($connection,"SELECT * FROM compra_espera WHERE desautorizado = 0");
                                if(mysqli_num_rows($sco)>0){
                                    ?>
                                        <small class="badge pull-right bg-red">
                                            <?=mysqli_num_rows($sco)?>
                                        </small>
                                    <?php
                                }
                                ?>
                            </a>
                        </li>

                        <li>
                            <a href="?p=pagos">
                                <i class="fa fa-money"></i> <span>Pagos</span>
                            </a>
                        </li>

                        <?php
                        }
                        ?>



                    </ul>
                </section>
            </aside>






























            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header)
                <section class="content-header">
                    <h1>
                        PROMOLIDER
                        <small>
                            <?php
                                if(!isset($p)){
                                    echo "Panel de control";
                                }elseif($p=="pagos"){
                                    echo "Pagos Pendientes";
                                }elseif($p=="arbol"){
                                    echo "Arbol Binario";
                                }elseif($p=="config"){
                                    echo "Configuración del sistema";
                                }elseif($p=="mispagos"){
                                    echo "Mis Pagos";
                                }
                            ?>
                        </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./login.php"><i class="fa fa-th"></i> PROMOLIDER</a></li>
                        <li class="active">
                              <?php
                                if(!isset($p)){
                                    echo "Panel de control";
                                }elseif($p=="pagos"){
                                    echo "Pagos Pendientes";
                                }elseif($p=="arbol"){
                                    echo "Arbol Binario";
                                }elseif($p=="config"){
                                    echo "Configuración del sistema";
                                }elseif($p=="mispagos"){
                                    echo "Mis Pagos";
                                }
                            ?>
                        </li>
                    </ol>
                </section>-->














                <section id="ppp">
                <?php
                if(!isset($p)){
                    include "modulos/principal.php";
                    }else{
                        ?>
                        <section id="ocontent">
                             <?php
                         if(isset($_SESSION['adv']) && $_SESSION['adv'] != "")
                                        { ?>
                                        <div style="display:block;" id="warning" class="alert alert-danger alert-dismissable">
                                            <i class="fa fa-ban"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b>¡Error!</b> <?=$_SESSION['adv']?>
                                        </div>
                                        <?php

                                          unset($_SESSION['adv']);

                                        }

                                        ?>
                        <?php
                        if(file_exists("modulos/".$p.".php")){
                            include "modulos/".$p.".php";
                        }
                        ?>
                        </section>
                        <?php
                    }
                    ?>
                    </section>






















                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

    </body>
</html>



<section id="cajafixed">
</section>
<section id="bgf">
&nbsp;
</section>

<section id="ajax-loader">
</section>


 <!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="titulofix">&nbsp;

                        </h4>
                    </div>
                    <div class="modal-body" id="productoos">
                    </div>

                    <div class="modal-footer clearfix">

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script>
        $("#barraoficina").toggle();
        $("#iframeoficina").css("border-top","none");
        </script>