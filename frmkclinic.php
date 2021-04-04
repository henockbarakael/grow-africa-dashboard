<?php
require_once 'core/init.php';
if (Session::exists('home')) {
  echo Session::flash('home');
}
$user = new User();
if (!$user->isLoggedIn()) {
  Redirect::to('index.php');
}
$_SESSION['isActivePage'] = 'admin_dashboard';
$_SESSION['page_actuel'] = 'Dashboard';
$sql = "SELECT COUNT(*) as nombre, sexe FROM retenus GROUP BY sexe";
$result = DB::getInstance()->query($sql)->result();
if (isset($result)) {
  foreach ($result as $value) {
      $enfant_all= $value->nombre;
    if  ($value->sexe=='F') {
      $fille_all = $value->nombre;
    }
    elseif  ($value->sexe=='M') {
      $garçon_all = $value->nombre;
    }  					
  }
  $enfant_all = $fille_all + $garçon_all;
  $percent_f = round(($fille_all * 100)/$enfant_all, 2);
  $percent_g = round(($garçon_all * 100)/$enfant_all, 2);		
}
$age= "SELECT COUNT(*) as nombre, sexe, date_depot, age FROM retenus  GROUP BY sexe, date_depot, age";
$result2 = DB::getInstance()->query($age)->result();
if (isset($result2)) {
  foreach ($result2 as $value) {
    if ($value->sexe=='M' && $value->age=='15') {
      $garçon_15 = $value->nombre;
    }	
    elseif  ($value->sexe=='M' && $value->age=='16') {
      $garçon_16 = $value->nombre;
    }
    elseif  ($value->sexe=='M' && $value->age=='17') {
      $garçon_17 = $value->nombre;
    }
    elseif  ($value->sexe=='M' && $value->age=='18') {
      $garçon_18 = $value->nombre;
    }
    elseif  ($value->sexe=='M' && $value->age=='19') {
      $garçon_19 = $value->nombre;
    }
    elseif  ($value->sexe=='M' && $value->age=='20') {
      $garçon_20 = $value->nombre;
    }	
    elseif  ($value->sexe=='F' && $value->age=='13') {
      $fille_13 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='14') {
      $fille_14 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='15') {
      $fille_15 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='16') {
      $fille_16 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='17') {
      $fille_17 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='18') {
      $fille_18 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='19') {
      $fille_19 = $value->nombre;
    }	
    elseif  ($value->sexe=='F' && $value->age=='20') {
      $fille_20 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='21') {
      $fille_21 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='22') {
      $fille_22 = $value->nombre;
    }
    elseif  ($value->sexe=='F' && $value->age=='23') {
      $fille_23 = $value->nombre;
    }   					
  }
}
$day3= "SELECT COUNT(*) as nombre, sexe, date_depot FROM retenus  GROUP BY sexe, date_depot";
$result3 = DB::getInstance()->query($day3)->result();
if (isset($result3)) {
  foreach ($result3 as $value) {
    if ($value->sexe=='M'  && $value->date_depot=='05/03/2021') {
      $count_M5 = $value->nombre;
    }	
    elseif  ($value->sexe=='F'  && $value->date_depot=='05/03/2021') {
      $count_F5 = $value->nombre;
    }
    elseif  ($value->sexe=='M'  && $value->date_depot=='06/03/2021') {
      $count_M6 = $value->nombre;
    }	
    elseif  ($value->sexe=='F'  && $value->date_depot=='06/03/2021') {
      $count_F6 = $value->nombre;
    }	
    elseif  ($value->sexe=='M'  && $value->date_depot=='08/03/2021') {
      $count_M8 = $value->nombre;
    }	
    elseif  ($value->sexe=='F'  && $value->date_depot=='08/03/2021') {
      $count_F8 = $value->nombre;
    }
    elseif  ($value->sexe=='M'  && $value->date_depot=='09/03/2021') {
      $count_M9 = $value->nombre;
    }	
    elseif  ($value->sexe=='F'  && $value->date_depot=='09/03/2021') {
      $count_F9 = $value->nombre;
    }
    elseif  ($value->sexe=='M'  && $value->date_depot=='10/03/2021') {
      $count_M10 = $value->nombre;
    }	
    elseif  ($value->sexe=='F'  && $value->date_depot=='10/03/2021') {
      $count_F10 = $value->nombre;
    }	
    elseif  ($value->sexe=='F' ) {
      $fille_all = $value->nombre;
    }
    elseif  ($value->sexe=='M' ) {
      $garçon_all = $value->nombre;
    }	
    elseif  ($value->sexe=='M'  && $value->sexe=='F' ) {
      $enfant_all = $value->nombre;
    }		   					
  }
}
$sql17= "SELECT COUNT(*) as nombre FROM retenus  where age between '15' and '17' and sexe = 'M' order by age desc";
$result17 = DB::getInstance()->query($sql17)->result();
if (isset($result17)) {
  foreach ($result17 as $value) {   
      $G_U17 = $value->nombre;
    }	
}
$sql17f= "SELECT COUNT(*) as nombre FROM retenus  where age between '13' and '17' and sexe = 'F' order by age desc";
$result17f = DB::getInstance()->query($sql17f)->result();
if (isset($result17f)) {
  foreach ($result17f as $value) {   
      $F_U17 = $value->nombre;
    }	
}

