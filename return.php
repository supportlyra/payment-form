<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
// Selection de la langue
$array_lang = array('en','fr');
$lang=(isset($_REQUEST['lang']))? $_REQUEST['lang']  :'fr';
if (!in_array($lang,$array_lang)) {
	$lang="fr";
	
}
include($lang.'.php');
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Demo_Payment</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<body >
<div id="container">
	
	<div id="Title_information">
		<form name="lang" method="post" action="return.php"> 
<?php
// Selection de la langue
		if ($lang == "en") {
		echo '<input class="logo_PSP" type="image" name="fr" src="img/francais.png">';
		echo '<input type="hidden" name="lang" value="fr">';
		}
		else {echo '<input class="logo_PSP" type="image" name="en" src="img/anglais.png">';
		echo '<input type="hidden" name="lang" value="en">';
		}
?>
		</form>
		<img class="logo_PSP" src="./img/psp.png" alt="Logo PSP"/>
		<div class="header_title" ><?php echo $TITRE_EXEMPLE_D_IMPLEMENTATION ?> <br/><br/><?php echo $TITRE_FORM_PAIEMENT ?></div>
	</div>
	
	<a href="index.php?lang=<?php echo $lang ?>"><?php echo $Formulaire_de_paiement ?> </a>|<a href="return.php?lang=<?php echo $lang ?>"> <?php echo $Analyse_du_retour ?></a>
	<hr>
	<div id="Info">
		<p><u><b><?php echo $ANALYSE_DU_PAIEMENT ?></u></b></p>
		<p class="subtitle"><?php echo $URL_SERVEUR ?></p>
		<p><?php echo $URL_SERVEUR_para ?></p>
		<p><?php echo $Le_support_vous_invite ?></p>		
		
		<p class="subtitle"><?php echo $Fichier_return_payment ?></p>
		<p><?php echo $Fichier_return_payment_para ?></p>
		<p><?php echo $Le_support_vous_invite ?></p>
		
		<p class="subtitle"><?php echo $URLs_de_retour ?></p>
		<p><?php echo $URLs_de_retour_para ?></p>
		<p><?php echo $Le_support_vous_invite ?></p>
		</div>	
		
	<hr>	
		
</div>