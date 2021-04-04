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
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/admetro/page_coming_soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:07:31 GMT -->
<head>
<meta charset="utf-8" />
<title>Grow Africa | Mise à jour réussi</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/css/app.min.css" rel="stylesheet" />


<link href="assets/plugins/kbw-countdown/dist/css/jquery.countdown.css" rel="stylesheet" />

</head>
<body>

<div id="app" class="app app-full-height app-without-header">

<div class="coming-soon">

<div class="coming-soon-cover"></div>


<div class="coming-soon-content">
<h1>Félicitations <?php echo $user->data()->nom." ".$user->data()->prenom; ?>! </h1>
<p>Pour des raisons de sécurité, nous avons verrouillé votre compte afin de ne pas permettre aux gens mal intentionnés de pirater votre compte</p>
<p>Votre compte sera opérationnel dans : </p>
<div class="coming-soon-timer">
    <div id="timer" class="is-countdown">

    </div>
</div>
<p>L'équipe TOTOMBOLA NDEMBO vous remerçie.<br /> Bonne chance pour la suite!</p>
</div>


<div class="coming-soon-footer">
<div class="social-list">
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-google"></i></a>
<a href="#"><i class="fab fa-github"></i></a>
</div>
<div class="coming-soon-copyright">&copy; 2021 Grow Africa Foundation Tous droits réservés</div>
</div>

</div>


<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Marc 27, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("timer").innerHTML = days + " Jours " + hours + " Heures "
  + minutes + " Minutes " + seconds + " Seconde ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<script src="assets/js/app.min.js" type="95b01f927353ed208ee0d0a1-text/javascript"></script>


<script src="assets/plugins/kbw-countdown/dist/js/jquery.plugin.js" type="95b01f927353ed208ee0d0a1-text/javascript"></script>
<script src="assets/plugins/kbw-countdown/dist/js/jquery.countdown.js" type="95b01f927353ed208ee0d0a1-text/javascript"></script>
<script src="assets/js/demo/page-coming-soon.demo.js" type="95b01f927353ed208ee0d0a1-text/javascript"></script>

<script type="95b01f927353ed208ee0d0a1-text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="95b01f927353ed208ee0d0a1-|49" defer=""></script></body>

<!-- Mirrored from seantheme.com/admetro/page_coming_soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Mar 2021 07:07:34 GMT -->
</html>