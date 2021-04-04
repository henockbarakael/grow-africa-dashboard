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
$sql= "SELECT * FROM `user_profile` where date_naissance between '18' and '20' and sexe ='M' order by code asc";
$result = DB::getInstance()->query($sql)->result();

?>
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/admetro/table_data.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:06:40 GMT -->
<head>
<meta charset="utf-8" />
<title>U-21 Garçons</title>
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

<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">CANDIDATS</a></li>
<li class="breadcrumb-item active">U-21 Garçons</li>
</ul>


<h1 class="page-header">
Base des données
</h1>


<div class="card ">

<div class="card-header card-header-inverse">
<h4 class="card-header-title">
Liste U-21 Garçons
</h4>
<div class="card-header-btn">
<a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
<a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
<!--<a href="#" data-toggle="card-remove" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>-->
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
<?php
                    foreach ($result as $value) {
                  ?>
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
</div>
</div>


<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>


<script src="assets/js/app.min.js" type="cdc0d8de7b3143b79871f654-text/javascript"></script>


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
<script type="cdc0d8de7b3143b79871f654-text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="cdc0d8de7b3143b79871f654-|49" defer=""></script></body>

<!-- Mirrored from seantheme.com/admetro/table_data.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:07:07 GMT -->
</html>