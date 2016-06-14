<?php
/***********************
		index.php
***********************/

// Titres
$Demo_de_Paiement = "Payment Demo";
$TITRE_EXEMPLE_D_IMPLEMENTATION = "PAYZEN PAYMENT SOLUTION IMPLEMENTATION EXAMPLE";
$TITRE_FORM_PAIEMENT = "SINGLE PAYMENT FORM - PHP LANGUAGE - HTML - Version 1.0f";
$Formulaire_de_paiement = "Payment Form";
$Analyse_du_retour = "Return Analysis";

//INFORMATIONS
$INFORMATIONS = "INFORMATION";
$INFORMATION_para1 = "The payment uses the sending of a payment form to PAYZEN payment gateway URL. This form is created from the conf.txt file and the below fields.";
$Fichier_conf = "conf.txt file";
$INFORMATION_para2 = "Before the first use you have to fill the <b>vads_site_id</b>, <b>key</b> and <b>vads_url_return</b> fields of the <b>conf.txt</b> file. PAYZEN support recommends to read the conf.txt file. This file contains secure data. <b>This data securing is on your responsibility.</b>";
$Fichier_index = "index.php file";
$INFORMATION_para3 = "The \"index.php\" file sends these payment fields to the \"form_payment.php\" file which fetch these fields to create the payment request.";
$INFORMATION_para4 = "These fields are filled with examples, it is up to you to fill them depending on your context and configuration. Please make sure that the count.txt file rights are set in read and write mode in order that the script works properly.";
$INFORMATION_para5 = "<b>Some other fields are available, PAYZEN support recommends to read the payment form documentation</b> <a href=\"https://www.payzen.eu/support/integration-payzen\">Read the documentation.</a>";

//CHAMPS DU FORMULAIRE
$CHAMPS_DU_FORMULAIRE = "PAYMENT FORM FIELDS";
$Url_plateforme = "Payment gateway URL";
$En_rouge = "Mandatory fields appear in red";
$PARAMETRES_DE_LA_TRANSACTION = "TRANSACTION SETTINGS";
$Montant_de_la_commande = "Order amount set in the smallest currency unit. Cents for EURO. Ex: 1000 for 10 euros";
$PARAMETRES_CLIENT = "CLIENT SETTINGS";
$Numero_de_commande = "Order number. Optional setting. Length of field: 32 characters max - Alphanumeric Type";
$Numero_client = "Customer number. Optional setting. Length of field: 32 characters max - Alphanumeric Type";
$Nom_du_client = "Customer name. Optional setting. Length of field: 127 characters max - Alphanumeric Type";
$Adresse_du_client = "Customer address. Optional setting. Length of field: 255 characters max - Alphanumeric Type";
$Code_Postal_du_client = "Customer Postal Code. Optional setting. Length of field: 32 characters max - Alphanumeric Type";
$Ville_du_client = "Customer City. Optional setting. Length of field: 63 characters max - Alphanumeric Type";
$Pays_du_client = "Customer Country. Customer country code according to the ISO 3166 norm. Optional setting. Length of field: 2 characters max - Alphanumeric Type";
$Telephone_du_client = "Customer Phone Number. Optional setting. Length of field: 32 characters max - Alphanumeric Type";
$Email_du_client = "Customer Email. Optional setting.";
$Valider_et_envoyer_les_parametres = "Validate and send the settings <br/>by POST mode to the form_payment.php file";


/****************************
		form_payment.php
****************************/
$Redirection_vers_la_plateforme = "Payment gateway redirection";


