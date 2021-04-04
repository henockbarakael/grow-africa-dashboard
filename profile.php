<?php
error_reporting(-1); // maximum errors
ini_set('display_errors', '1'); // show on screen
require_once 'core/init.php';
if (Session::exists('home')) {
  echo Session::flash('home');
}
$_SESSION['isActivePage'] = 'admin_dashboard';
$_SESSION['page_actuel'] = 'Mon compte';
$user= new User();
if (!$user->isLoggedIn()) {
  Redirect::to('index.php');
}

?>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
<meta charset="utf-8" />
<title>Grow Africa | Profile</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/css/app.min.css" rel="stylesheet" />

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

<div id="content" class="app-content p-0">

<div class="profile-header">

<div class="profile-header-cover"></div>
<div class="profile-header-content">
<div class="profile-header-img">
<?php
            if (strstr(strtolower($user->data()->code), 'frmclinic') != false) {
                $logo = 'avatar5.png';
            } else {
                $logo = 'ballon.png';
              }
            ?>
	<img src="assets/img/<?php echo $logo; ?>" alt="" />
</div>

<div class="profile-header-info">
	<h4><?php echo $user->data()->nom." ".$user->data()->postnom." ".$user->data()->prenom; ?></h4>
	<p><?php echo $user->data()->code;?></p>
	<a href="edit-profile.php" class="btn btn-xs btn-rounded btn-primary width-200">Mettre à jour mon profil</a>
</div>
</div>

<ul class="profile-header-tab nav nav-tabs">
	<li class="nav-item"><a href="#profile-about" class="nav-link active" data-toggle="tab">MES INFORMATIONS</a></li>
	<li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">CALENDRIER</a></li>
</ul>
</div>


<div class="profile-container">

<div class="row row-space-20">

<div class="col-xl-8">

<div class="tab-content p-0">

<div class="tab-pane fade  show active" id="profile-about">
<table class="table table-profile">
<thead>
<tr>
<th colspan="2">IDENTITES</th>
</tr>
</thead>
<tbody>
	<tr>
		<td class="field">Nom</td>
		<td class="value">
			<div class="m-b-5">
			<b><?php echo $user->data()->nom; ?></b> <a href="edit-nom.php" class="m-l-10">Modifier</a><br />
			</div>
			<div>
		</td>
	</tr>
	<tr>
		<td class="field">Postnom</td>
		<td class="value">
			<div class="m-b-5">
			<b><?php echo $user->data()->postnom; ?></b> <a href="edit-postnom.php" class="m-l-10">Modifier</a><br />
			</div>
			<div>
		</td>
	</tr>
	<tr>
		<td class="field">Prénom</td>
		<td class="value">
			<div class="m-b-5">
			<b><?php echo $user->data()->prenom; ?></b> <a href="edit-prenom.php" class="m-l-10">Modifier</a><br />
			</div>
			<div>
		</td>
	</tr>
	<tr>
		<td class="field">Age</td>
		<td class="value">
			<div class="m-b-5">
			<b><?php echo $user->data()->date_naissance; ?></b> <a href="edit-age.php" class="m-l-10">Modifier</a><br />
			</div>
			<div>
		</td>
	</tr>
</tbody>
</table>
<table class="table table-profile">
<thead>
	<tr>
	<th colspan="2">INFORMATIONS SUR LES POSTES</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td class="field">Poste 1</td>
		<td class="value">
		<?php echo $user->data()->poste_1; ?>
		<a href="edit-poste_1.php" class="m-l-10">Modifier</a>
		</td>
	</tr>
	<tr>
		<td class="field">Poste 2</td>
		<td class="value">
		<?php echo $user->data()->poste_2; ?><a href="edit-poste_2.php" class="m-l-10">Modifier</a>
		</td>
	</tr>
</tbody>
</table>
<table class="table table-profile">
<thead>
	<tr>
	<th colspan="2">INFORMATIONS DE CONTACT</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td class="field">Téléphone</td>
		<td class="value">
		<?php echo $user->data()->telephone; ?>
		<a href="edit-phone.php" class="m-l-10">Modifier</a>
		</td>
	</tr>
	<tr>
		<td class="field">Email</td>
		<td class="value">
		<?php echo $user->data()->email; ?><a href="edit-mail.php" class="m-l-10">Modifier</a>
		</td>
	</tr>
	<tr>
		<td class="field">Commune</td>
		<td class="value">
		<?php echo $user->data()->commune; ?><a href="edit-commune.php" class="m-l-10">Modifier</a>
		</td>
	</tr>
</tbody>
</table>
</div>


</div>

</div>


<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/app.min.js" type="b575a661cf7d95d7f003e22a-text/javascript"></script>

<script type="b575a661cf7d95d7f003e22a-text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="b575a661cf7d95d7f003e22a-|49" defer=""></script></body>

<!-- Mirrored from seantheme.com/admetro/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:07:51 GMT -->
</html>