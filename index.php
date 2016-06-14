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
<title><?php echo $Demo_de_Paiement ?></title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<body >

<div id="container">
	<div id="Title_information">
		<form name="lang" method="post" action="index.php"> 
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
		<p><b><u><?php echo $INFORMATIONS ?></u></b></p>
		<p><?php echo $INFORMATION_para1 ?></p>
		<p><b><u><?php echo $Fichier_conf ?></u></b></p>
		<p><?php echo $INFORMATION_para2 ?></p>
		<p><b><u><?php echo $Fichier_index ?></u></b></p>
		<p><?php echo $INFORMATION_para3 ?></p>
		<p><?php echo $INFORMATION_para4 ?></p>
		<p><?php echo $INFORMATION_para5 ?></p>
	</div>	
		
	<hr>
		
		<p><b><u><?php echo $CHAMPS_DU_FORMULAIRE ?></u></b></p>
		<p style="float:"left"><b><?php echo $Url_plateforme ?>: https://secure.payzen.eu/vads-payment/</b></p>
		<p style="color:red;"><b><?php echo $En_rouge ?></b></p>

		<form style="margin-top:10px;"method=POST action=form_payment.php >
					<input type="hidden" name="lang" value="<?php echo $lang ?>">
					<table cellspacing="1">

						<td colspan="3" class="title_array"><?php echo $PARAMETRES_DE_LA_TRANSACTION ?></td>
						</tr>				
						<tr>
							<td class="field_mandatory">vads_amount</td>
							<td><input type="text" name="vads_amount" value="1000"size=20></td>
							<td><?php echo $Montant_de_la_commande ?></td>
						</tr>					
					
						<tr> 
						<td colspan="3" class="title_array"><?php echo $PARAMETRES_CLIENT ?></td>
						</tr>
						
						<tr>
							<td>vads_order_id</td>
							<td><input type="text" name="vads_order_id" value="123456" size=20></td>
							<td><?php echo $Numero_de_commande ?></td>
						</tr>
						
						<tr>
							<td>vads_cust_id</td>
							<td><input type="text" name="vads_cust_id" value="2380" size=20></td>
							<td><?php echo $Numero_client ?></td>
						</tr>
						<tr>
							<td>vads_cust_name</td>
							<td><input type="text" name="vads_cust_name" value="Henri Durand" size=20></td>
							<td><?php echo $Nom_du_client ?></td>
						</tr>
						<tr>
							<td>vads_cust_address</td>
							<td><input type="text" name="vads_cust_address" value="Bd Paul Picot" size=20></td>
							<td><?php echo $Adresse_du_client ?></td>
						</tr>
						<tr>
							<td>vads_cust_zip</td>
							<td><input type="text" name="vads_cust_zip" value="83200" size=20></td>
							<td><?php echo $Code_Postal_du_client ?></td>
						</tr>
						<tr>
							<td>vads_cust_city</td>
							<td><input type="text" name="vads_cust_city" value="TOULON" size=20></td>
							<td><?php echo $Ville_du_client ?></td>
						</tr>
						<tr>
							<td>vads_cust_country</td>
							<td><input type="text" name="vads_cust_country" value="FR" size=20></td>
							<td><?php echo $Pays_du_client ?></td>
						</tr>
						<tr>
							<td>vads_cust_phone</td>
							<td><input type="text" name="vads_cust_phone" value="06002822672" size=20></td>
							<td><?php echo $Telephone_du_client ?></td>
						</tr>
						<tr>
							<td>vads_cust_email</td>
							<td><input type="text" name="vads_cust_email"  size=20></td>
							<td><?php echo $Email_du_client ?></td>
						</tr>

					</table>
					<button type="submit" class="validationButton" >
				<span><em><?php echo $Valider_et_envoyer_les_parametres ?></em></span>
				</button>
				</form>
	</div>
		
	