/****************************
		function.php
****************************/
$ERREUR_DE_CONFIGURATION_para = "<p><b><u>CONFIGURATION ERROR!</u></b></p><p><b>The conf.txt file is not properly set. Please check your shop ID, your certificate and your return URL.</b></p>";
$POUR_INFORMATION_VOICI_LES_CHAMPS = "BELOW IS THE DATA WHICH WILL BE SENT TO THE GATEWAY";
$PAYER = "PAY => send the data to the payment gateway";
$REMARQUE_REDIRECTION_debug ="<p><b><u>NOTE:</u></b></p><p><b>In order to be redirected straight to the payment gateway, you need to change the debug value of the conf.txt file to OFF.</b></p>";
$REMARQUE_REDIRECTION ="<div style='border:1px solid black;width:600px;margin:150px auto;font-family: Arial;font-size:14px;color:black;text-align:center'>
				<div style='margin:30px 0 10px 0'>Redirection to the payment gateway</div>
				<div><img src='img/waiting.gif'alt='waiting' title='redirection in progress'></div>";

/******************************
		return_payment.php
*******************************/
$Redirection_vers_la_boutique = "Redirection to the shop";

$Signature_Valide = "Valid Signature";
$Signature_Invalide = "Invalid Signature - do not take this payment result in account";
$La_transaction_est_un_débit = "The transaction is a debit with the following details";

$STATUT = "Status";
$Le_paiement_a_ete_abandonne = "The payment was abandonned by the customer. The transaction was not created on the gateway and therefore is not visible on the merchant back office.";
$Le_paiement_a_ete_accepte = "The payment is accepted and is waiting to be cashed.";
$Le_paiement_a_ete_refuse = "The payment was refused.";
$La_transaction_est_en_attente_de_validation_manuelle = "The transaction is accepted but it is waiting to be manually validated. It is on the merchant responsability to validate the transaction in order that it can be cashed from the back office or by web service request. The transaction can be validated as long as the capture delay is not expired. If the delay expires the payment status change to Expired. This status is definitive.";
$La_transaction_est_en_attente_d_autorisation = "The transaction is waiting for an authorisation. During the payment, just an imprint was made because the capture delay is higher than 7 days. By default the auhorisation demand for the global amount will be made 2 days before the bank deposit date.";
$La_transaction_est_expiree = "The transaction expired. This status is definitive, the transaction will not be able to be cashed. A transaction expires when it was created in manual validation or when the capture delay is passed.";
$La_transaction_a_ete_annulee = "The payment was cancelled through the merchant back offfice or by a web service request. This status is definitive, the transaction will never be cashed.";
$La_transaction_est_en_attente_d_auto_et_de_valid = "The transaction is waiting for an authorisation and a manual validation. During the payment, just an imprint was made because the capture delay is higher than 7 days and the validation type is « manual validation ». This payment will be able to be cashed only after that the merchant validates it from the back office or by web service request.";
$La_transaction_a_ete_remise_en_banque = "The payment was cashed. This status is definitive.";

$RESULTAT = "Result";
$Paiement_realise_avec_succes = "Payment successfully completed.";
$Le_commercant_doit_contacter_la_banque_du_porteur = "The merchant must contact the holder’s bank.";
$Paiement_refuse = "Payment denied.";
$Annule_par_le_client = "Cancellation by customer.";
$Erreur_de_format = "Request format error. To be linked with the value of the vads_extra_result field.";
$Erreur_technique = "Technical error occurred during payment.";

$IDENTIFIANT = "ID";

$MONTANT = "Account";

$MONTANT_EFFECTIF = "Effective Account";

$TYPE_DE_PAIEMENT = "Payment Type";
$Paiement_simple = "Unique Payment.";

$NUMERO_DE_SEQUENCE = "Sequence Number";

