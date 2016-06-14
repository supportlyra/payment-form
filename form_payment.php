<?php
include ("function.php");


/* --------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
CREATION DU FORMULAIRE DE PAIEMENT 
Le formulaire de paiement est composé de l'ensemble des champs vads_xxxxx contenu dans le tableau $params 
Celui-ci est envoyé à la plateforme de paiement à l'url suivante :https://secure.payzen.eu/vads-payment/

---------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------- */

// Selection de la langue
$array_lang = array('en','fr');
$lang=(isset($_REQUEST['lang']))? $_REQUEST['lang']  :'fr';
if (!in_array($lang,$array_lang)) {
	$lang="fr";
	
}
include($lang.'.php');

// CREATION DU FORMULAIRE DE PAIEMENT  encodé en UTF8
$form = get_formHtml_request($_REQUEST, $lang); 

// REDIRECTION AUTOMATIQUE VERS PLATEFORME DE PAIEMENT SI DEBUG DESACTIVE
// AFFICHAGE ET CONFIRMATION DU FORMULAIRE DE PAIEMENT AVANT REDIRECTION SI DEBUG ACTIVE
$conf_txt = parse_ini_file("conf.txt");
if ($conf_txt['debug'] == 0){
echo $form;
}
else{ 
echo (display_form($lang,$form));
}
?>