$sql20f= "SELECT COUNT(*) as nombre FROM retenus  where age between '18' and '25' and sexe = 'F' order by age desc";
$result20f = DB::getInstance()->query($sql20f)->result();

if (isset($result20f)) {
  foreach ($result20f as $value) {   
      $F_U20 = $value->nombre;
    }	
}

$poste= "SELECT COUNT(*) as nombre FROM user_profile  where poste_1= '1' and poste_2= '1' and sexe='M' order by id desc";
$gardien = DB::getInstance()->query($poste)->result();

if (isset($gardien)) {
  foreach ($gardien as $value) {   
      $gardien_m = $value->nombre;
    }	
}

$comm= "SELECT count(*) as nombre FROM `user_profile` where commune in ('M', 'F', '')";
$commune = DB::getInstance()->query($comm)->result();

if (isset($commune)) {
  foreach ($commune as $value) {   
      $edit_commune = $value->nombre;
    }	
}

$req= "SELECT count(*) as nombre FROM `user_profile` where poste_1=''";
$ed_post = DB::getInstance()->query($req)->result();

if (isset($ed_post)) {
  foreach ($ed_post as $value) {   
      $edit_post = $value->nombre;
    }	
}

$poste2= "SELECT COUNT(*) as nombre FROM user_profile  where poste_1= '1' and poste_2= '1' and sexe='F' order by id desc";
$gardien2 = DB::getInstance()->query($poste2)->result();

if (isset($gardien2)) {
  foreach ($gardien2 as $value) {   
      $gardien_f = $value->nombre;
    }	
}

$sql20= "SELECT COUNT(*) as nombre FROM retenus where age between '18' and '20' and sexe = 'M' order by age desc";
$result20 = DB::getInstance()->query($sql20)->result();

if (isset($result20)) {
  foreach ($result20 as $value) {   
      $G_U20 = $value->nombre;
    }	
}

$sqlX= "SELECT COUNT(*) as nombre FROM retenus where age='' and sexe = 'M' order by id desc";
$resultX = DB::getInstance()->query($sqlX)->result();

if (isset($resultX)) {
  foreach ($resultX as $value) {   
      $G_UX = $value->nombre;
    }	
}

$sqlY= "SELECT COUNT(*) as nombre FROM retenus where age='' and sexe = 'F' order by id desc";
$resultY = DB::getInstance()->query($sqlY)->result();

if (isset($resultY)) {
  foreach ($resultY as $value) {   
      $F_UY = $value->nombre;
    }	
}

$poste_update= "SELECT nom, postnom, prenom, code, telephone, poste_1, poste_2, date_naissance FROM `user_profile` WHERE poste_1!=''";
$poste_update_result = DB::getInstance()->query($poste_update)->result();

if (isset($poste_update_result )) {
  foreach ($poste_update_result  as $value) {   
      $update_poste = $value->nombre;
    }	
}
?>
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/admetro/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:05:59 GMT -->
<head>
<meta charset="utf-8" />
<title>Admin Dashboard</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/css/app.min.css" rel="stylesheet" />
<link href="https://seantheme.com/" rel="stylesheet" />
<link href="assets/plugins/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" />
<link href="assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />



</head>
<body>

