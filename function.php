<?php

/*--------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
FONCTION => Exemple de génération de trans_id basé sur un compteur.
Trans_id est un identifiant de transaction qui doit être:
		- unique sur une même journée
		- compris entre 000000 et 899999
		- de longueur 6 ( 6 caractères )
---------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------*/

function get_Trans_id() {
// Dans cet exemple la valeur du compteur est stocké dans un fichier count.txt,incrémenté de 1 et remis à zéro si la valeur est superieure à 899999
// ouverture/lock 
$filename = "./compteur/count.txt";// il faut ici indiquer le chemin du fichier.
$fp = fopen($filename, 'r+');
flock($fp, LOCK_EX);

// lecture/incrémentation
$count = (int)fread($fp, 6);    // (int) = conversion en entier.
$count++;
if($count < 0 || $count > 899999) {
    $count = 0;
}

// on revient au début du fichier
fseek($fp, 0);
ftruncate($fp,0);

// écriture/fermeture/Fin du lock
fwrite($fp, $count);
flock($fp, LOCK_UN);
fclose($fp);

// le trans_id : on rajoute des 0 au début si nécessaire
$trans_id = sprintf("%06d",$count);
return($trans_id);
}

// -------------------------------------------------------------------------------------------------------------------

/*--------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
FONCTION => CALCUL DE LA SIGNATURE
---------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------*/
function get_Signature($field,$key) {

ksort($field); // tri des paramétres par ordre alphabétique
$contenu_signature = "";
foreach ($field as $nom => $valeur)
{
	if(substr($nom,0,5) == 'vads_') {
	$contenu_signature .= $valeur."+";
	}
}
$contenu_signature .= $key;	// On ajoute le certificat à la fin de la chaîne.
$signature = sha1($contenu_signature);
return($signature);

}

//--------------------------------------------------------------------------------------------------------------------


/*--------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
FONCTION => CONTROLE DE LA SIGNATURE RECUE
---------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------*/
function Check_Signature($field,$key) {
$result='false';

$signature=get_Signature($field,$key);

if(isset($field['signature']) && ($signature == $field['signature']))
{
	$result='true';
	
}
return ($result);
}

//--------------------------------------------------------------------------------------------------------------------


