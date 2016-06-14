<?php
include ("function.php");


// Selection de la langue
$array_lang = array('en','fr');
$lang=(isset($_REQUEST['lang']))? $_REQUEST['lang']  :'fr';
if (!in_array($lang,$array_lang)) {
	$lang="fr";
	
}
include($lang.'.php');

echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>'.$Redirection_vers_la_boutique.'</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="container">
	<div id="Title_information">
		<form name="lang" method="post" action="return_payment.php">';
// Selection de la langue
		if ($lang == "en") {
		echo '<input class="logo_PSP" type="image" name="fr" src="img/francais.png">';
		echo '<input type="hidden" name="lang" value="fr">';
		}
		else {echo '<input class="logo_PSP" type="image" name="en" src="img/anglais.png">';
		echo '<input type="hidden" name="lang" value="en">';
		}
		foreach ($_REQUEST as $nom => $valeur) if ($nom == "lang") echo '<input type="hidden" name="lang" value="'.$lang.'">';
		else echo '<input type="hidden" name="'.$nom.'" value="'.$valeur.'">';
echo '	</form>
		<img class="logo_PSP" src="./img/psp.png" alt="Logo PSP"/>
<div class="header_title" >'.$TITRE_EXEMPLE_D_IMPLEMENTATION.'<br/><br/>'.$TITRE_FORM_PAIEMENT.'</div>
	</div>
	
	<a href="index.php?lang='.$lang.'">'.$Formulaire_de_paiement.' </a>|<a href="return.php?lang='.$lang.'"> '.$Analyse_du_retour.'</a>
	<hr>	
	<div id="Info">
		<b><u>';

// --------------------------------------------------------------------------------------
// RENSEIGNER LA VALEUR DU CERTIFICAT
// --------------------------------------------------------------------------------------

$conf_txt = parse_ini_file("conf.txt");
if ($conf_txt['vads_ctx_mode'] == "TEST") $key = $conf_txt['TEST_key'];
if ($conf_txt['vads_ctx_mode'] == "PRODUCTION") $key = $conf_txt['PROD_key'];

// --------------------------------------------------------------------------------------
// CONTROLE DE LA SIGNATURE RECUE
// --------------------------------------------------------------------------------------

$control = Check_Signature($_REQUEST, $key);
if($control == 'true') echo $Signature_Valide." <br/><br/>";
else echo $Signature_Invalide."<br/><br/>";

// -----------------------------------------------------------------------------------------------------------
/* Affichage des principales caratéristiques

  Statut : vads_trans_status
  Résultat : vads_result
  Identifiant : vads_trans_id
  Montant : vads_amount
  Montant  Effectif : vads_effective_amount
  Type de paiement : vads_payment_config
  Numéro de séquence : vads_sequence_number
  Résultat d’autorisation : vads_auth_result
  Garantie de paiement : vads_warranty_result
  Statut 3DS : vads_threeds_status
*/// -----------------------------------------------------------------------------------------------------------

echo $La_transaction_est_un_débit.":</b></u><br/><br/>";

if (isset($_REQUEST['vads_trans_status'])) echo "<b>".$STATUT."</b> (vads_trans_status): ".$_REQUEST['vads_trans_status']."<br/>";
if (isset($_REQUEST['vads_trans_status'])) switch ($_REQUEST['vads_trans_status']) {
	case "ABANDONED":
		echo $Le_paiement_a_ete_abandonne;
		break;
	case "AUTHORISED":
		echo $Le_paiement_a_ete_accepte;
		break;
	case "REFUSED":
		echo $Le_paiement_a_ete_refuse;
		break;
	case "AUTHORISED_TO_VALIDATE":
		echo $La_transaction_est_en_attente_de_validation_manuelle;
		break;
	case "WAITING_AUTHORISATION":
		echo $La_transaction_est_en_attente_d_autorisation;
		break;
	case "EXPIRED":
		echo $La_transaction_est_expiree;
		break;
	case "CANCELLED":
		echo $La_transaction_a_ete_annulee;
		break;
	case "WAITING_AUTHORISATION_TO_VALIDATE":
		echo $La_transaction_est_en_attente_d_auto_et_de_valid;
		break;
	case "CAPTURED":
		echo $La_transaction_a_ete_remise_en_banque;
		break;
}

if (isset($_REQUEST['vads_result'])) echo "<br/><br/><b>".$RESULTAT."</b> (vads_result): ".$_REQUEST['vads_result']."<br/>";
if (isset($_REQUEST['vads_result'])) switch ($_REQUEST['vads_result']) {
	case "00":
		echo $Paiement_realise_avec_succes;
		break;
	case "02":
		echo $Le_commercant_doit_contacter_la_banque_du_porteur;
		break;
	case "05":
		echo $Paiement_refuse;
		break;
	case "05":
		echo $Annule_par_le_client;
		break;
	case "30":
		echo $Erreur_de_format;
		break;
	case "96":
		echo $Erreur_technique;
		break;
}

if (isset($_REQUEST['vads_trans_id'])) echo "<br/><br/><b>".$IDENTIFIANT."</b> (vads_trans_id): ".$_REQUEST['vads_trans_id'];

if (isset($_REQUEST['vads_amount'])) echo "<br/><br/><b>".$MONTANT."</b> (vads_amount): ".$_REQUEST['vads_amount'];

if (isset($_REQUEST['vads_effective_amount'])) echo "<br/><br/><b>".$MONTANT_EFFECTIF."</b> (vads_effective_amount): ".$_REQUEST['vads_effective_amount'];