<div id="app" class="app app-header-fixed app-sidebar-fixed">
<div id="app-notification-container" class="app-notification-container">
	<div class="app-notification  bounceInRight animated ">
		<div class="notification-media">
			<i class="fa fa-envelope bg-gradient-blue-indigo text-white"></i>
		</div>
		<div class="notification-info">
			<h4 class="notification-title">Notification</h4>
			<p class="notification-desc"><?php echo "Bonjour"." ".$user->data()->nom." ".$user->data()->prenom." "."et bienvenu!"; ?></p>
		</div>
		<div class="notification-btn single-btn">
			<a href="#" data-dismiss="notification">Close</a>
		</div>
	</div>
</div>
<?php require_once 'components/top-menu.php'; ?>
<?php require_once 'components/sidebar.php'; ?>


<div id="content" class="app-content">

<h1 class="page-header">
Dashboard <small>statistiques</small>
</h1>


<div class="row">

<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats bg-gradient-blue text-white m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">JOUEURS</div>
<div class="widget-stats-value">
<?php 
						if (isset($result)) {
							foreach ($result as $value) {
								if ($value->sexe=='M') {
									$count_M = $value->nombre;
								}										
							}
						echo $count_M;			
					?>
</div>
<div class="widget-stats-desc">RETENUS</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-shopping-bag"></i>
</div>
</a>

</div>


<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats widget-stats-inverse bg-gradient-purple m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">JOUESES</div>
<div class="widget-stats-value">
<?php 
						
						foreach ($result as $value) {
							if ($value->sexe=='F') {
								$count_F = $value->nombre;
							}										
						}
					echo $count_F;			
				?>
</div>
<div class="widget-stats-desc">RETENUES</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-hand-pointer"></i>
</div>
</a>

</div>


<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats widget-stats-inverse bg-gradient-pink m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">TAUX DE PARTICIPATION</div>
<div class="widget-stats-value">
<?php echo $percent_g; ?> %
</div>
<div class="widget-stats-desc">Garçons</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-user-astronaut"></i>
</div>
</a>
</div>


<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats widget-stats-inverse bg-gradient-orange m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">TAUX DE PARTICIPATION</div>
<div class="widget-stats-value">
<?php echo $percent_f; ?> %
</div>
<div class="widget-stats-desc">Filles</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-file-invoice"></i>
</div>
</a>

</div>

</div>


<div class="row">

<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats bg-gradient-blue text-white m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">GARDIENS</div>
<div class="widget-stats-value">
<?php echo $gardien_m; ?>
</div>
<div class="widget-stats-desc">RETENUS</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-shopping-bag"></i>
</div>
</a>

</div>


<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats widget-stats-inverse bg-gradient-purple m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">GARDIENNES</div>
<div class="widget-stats-value">
<?php echo $gardien_f; ?>
</div>
<div class="widget-stats-desc">RETENUES</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-hand-pointer"></i>
</div>
</a>

</div>


<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats widget-stats-inverse bg-gradient-pink m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">MISE A JOUR COMMUNE</div>
<div class="widget-stats-value">
<?php echo $edit_commune; ?> restants
</div>
<div class="widget-stats-desc">Nbre des candidats restants</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-user-astronaut"></i>
</div>
</a>
</div>


<div class="col-xl-3 col-sm-6">

<a href="#" class="widget-stats widget-stats-inverse bg-gradient-orange m-b-15">
<div class="widget-stats-info">
<div class="widget-stats-title">MISE A JOUR POSTE</div>
<div class="widget-stats-value">
<?php echo $edit_post; ?> restants
</div>
<div class="widget-stats-desc">Nbre des candidats restants</div>
</div>
<div class="widget-stats-icon">
<i class="fa fa-file-invoice"></i>
</div>
</a>

</div>

</div>
<!--<div class="card ">

    <div class="card-header card-header-inverse">
      <h4 class="card-header-title">
      Liste complète des candidats retenus
      </h4>
        <div class="card-header-btn">
          <a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
          <a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
          
        </div>
    </div>
    <div class="card-body">

      <table id="datatables-default" class="table table-striped table-td-valign-middle table-bordered bg-white">
        <thead>
          <tr>
            <th width="5%" class="no-sort">#</th>
            <th width="20%">NOM</th>
            <th width="20%">POSTNOM</th>
            <th width="20%">PRENOM</th>
            <th width="5%">AGE</th>
            <th width="10%">CODE</th>
            <th width="10%">POSTE 1</th>
            <th width="10%">POSTE 2</th>
          </tr>
        </thead>
                
        <tbody>
            <?php foreach ($poste_update_result as $value) { ?>
                  <tr>
                    <td><?php echo $value->id;?></td>
                    <td><?php echo $value->nom;?></td>
                    <td><?php echo $value->postnom;?></td>
                    <td><?php echo $value->prenom;?></td>
                    <td><?php echo $value->date_naissance;?></td>
                    <td><?php echo $value->code;?></td>
                    <td><?php echo $value->poste_1;?></td>
                    <td><?php echo $value->poste_2;?></td>
                  </tr>
                  <?php } ?>
          </tbody>
      </table>

    </div>
  </div> -->

<div class="row">
<div class="col-lg-6">

<div class="card m-b-15">
<div class="card-header card-header-inverse">
<h4 class="card-header-title">BAR CHART</h4>
<div class="card-header-btn">
<a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
<a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
<a href="#" data-toggle="card-remove" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
</div>
</div>
<div class="card-body">
<p class="desc">A bar chart is a way of showing data as bars. It is sometimes used to show trend data, and the comparison of multiple data sets side by side.</p>
<canvas id="barChart" height="150"></canvas>
</div>
</div>

</div>


<div class="col-lg-6">

<div class="card m-b-15">
<div class="card-header card-header-inverse">
<h4 class="card-header-title">RADAR CHART</h4>
<div class="card-header-btn">
<a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
<a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
<a href="#" data-toggle="card-remove" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
</div>
</div>
<div class="card-body">
<p class="desc">A radar chart is a way of showing multiple data points and the variation between them. They are often useful for comparing the points of two or more different data sets.</p>
<canvas id="radarChart" height="150"></canvas>
</div>
</div>

</div>


<div class="col-lg-6">

<div class="card m-b-15">
<div class="card-header card-header-inverse">
<h4 class="card-header-title">POLAR AREA CHART</h4>
<div class="card-header-btn">
<a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
<a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
<a href="#" data-toggle="card-remove" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
</div>
</div>
<div class="card-body">
<p class="desc">Polar Area Chart is often useful when we want to show a comparison data similar to a pie chart, but also show a scale of values for context.</p>
<canvas id="polarAreaChart" height="150"></canvas>
</div>
</div>

</div>


<div class="col-lg-6">

<div class="card m-b-15">
<div class="card-header card-header-inverse">
<h4 class="card-header-title">PIE & DOUGHNUT CHART</h4>
<div class="card-header-btn">
<a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
<a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
<a href="#" data-toggle="card-remove" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
</div>
</div>
<div class="card-body">
<p class="desc">Pie and doughnut charts are probably the most commonly used charts there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data.</p>
<canvas id="pieChart" height="150"></canvas>
</div>
</div>

</div>


<div class="col-lg-6">

<div class="card m-b-15">
<div class="card-header card-header-inverse">
<h4 class="card-header-title">PIE & DOUGHNUT CHART</h4>
<div class="card-header-btn">
<a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
<a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
<a href="#" data-toggle="card-remove" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
</div>
</div>
<div class="card-body">
<p class="desc">Pie and doughnut charts are effectively the same class in Chart.js, but have one different default value - their cutoutPercentage. This equates what percentage of the inner should be cut out.</p>
<canvas id="doughnutChart" height="150"></canvas>
</div>
</div>

</div>

</div>

</div>

<?php } ?>
<script src="assets/js/app.min.js" type="220d35aa6b15292fd669e22e-text/javascript"></script>

<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-autofill/js/dataTables.autoFill.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>

<script src="assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-colreorder-bs4/js/colReorder.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-fixedcolumns-bs4/js/fixedColumns.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-fixedheader-bs4/js/fixedHeader.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-rowgroup/js/dataTables.rowGroup.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-rowgroup-bs4/js/rowGroup.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-scroller/js/dataTables.scroller.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-scroller-bs4/js/scroller.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-select/js/dataTables.select.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script src="assets/js/demo/table-data.demo.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>
<script>
$(document).ready(function() {
    $('#datatables-default').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script src="assets/plugins/chart.js/dist/Chart.min.js" type="220d35aa6b15292fd669e22e-text/javascript"></script>
<script src="assets/js/demo/chart.demo.js" type="220d35aa6b15292fd669e22e-text/javascript"></script>

<script type="220d35aa6b15292fd669e22e-text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="220d35aa6b15292fd669e22e-|49" defer=""></script></body>

<!-- Mirrored from seantheme.com/admetro/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:06:02 GMT -->
</html>