/*--------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
FONCTION => GENERATION DU TABLEAU DE TOUS LES CHAMPS A ENVOYER A LA PLATEFORME
Les champs doivent être encodés en UTF8 obligatoirement- Seul les champs commençant par vads_xxxx sont envoyés.
---------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------*/
function get_formHtml_request($field, $lang) {

// version pack 1.0f
$params['vads_contrib']='Pack_PSP_1.0f';

include($lang.'.php');
	$conf_txt = parse_ini_file("conf.txt");
	if ($conf_txt['vads_ctx_mode'] == "TEST") $conf_txt['key'] = $conf_txt['TEST_key'];
	if ($conf_txt['vads_ctx_mode'] == "PRODUCTION") $conf_txt['key'] = $conf_txt['PROD_key'];
// Affichage d'une erreur si conf.txt n'est pas configuré
	$error = false;
	if ($conf_txt['vads_site_id'] == "11111111") $error = true;
	if ($conf_txt['vads_site_id'] == "") $error = true;
	if ($conf_txt['key'] == "2222222222222222") $error = true;
	if ($conf_txt['key'] == "3333333333333333") $error = true;
	if ($conf_txt['key'] == "") $error = true;
	if ($conf_txt['vads_url_return'] == "") $error = true;
	if ($error == true) return ('
<div id="Info">
	'.$ERREUR_DE_CONFIGURATION_para.'
</div>');

	foreach ($conf_txt as $conf_field => $conf_value) $field[$conf_field] = $conf_value;

	$params=array();
	foreach ($field as $nom => $valeur){
		if(substr($nom,0,5) == 'vads_') {
				$params[$nom]=$valeur;
		}
	}

	if (isset($field['vads_trans_id'])) $params['vads_trans_id'] = $field['vads_trans_id'];
	else $params['vads_trans_id'] = get_Trans_id();
	if (isset($field['vads_trans_date'])) $params['vads_trans_date'] = $field['vads_trans_date'];
	else $params['vads_trans_date'] = gmdate ("YmdHis", time());
	if (isset($field['signature'])) $params['signature'] = $field['signature'];
	else $params['signature'] = get_Signature($params, $conf_txt['key']);
	
	$_REQUEST['vads_trans_id'] = $params['vads_trans_id'];
	$_REQUEST['vads_trans_date'] = $params['vads_trans_date'];
	$_REQUEST['signature'] = $params['signature'];


	
	$form= '<form name="pay_form" method="POST" action="https://secure.payzen.eu/vads-payment/">';
	if ($conf_txt['debug'] == 1) $form.= '<div id="Info"><p><b><u>'.$POUR_INFORMATION_VOICI_LES_CHAMPS.'</u></b></p>'; // Affichage des champs si debug = ON
	
	if (ksort($params)) foreach ($params as $nom => $valeur) {
			if ($conf_txt['debug'] == 1) $form.= $nom.' : '.$valeur.'<br/>'; // Affichage des champs si debug = ON
			$form.='<input type="hidden" name="' . $nom . '" value="' . $valeur . '" />';	
	}
	if ($conf_txt['debug'] == 1) $form.='
		<button type="submit" class="validationButton" >
		<span><em>'.$PAYER.'</em></span>
		</button></div></form><div id="Info">'.$REMARQUE_REDIRECTION_debug.'</div>'; // Affichage du boutton si debug = ON
		
	else $form.='
	</div></form>
	
	<div id="Info">
		'.$REMARQUE_REDIRECTION.'
	</div>';
	
	if ($conf_txt['debug'] != 1) $form.='
	<script language="JavaScript">
		document.pay_form.submit();
	</script>'; // Redirection vers la page de paiement si debug = OFF

	return($form);

}
//----------------------------------------------------------------------------------------------------------------------
//Affichage formulaire
// ---------------------------------------------------------------------------------------------------------------------
function display_form($lang,$form) {


include ($lang.'.php');
$display_f = '<html>';
$display_f.= '<head>';
$display_f.= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

$display_f.= '<title>'.$Redirection_vers_la_plateforme.'</title>';
$display_f.= '<link href="style.css" rel="stylesheet" type="text/css"/>';
$display_f.= '</head>';
$display_f.= '<body>';
$display_f.= '<div id="container">';
$display_f.= '	<div id="Title_information">';
$display_f.= '		<form name="lang" method="post" action="form_payment.php"> ';

// Selection de la langue
		// Selection de la langue
		if ($lang == "en") {
		$display_f.= '<input class="logo_PSP" type="image" name="fr" src="img/francais.png">';
		$display_f.= '<input type="hidden" name="lang" value="fr">';
		}
		else {$display_f.= '<input class="logo_PSP" type="image" name="en" src="img/anglais.png">';
		$display_f.= '<input type="hidden" name="lang" value="en">';
		}
		
		$display_f.= '<input type="hidden" name="vads_amount" value="'.$_REQUEST['vads_amount'].'">';
		$display_f.= '<input type="hidden" name="vads_order_id" value="'.$_REQUEST['vads_order_id'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_id" value="'.$_REQUEST['vads_cust_id'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_name" value="'.$_REQUEST['vads_cust_name'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_address" value="'.$_REQUEST['vads_cust_address'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_zip" value="'.$_REQUEST['vads_cust_zip'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_city" value="'.$_REQUEST['vads_cust_city'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_country" value="'.$_REQUEST['vads_cust_country'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_phone" value="'.$_REQUEST['vads_cust_phone'].'">';
		$display_f.= '<input type="hidden" name="vads_cust_email" value="'.$_REQUEST['vads_cust_email'].'">';														
		
			

$display_f.= '</form>';
$display_f.= '<img class="logo_PSP" src="./img/psp.png" alt="Logo PSP"/>';
$display_f.= '<div class="header_title" >'.$TITRE_EXEMPLE_D_IMPLEMENTATION.'<br/><br/>'. $TITRE_FORM_PAIEMENT.'</div>';
$display_f.= '</div>';
	
$display_f.= '<a href="index.php?lang='.$lang.'">'.$Formulaire_de_paiement.' </a>|<a href="return.php?lang='.$lang.'">'.$Analyse_du_retour.'</a>';
$display_f.= '	<hr>';	
$display_f.=$form;
$display_f.='</div>';
$display_f.='</body>';
$display_f.='</html> ';
 
return($display_f);
}
?>