if (isset($_REQUEST['vads_payment_config'])) echo "<br/><br/><b>".$TYPE_DE_PAIEMENT."</b> (vads_payment_config): ".$_REQUEST['vads_payment_config']."<br/>";
if (isset($_REQUEST['vads_payment_config'])) switch ($_REQUEST['vads_payment_config']) {
	case "SINGLE":
		echo $Paiement_simple;
		break;
}

if (isset($_REQUEST['vads_sequence_number'])) echo "<br/><br/><b>".$NUMERO_DE_SEQUENCE."</b> (vads_sequence_number): ".$_REQUEST['vads_sequence_number'];

if (isset($_REQUEST['vads_auth_result'])) echo "<br/><br/><b>".$RESULTAT_D_AUTO."</b> (vads_auth_result): ".$_REQUEST['vads_auth_result']."<br/>";
if (isset($_REQUEST['vads_auth_result'])) switch ($_REQUEST['vads_auth_result']) {
	case 00:
		echo $Transaction_approuvee;
		break;
	case 02:
		echo $Contacter_l_emetteur;
		break;
	case 03:
		echo $Accepteur_invalide;
		break;
	case 04:
		echo $Conserver_la_carte;
		break;
	case 05:
		echo $Ne_pas_honorer;
		break;
	case 07:
		echo $Conserver_la_carte_special;
		break;
	case 08:
		echo $Approuver_apres_identification;
		break;
	case 12:
		echo $Transaction_invalide;
		break;
	case 13:
		echo $Montant_invalide;
		break;
	case 14:
		echo $Numero_de_porteur_invalide;
		break;
	case 30:
		echo $Erreur_de_format;
		break;
	case 31:
		echo $Identifiant_de_l_organisme;
		break;
	case 33:
		echo $Date_de_validite_depassee;
		break;
	case 34:
		echo $Suspicion_de_fraude;
		break;
	case 41:
		echo $Carte_perdue;
		break;
	case 43:
		echo $Carte_volee;
		break;
	case 51:
		echo $Provision_insuffisante;
		break;
	case 54:
		echo $Date_de_validite_depassee;
		break;
	case 56:
		echo $Carte_absente;
		break;
	case 57:
		echo $Transaction_non_permise;
		break;
	case 58:
		echo $Transaction_interdite;
		break;
	case 59:
		echo $Suspicion_de_fraude;
		break;
	case 60:
		echo $L_accepteur_doit_contacter;
		break;
	case 61:
		echo $Montant_de_retrait_hors_limite;
		break;
	case 63:
		echo $Regles_de_securite_non_respectees;
		break;
	case 68:
		echo $Reponse_non_parvenue;
		break;
	case 90:
		echo $Arret_momentane;
		break;
	case 91:
		echo $Emetteur_inaccessible;
		break;
	case 96:
		echo $Mauvais_fonctionnement;
		break;
	case 94:
		echo $Transaction_dupliquee;
		break;
	case 97:
		echo $Echeance_de_la_tempo;
		break;
	case 98:
		echo $Serveur_indisponible;
		break;
	case 99:
		echo $Incident_domaine_initiateur;
		break;
}


if (isset($_REQUEST['vads_warranty_result'])) echo "<br/><br/><b>".$GARANTIE_DE_PAIEMENT."</b> (vads_warranty_result): ".$_REQUEST['vads_warranty_result']."<br/>";
if (isset($_REQUEST['vads_warranty_result'])) switch ($_REQUEST['vads_warranty_result']) {
	case "YES":
		echo $Le_paiement_est_garanti;
		break;
	case "NO":
		echo $Le_paiement_n_est_pas_garanti;
		break;
	case "UNKNOWN":
		echo $Suite_a_une_erreur;
		break;
	default:
		echo $Garantie_non_applicable;
		break;
}

if (isset($_REQUEST['vads_threeds_status'])) echo "<br/><br/><b>".$STATUT_3DS."</b> (vads_threeds_status): ".$_REQUEST['vads_threeds_status']."<br/>";
if (isset($_REQUEST['vads_threeds_status'])) switch ($_REQUEST['vads_threeds_status']) {
	case "Y":
		echo $Authentifie_3DS;
		break;
	case "N":
		echo $Erreur_Authentification;
		break;
	case "U":
		echo $Authentification_impossible;
		break;
	case "A":
		echo $Essai_d_authentification;
		break;
	default:
		echo $Non_renseigne;
		break;
}

if (isset($_REQUEST['vads_capture_delay'])) echo "<br/><br/><b>".$DELAI_AVANT_REMISE_EN_BANQUE."</b> (vads_capture_delay): ".$_REQUEST['vads_capture_delay']." ".$JOURS;

if (isset($_REQUEST['vads_validation_mode'])) echo "<br/><br/><b>".$MODE_DE_VALIDATION."</b> (vads_validation_mode): ".$_REQUEST['vads_validation_mode']."<br/>";
if (isset($_REQUEST['vads_validation_mode'])) switch ($_REQUEST['vads_validation_mode']) {
	case 1:
		echo $Validation_Manuelle;
		break;
	case 0:
		echo $Validation_Automatique;
		break;
	default:
		echo $Configuration_par_defaut_du_back_office_marchand;
		break;
}

// --------------------------------------------------------------------------------------
// Affichage des paramètres recus 
// --------------------------------------------------------------------------------------

echo "<br/><br/><b>".$Liste_des_parametres_receptionnes.":</b><br/>";
foreach ($_REQUEST as $nom => $valeur)
{
	if(substr($nom,0,5) == 'vads_')
	{
		echo "$nom = $valeur <br/>";	
	}
}

// --------------------------------------------------------------------------------------

echo '</div>
</div>
</body>
</html> 
';

?>
