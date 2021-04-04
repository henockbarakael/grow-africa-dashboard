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
if (Input::exists()) {
  if (Token::check(Input::get('token'))) {

    $servername = "157.90.55.60";
    $username = "growafri_admin";
    $password = "4n5B:LY6e[w4gR";

try {
  $conn = new PDO("mysql:host=$servername;dbname=growafri_inscription", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
    $acc=$user->data()->code;
      

      $date_naissance = Input::get('birth');

   
      $sql = "UPDATE user_profile SET  date_naissance = :birth WHERE code= '$acc'";
      $stmt = $conn->prepare($sql);
      

      $stmt-> bindParam (':birth', $date_naissance, PDO::PARAM_STR);

      $stmt->execute();

          Session::flash('home','<div class="alert alert-warning alert-dismissible  fade show">
          <strong style="color:white;">Vos informations ont été mises à jour avec succès !</strong>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>');
          Redirect::to('profile.php');
 
    }
  }

?>
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/admetro/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:06:16 GMT -->
<head>
<meta charset="utf-8" />
<title>Paramètres du compte</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/css/app.min.css" rel="stylesheet" />

</head>
<body>

<div id="app" class="app app-header-fixed app-sidebar-fixed">
<?php require_once 'components/top-menu.php'; ?>
<?php require_once 'components/sidebar.php'; ?>

<div id="content" class="app-content">

<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">GESTION DU COMPTE</a></li>
<li class="breadcrumb-item active">MODIFIER MON COMPTE</li>
</ul>


<h1 class="page-header">
<small>Veuillez remplir tous les champs avec(<b style="color: red">*</b>)</small>
</h1>


<div class="row">
	<div class="col-lg-12">
		<div class="card m-b-15">
			<div class="card-header card-header-inverse">
				<h4 class="card-header-title">Mise à jour du profil</h4>
			</div>
			<div class="card-body">
				<form action="" method="POST" autocomplete="off">
					<div class="form-group">
						<label>Age<span class="text-danger">*</span></label>
						<input type="tel" class="form-control" required name="birth" placeholder="Quel est votre âge?" />
					</div>
					<div class="row">
              <div class="col-sm-12">
                  <button type="submit"  class="btn btn-primary">Je mets à jour mon âge</button>
                  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
              </div>
          </div>
				</form>
			</div>
		</div>
	</div>
</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/app.min.js" type="8c16e7efcafdb44f9f1eaaad-text/javascript"></script>

<script type="8c16e7efcafdb44f9f1eaaad-text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="8c16e7efcafdb44f9f1eaaad-|49" defer=""></script></body>

<!-- Mirrored from seantheme.com/admetro/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:06:16 GMT -->
</html>