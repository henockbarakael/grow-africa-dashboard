<?php 
error_reporting(-1); // maximum errors
ini_set('display_errors', '1'); // show on screen
require_once 'core/init.php';
if (Session::exists('home')) {
  echo Session::flash('home');
}
$user = new User();
$_SESSION['isActivePage'] = 'Login';
$_SESSION['page_actuel'] = 'DASHBOARD LOGIN';
if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'code' => array(
        'required' => true,
        'min' => 9,
        'max' => 9  
    )));
      if ($validation->passed()) { 
        $remember = (Input::get('remember') === 'on') ? true : false;
        $login = $user->login(Input::get('code'), $remember);
          if ($login) {
            if (($user->data()->niveau == 0 || $user->data()->niveau > 0) && $user->data()->code == 'frmclinic'){
                Redirect::to('frmkclinic.php');
            } else if (($user->data()->niveau > 0 || $user->data()->niveau == 0) && $user->data()->code != 'frmclinic' && $user->data()->poste_1 == ''){
                Redirect::to('profile.php');
            }
            else if (($user->data()->niveau > 0 || $user->data()->niveau == 0) && $user->data()->code != 'frmclinic' && $user->data()->poste_1 != ''){
              Redirect::to('thanks.php');
          }
          } else {
            $failed_login = 'true';
          }
      }
  }
}
?>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title>Grow Africa | Login</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/css/app.min.css" rel="stylesheet" />

</head>
<body>

<div id="app" class="app app-full-height app-without-header">

<div class="login">

<div class="login-cover"></div>


<div class="login-content">

<div class="login-brand">
<a href="#"><b>Grow Africa</b>Foundation</a>
</div>

<h3 class="m-b-20"><span>S'identifier</span></h3>

<div class="login-desc m-b-30">
Pour votre protection, veuillez garder secret votre code.
</div>
<?php 
        if (isset($validation)) {
          if (!$validation->passed()) {
            foreach ($validation->errors() as $error) {
      ?>
      <p class="alert alert-error" style="text-align:center;"><?php echo $error."<br>";?> </p>
      <?php 
          }
        } else {
                if (isset($failed_login) && !empty($failed_login)){
      ?>
         <p class="alert alert-danger" style="text-align:center;"><?php echo "Nous sommes désolés, votre candidature n'a pas été retenue.";?></p>

      <?php
          }
      }
  } 
?>
<form action="" method="POST" autocomplete="off">
<div class="form-group">
<label>Code d'identification <span class="text-danger">*</span></label>
<input type="password" class="form-control" name="code" value="" />
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</div>
<div class="m-b-30">
</div>
<div class="d-flex align-items-center">
<button type="submit" class="btn btn-primary width-150 btn-rounded">Connexion</button>
<a href="#" class="m-l-10">Code oublié?</a>
</div>
<div class="m-b-30">
</div>
<!--<div class="d-flex align-items-center">
<button type="" class="btn btn-danger width-350 btn-rounded">J'étais retenu mais mon code de ne passe pas</button>
</div>-->
</form>
</div>

</div>


<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>


<div class="theme-panel">
<a href="#" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
<div class="theme-panel-content">
<div class="widget-list mb-0">
<div class="widget-list-item">
<div class="widget-list-content">
<div>Color Theme</div>
<div class="theme-list row">
<div class="theme-list-item active"><a href="#" class="bg-silver" data-theme="" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default (Silver)"></a></div>
<div class="theme-list-item"><a href="#" class="bg-red" data-theme="app-theme-red" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red"></a></div>
<div class="theme-list-item"><a href="#" class="bg-pink" data-theme="app-theme-pink" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink"></a></div>
<div class="theme-list-item"><a href="#" class="bg-orange" data-theme="app-theme-orange" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange"></a></div>
<div class="theme-list-item"><a href="#" class="bg-yellow" data-theme="app-theme-yellow" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow"></a></div>
<div class="theme-list-item"><a href="#" class="bg-green" data-theme="app-theme-green" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green"></a></div>
<div class="theme-list-item"><a href="#" class="bg-cyan" data-theme="app-theme-cyan" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua"></a></div>
<div class="theme-list-item"><a href="#" class="bg-blue" data-theme="app-theme-blue" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue"></a></div>
<div class="theme-list-item"><a href="#" class="bg-purple" data-theme="app-theme-purple" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple"></a></div>
<div class="theme-list-item"><a href="#" class="bg-indigo" data-theme="app-theme-indigo" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo"></a></div>
<div class="theme-list-item"><a href="#" class="bg-black" data-theme="app-theme-black" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black"></a></div>
</div>
</div>
</div>
<div class="widget-list-item">
<div class="widget-list-content">
<div>Gradient Theme</div>
<div class="theme-list row">
<div class="theme-list-item"><a href="#" class="bg-gradient-silver" data-theme="app-theme-gradient-silver" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default (Gradient Silver)"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-red" data-theme="app-theme-gradient-red" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Red"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-pink" data-theme="app-theme-gradient-pink" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Pink"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-orange" data-theme="app-theme-gradient-orange" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Orange"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-yellow" data-theme="app-theme-gradient-yellow" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Yellow"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-green" data-theme="app-theme-gradient-green" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Green"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-cyan" data-theme="app-theme-gradient-cyan" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Aqua"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-blue" data-theme="app-theme-gradient-blue" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Blue"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-purple" data-theme="app-theme-gradient-purple" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Purple"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-indigo" data-theme="app-theme-gradient-indigo" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Indigo"></a></div>
<div class="theme-list-item"><a href="#" class="bg-gradient-black" data-theme="app-theme-gradient-black" data-toggle="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Gradient Black"></a></div>
</div>
</div>
</div>
<div class="widget-list-item">
<div class="widget-list-content">
Fixed Sidebar
</div>
<div class="widget-list-action">
<div class="switcher switcher-success pull-left">
<input type="checkbox" name="sidebar_fixed" id="sidebar_fixed" value="1" checked />
<label for="sidebar_fixed"></label>
</div>
</div>
</div>
<div class="widget-list-item">
<div class="widget-list-content">
Light Sidebar
</div>
<div class="widget-list-action">
<div class="switcher switcher-success pull-left">
<input type="checkbox" name="sidebar_light" id="sidebar_light" value="1" />
<label for="sidebar_light"></label>
</div>
</div>
</div>
<div class="widget-list-item">
<div class="widget-list-content">
Fixed Header
</div>
<div class="widget-list-action">
<div class="switcher switcher-success pull-left">
<input type="checkbox" name="header_fixed" id="header_fixed" value="1" checked />
<label for="header_fixed"></label>
</div>
</div>
</div>
<div class="widget-list-item">
<div class="widget-list-content">
Dark Header
</div>
<div class="widget-list-action">
<div class="switcher switcher-success pull-left">
<input type="checkbox" name="header_dark" id="header_dark" value="1" />
<label for="header_dark"></label>
</div>
</div>
</div>
<div class="widget-list-item">
<div class="widget-list-content">
<a href="#" class="btn btn-silver btn-block btn-rounded btn-sm" data-click="reset-theme-setting">Reset Setting</a>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/app.min.js" type="0e95b5d16a931adc7780a4dc-text/javascript"></script>

<script type="0e95b5d16a931adc7780a4dc-text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="0e95b5d16a931adc7780a4dc-|49" defer=""></script></body>

<!-- Mirrored from seantheme.com/admetro/page_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:07:35 GMT -->
</html>