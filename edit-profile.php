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
      
      $nom = Input::get('firstname');
      $postnom = Input::get('lastname');
      $prenom = Input::get('surname');
      $telephone = Input::get('phone');
      $email = Input::get('mail');
      $date_naissance = Input::get('birth');
      $sexe = Input::get('sex');
      $commune = Input::get('commune');
      $poste_1 = Input::get('post_1');
      $poste_2 = Input::get('post_2');
   
      $sql = "UPDATE user_profile SET nom = :firstname, postnom = :lastname, prenom = :surname, telephone = :phone, email = :mail, date_naissance = :birth, sexe = :sex, commune = :commune, poste_1 = :post_1, poste_2 = :post_2 WHERE code= '$acc'";
      $stmt = $conn->prepare($sql);
      
      $stmt-> bindParam (':firstname', $nom, PDO::PARAM_STR);
      $stmt-> bindParam (':lastname', $postnom, PDO::PARAM_STR);
      $stmt-> bindParam (':surname', $prenom, PDO::PARAM_STR);
      $stmt-> bindParam("phone", $telephone, PDO::PARAM_STR);
      $stmt-> bindParam (':mail', $email, PDO::PARAM_STR);
      $stmt-> bindParam (':birth', $date_naissance, PDO::PARAM_STR);
      $stmt-> bindParam (':sex', $sexe, PDO::PARAM_STR);
      $stmt-> bindParam (':commune', $commune, PDO::PARAM_STR);
      $stmt-> bindParam (':post_1', $poste_1, PDO::PARAM_STR);
      $stmt-> bindParam (':post_2', $poste_2, PDO::PARAM_STR);

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
						<label>Nom <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="firstname" placeholder="Entrez votre nom" />
					</div>
					<div class="form-group">
						<label>Postnom <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="lastname" placeholder="Entrez votre postnom" />
					</div>
					<div class="form-group">
						<label>Prénom <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="surname" placeholder="Entrez votre prénom" />
					</div>
					<div class="form-group">
						<label>Téléphone <span class="text-danger">*</span></label>
						<input type="tel" class="form-control" required name="phone" placeholder="Exemple: 0828584688" />
					</div>
					<div class="form-group">
						<label>Age<span class="text-danger">*</span></label>
						<input type="tel" class="form-control" required name="birth" placeholder="Quel est votre âge?" />
					</div>
					<div class="form-group">
						<label>E-mail <span class="text-danger">(Pas obligatoire)</span></label>
						<input type="email" class="form-control" required name="mail"  />
					</div>
					<div class="form-group">
						<label class="control-label">Sexe <span class="text-danger">*</span></label>
							<select class="form-control" name="sex" required>
                                <option value="F">Féminin</option>
                                <option value="M">Masculin</option>
                            </select>
					</div>
					<div class="form-group">
						<label class="control-label">Commune <span class="text-danger">*</span></label>
							<select class="form-control" name="commune" required>
                                <option value="BANDALUNGWA">BANDALUNGWA</option>
                                <option value="BARUMBU">BARUMBU</option>
                                <option value="BUMBU">BUMBU</option>
                                <option value="GOMBE">GOMBE</option>
                                <option value="KALAMU">KALAMU</option>
                                <option value="KASA-VUBU">KASA-VUBU</option>
                                <option value="KIMBANSEKE">KIMBANSEKE</option>
                                <option value="KINSHASA">KINSHASA</option>
                                <option value="KINTAMBO">KINTAMBO</option>
                                <option value="KISENSO">KISENSO</option>
                                <option value="LEMBA">LEMBA</option>
                                <option value="LIMETE">LIMETE</option>
                                <option value="LINGWALA">LINGWALA</option>
                                <option value="MAKALA">MAKALA</option>
                                <option value="MALUKU">MALUKU</option>
                                <option value="MASINA">MASINA</option>
                                <option value="MATETE">MATETE</option>
                                <option value="MONT-NGAFULA">MONT-NGAFULA</option>
                                <option value="NDJILI">NDJILI</option>
                                <option value="NGABA">NGABA</option>
                                <option value="NGALIEMA">NGALIEMA</option>
                                <option value="NGIRI-NGIRI">NGIRI-NGIRI</option>
                                <option value="NSELE">NSELE</option>
                                <option value="SELEMBAO">SELEMBAO</option>  
                              </select>
					</div>
					<div class="form-group">
						<label>Poste 1 <span class="text-danger">*</span></label>
						<input type="tel" class="form-control" required name="post_1" placeholder="Entrez votre prémier poste" />
					</div>
					<div class="form-group">
						<label>Poste 2 <span class="text-danger">*</span></label>
						<input type="tel" class="form-control" required name="post_2"  placeholder="Entrez votre deuxième poste" />
					</div>
					<div class="row">
                        <div class="col-sm-12">
                          <button type="submit"  class="btn btn-primary">Je mets à jour mon profil</button>
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