$RESULTAT_D_AUTO = "Authorisation Result";
$Transaction_approuvee = "Transaction approved or successfully treated.";
$Contacter_l_emetteur = "Contact the card issuer.";
$Accepteur_invalide = "Invalid acceptor.";
$Conserver_la_carte = "Keep the card.";
$Ne_pas_honorer = "Do not honor.";
$Conserver_la_carte_special = "Keep the card, special conditions.";
$Approuver_apres_identification = "Approved after identification.";
$Transaction_invalide = "Invalid Transaction.";
$Montant_invalide = "Invalid Amount.";
$Numero_de_porteur_invalide = "Invalid holder number.";
$Erreur_de_format = "Format error.";
$Identifiant_de_l_organisme = "Unknown buying organization identifier.";
$Date_de_validite_depassee = "Expired card validity date.";
$Suspicion_de_fraude = "Fraud suspected.";
$Carte_perdue = "Lost card.";
$Carte_volee = "Stolen card.";
$Provision_insuffisante = "Insufficient provision or exceeds credit.";
$Carte_absente = "Card not in database.";
$Transaction_non_permise = "Transaction not allowed for this holder.";
$Transaction_interdite = "Transaction not allowed from this terminal.";
$Suspicion_de_fraude = "Fraud suspected.";
$L_accepteur_doit_contacter = "The card acceptor must contact buyer.";
$Montant_de_retrait_hors_limite = "Amount over withdrawal limits.";
$Regles_de_securite_non_respectees = "Does not abide to security rules.";
$Reponse_non_parvenue = "Response not received or received too late.";
$Arret_momentane = "System temporarily stopped.";
$Emetteur_inaccessible = "Inaccessible card issuer.";
$Mauvais_fonctionnement = "Duplicated transaction.";
$Transaction_dupliquee = "Faulty system.";
$Echeance_de_la_tempo = "Global surveillance time out expired.";
$Serveur_indisponible = "Unavailable server, repeat network routing requested.";
$Incident_domaine_initiateur = "Instigator domain incident.";

$GARANTIE_DE_PAIEMENT = "Payment Warranty";
$Le_paiement_est_garanti = "Payment is guaranteed.";
$Le_paiement_n_est_pas_garanti = "Payment is not guaranteed.";
$Suite_a_une_erreur = "Payment cannot be guaranteed, due to a technical error.";
$Garantie_non_applicable = "Payment guarantee not applicable.";

$STATUT_3DS = "Statut 3DS";
$Authentifie_3DS = "3DS Authentified .";
$Erreur_Authentification = "Authentification Error.";
$Authentification_impossible = "Authentification Impossible.";
$Essai_d_authentification = "Try to authenticate.";
$Non_renseigne = "Non valued.";

$DELAI_AVANT_REMISE_EN_BANQUE = "Capture delay";
$JOURS = "days";

$MODE_DE_VALIDATION = "Validation Mode";
$Validation_Manuelle = "Manual Validation";
$Validation_Automatique = "Automatic Validation";
$Configuration_par_defaut_du_back_office_marchand = "Default configuration of the merchant back office";

$Liste_des_parametres_receptionnes = "Received Data List";


/******************************
		return.php
*******************************/
$ANALYSE_DU_PAIEMENT = "PAYMENT ANALYSIS";

$URL_SERVEUR = "Instant Payment Notification";
$URL_SERVEUR_para = "When the payment is done, the gateway sends some parameters by POST mode to the server URL which analyzes the payment results. First you have to check the signature. If it is correct then you will be able to take the payment parameters into consideration.";

$Fichier_return_payment = "return_payment.php file";
$Fichier_return_payment_para = "In this package, the return_payment.php file controls the signature and analyzes the payment results. First the script checks the signature and then analyzes the main fields. It is up to you to adapt the code to your context.";

$URLs_de_retour = "Return URLs";
$URLs_de_retour_para = "When the customer comes back to the shop through one of the return URLs, the payment parameters are sent back depending on the vads_return_mode setting defined in the conf.txt file. Depending on the vads_return_mode setting, the parameters are sent by POST mode, GET mode or not at all.";

$Le_support_vous_invite ="<b>The PAYZEN support recommends to read the settings analysis documentation</b> <a href=\"https://www.payzen.eu/support/integration-payzen\">Consult the documentation</a>";
?>