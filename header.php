<!doctype html>
<html class="no-js" lang="fr">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<!-- Don't forget the title -->
		<title><?php wp_title(''); ?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Place favicon.ico and appletouch icon in the root directory -->

		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link rel="icon" href="http://condipub.simplon-roubaix.com/wp-content/uploads/2016/08/favicon.ico">

		<!-- CSS links -->
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css"/>
		<?php wp_enqueue_script('jquery'); ?>

	<?php wp_head(); ?>


	</head>


		<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?> 

		<!--[if lt IE 8]>
	  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	  <![endif]-->




	  <!-- ##################
	   HEADER
	   ####################-->




	   <header>
		   <nav id='cssmenu' style="font-family:'Kessel 105 bold';">


			   <div id="head-mobile"></div>
			   <div class="button"></div>

<?php

$defaults = array(
	'container' => false,
	'theme_location' => 'primary-menu',
	'menu_class' => 'navlist'
);

wp_nav_menu( $defaults );

?>

			   <!-- <ul class="bold navlist">
				   <li class='active' id="topmenuList"><a href='#'>LE LIEU</a></li>
				   <li><a href='article.html'>VOUS ÊTES</a></li>
				   <li><a href='article.html'>LE PROGRAMME</a></li>
				   <li><a href='article.html'>BILLETTERIE</a></li>
				   <li><a href='article.html'>NEWSLETTER</a></li>
				   <li><a href='article.html'>INFOS PRATIQUES</a>
					   <ul>
						   <li><a href='article.html'>VENIR</a></li>
						   <li><a href='article.html'>HORAIRES</a></li>
						   <li><a href='article.html'>ACCESSIBILITÉ</a></li>
						   <li><a href='article.html'>CONTACT</a></li>
					   </ul>
				   </li>
				</ul> -->



		   </nav>




	   </header>
		 <div class="socialnav">
					<a href="https://www.facebook.com/LaConditionPublique/" target="blank"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/facebook.png" class="face social"></a>
					 <a href="https://twitter.com/LaCPublique" target="blank"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/twitter.png" class="twit social" target="blank"></a>
					 <a href="https://www.youtube.com/results?search_query=condition+publique" target="blank"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/youtube.png" class="youtube social"></a>
					<a href="https://www.instagram.com/la_condition_publique/" target="blank"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/insta.png" class="insta social"></a>
					 <a href="https://fr.pinterest.com/lacondition/" target="blank"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/pinterest.png" class="pint social"></a>

		 </div>


	   <!-- ##################
	    /SOCIAL ICONS
	    ####################-->



	     <!-- ##################
	      /HEADER
	      ####################-->

