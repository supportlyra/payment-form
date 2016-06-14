<?php
/***********************
		index.php
***********************/
// Titres
$Demo_de_Paiement = "Demo de Paiement";
$TITRE_EXEMPLE_D_IMPLEMENTATION = "EXEMPLE D'IMPLEMENTATION DE LA SOLUTION DE PAIEMENT PAYZEN";
$TITRE_FORM_PAIEMENT = "FORMULAIRE DE PAIEMENT SIMPLE - LANGAGE PHP - HTML - Version du pack 1.0f";
$Formulaire_de_paiement = "Formulaire de paiement";
$Analyse_du_retour = "Analyse du retour";

//INFORMATIONS
$INFORMATIONS = "INFORMATIONS";
$INFORMATION_para1 = "Le paiement s'appuie sur l'envoi d'un formulaire de paiement en https vers l'URL de la plateforme de paiement PAYZEN. Ce formulaire est généré à partir du fichier conf.txt et des champs ci dessous.";
$Fichier_conf = "Fichier conf.txt";
$INFORMATION_para2 = "Avant la première utilisation vous devez impérativement renseigner les champs <b>vads_site_id</b>, <b>key</b> et <b>vads_url_return</b> du fichier <b>conf.txt</b>. Le support PAYZEN vous invite à lire le fichier conf.txt. Ce fichier comporte des données sensibles. <b>La sécurisation de ces données est de votre responsabilité.</b>";
$Fichier_index = "Fichier index.php";
$INFORMATION_para3 = "Le fichier \"index.php\" envoie l'ensemble des champs liés au paiement vers le fichier \"form_payment.php\" qui récupère l'ensemble des ces champs pour construire la requête de paiement.";
$INFORMATION_para4 = "Les champs sont renseignés à titre d'exemple, à votre charge de les valoriser en fonction de votre contexte. Assurez vous que les droits sur le fichier count.txt soient configurés en lecture et en écriture pour un bon fonctionnement du script.";
$INFORMATION_para5 = "<b>D'autres champs sont disponibles, le support PAYZEN vous invite à lire la documentation liée au formulaire de paiement</b> <a href=\"https://www.payzen.eu/support/integration-payzen\">Consulter la documentation.</a>";

//CHAMPS DU FORMULAIRE
$CHAMPS_DU_FORMULAIRE = "CHAMPS DU FORMULAIRE DE PAIEMENT";
$Url_plateforme = "Url de la plateforme de paiement";
$En_rouge = "En rouge les champs obligatoires";
$PARAMETRES_DE_LA_TRANSACTION = "PARAMETRES DE LA TRANSACTION";
$Montant_de_la_commande = "Montant de la commande exprimé dans la plus petite unité de la devise. Centimes pour EURO. Ex : 1000 pour 10 euros";
$PARAMETRES_CLIENT = "PARAMETRES CLIENT";
$Numero_de_commande = "Numéro de commande. Paramètre facultatif. Longueur du champ: 32 caractères maximum - Type Alphanumérique";
$Numero_client = "Numéro client. Paramètre facultatif. Longueur du champ: 32 caractères maximum - Type Alphanumérique";
$Nom_du_client = "Nom du client. Paramètre facultatif. Longueur du champ: 127 caractères maximum - Type Alphanumérique";
$Adresse_du_client = "Adresse du client. Paramètre facultatif. Longueur du champ: 255 caractères maximum - Type Alphanumérique";
$Code_Postal_du_client = "Code Postal du client. Paramètre facultatif. Longueur du champ: 32 caractères maximum - Type Alphanumérique";
$Ville_du_client = "Ville du client. Paramètre facultatif. Longueur du champ: 63 caractères maximum - Type Alphanumérique";
$Pays_du_client = "Pays du client. Code pays du client à la norme ISO 3166. Paramètre facultatif. Longueur du champ: 2 caractères maximum - Type Alphanumérique";
$Telephone_du_client = "Téléphone du client. Paramètre facultatif. Longueur du champ: 32 caractères maximum - Type Alphanumérique";
$Email_du_client = "Email du client. Paramètre facultatif.";
$Valider_et_envoyer_les_parametres = "Valider et envoyer les paramètres <br/>en mode POST vers le fichier form_payment.php";


/****************************
		form_payment.php
****************************/
$Redirection_vers_la_plateforme = "Redirection vers la plateforme de paiement";


/****************************
		function.php
****************************/
$ERREUR_DE_CONFIGURATION_para = "<p><b><u>ERREUR DE CONFIGURATION !</u></b></p><p><b>Le fichier conf.txt n\'est pas correctement paramétré. Vérifier l\'identifiant boutique, votre certificat et l\'URL de retour.</b></p>";
$POUR_INFORMATION_VOICI_LES_CHAMPS = "POUR INFORMATION VOICI LES CHAMPS QUI SERONT ENVOYES A LA PLATEFORME";
$PAYER = "PAYER => envoyer les paramètres vers la plateforme de paiement";
$REMARQUE_REDIRECTION_debug = "<p><b><u>REMARQUE:</u></b></p><p><b>Pour etre redirigé directement sur la page de paiement sans afficher cette page, veuillez passer la valeur debug à OFF dans le fichier conf.txt.</b></p>";
$REMARQUE_REDIRECTION ="<div style='border:1px solid black;width:600px;margin:150px auto;font-family: Arial;font-size:14px;color:black;text-align:center'>
				<div style='margin:30px 0 10px 0'>Redirection vers la plateforme de paiement</div>
				<div><img src='img/waiting.gif'alt='waiting' title='redirection en cours'></div>";

/******************************
		return_payment.php
*******************************/
$Redirection_vers_la_boutique = "Redirection vers la boutique";

$Signature_Valide = "Signature Valide";
$Signature_Invalide = "Signature Invalide - ne pas prendre en compte le résultat de ce paiement";
$La_transaction_est_un_débit = "La transaction est un débit ayant comme caractéristiques";

$STATUT = "Statut";
$Le_paiement_a_ete_abandonne = "Le paiement a été abandonné par le client. La transaction n’a pas été crée sur la plateforme de paiement et n’est donc pas visible dans le back office marchand.";
$Le_paiement_a_ete_accepte = "Le paiement a été accepté et est en attente de remise en banque.";
$Le_paiement_a_ete_refuse = "Le paiement a été refusé.";
$La_transaction_est_en_attente_de_validation_manuelle = "La transaction a été acceptée mais elle est en attente de validation manuelle. C'est à la charge du marchand de valider la transaction pour demander la remise en banque depuis le back office marchand ou par requête web service. La transaction pourra être validée tant que le délai de capture n’a pas été dépassé. Si ce délai est dépassé alors le paiement bascule dans le statut Expiré. Ce statut expiré est définitif.";
$La_transaction_est_en_attente_d_autorisation = "La transaction est en attente d’autorisation. Lors du paiement uniquement un prise d’empreinte a été réalisée car le délai de remise en banque est strictement supérieur à 7 jours. Par défaut la demande d’autorisation pour le montant global sera réalisée à j-2 avant la date de remise en banque.";
$La_transaction_est_expiree = "La transaction est expirée. Ce statut est définitif, la transaction ne pourra plus être remisée en banque. Une transaction expire dans le cas d'une transaction créée en validation manuelle ou lorsque le délai de remise en banque (capture delay) dépassé.";
$La_transaction_a_ete_annulee = "La transaction a été annulée au travers du back office marchand ou par une requête web service. Ce statut est définitif, la transaction ne sera jamais remise en banque.";
$La_transaction_est_en_attente_d_auto_et_de_valid = "La transaction est en attente d’autorisation et en attente de validation manuelle. Lors du paiement uniquement un prise d’empreinte a été réalisée car le délai de remise en banque est strictement supérieur à 7 jours et le type de validation demandé est « validation manuelle ». Ce paiement ne pourra être remis en banque uniquement après une validation du marchand depuis le back office marchand ou par un requête web services.";
$La_transaction_a_ete_remise_en_banque = "La transaction a été remise en banque. Ce statut est définitif.";

$RESULTAT = "Résultat";
$Paiement_realise_avec_succes = "Paiement réalisé avec succès.";
$Le_commercant_doit_contacter_la_banque_du_porteur = "Le commerçant doit contacter la banque du porteur.";
$Paiement_refuse = "Paiement refusé.";
$Annule_par_le_client = "Paiement annulé par le client.";
$Erreur_de_format = "Erreur de format de la requête. A mettre en rapport avec la valorisation du champ vads_extra_result.";
$Erreur_technique = "Erreur technique lors du paiement.";

$IDENTIFIANT = "Identifiant";

$MONTANT = "Montant";

$MONTANT_EFFECTIF = "Montant Effectif";

$TYPE_DE_PAIEMENT = "Type de paiement";
$Paiement_simple = "Paiement simple.";

$NUMERO_DE_SEQUENCE = "Numéro de séquence";

$RESULTAT_D_AUTO = "Résultat d'autorisation";
$Transaction_approuvee = "Transaction approuvée ou traitée avec succès.";
$Contacter_l_emetteur = "Contacter l’émetteur de carte.";
$Accepteur_invalide = "Accepteur_invalide.";
$Conserver_la_carte = "Conserver la carte.";
$Ne_pas_honorer = "Ne pas honorer.";
$Conserver_la_carte_special = "Conserver la carte, conditions spéciales.";
$Approuver_apres_identification = "Approuver après identification.";
$Transaction_invalide = "Transaction invalide.";
$Montant_invalide = "Montant invalide.";
$Numero_de_porteur_invalide = "Numéro de porteur invalide.";
$Erreur_de_format = "Erreur de format.";
$Identifiant_de_l_organisme = "Identifiant de l’organisme acquéreur inconnu.";
$Date_de_validite_depassee = "Date de validité de la carte dépassée.";
$Suspicion_de_fraude = "Suspicion de fraude.";
$Carte_perdue = "Carte perdue.";
$Carte_volee = "Carte volée.";
$Provision_insuffisante = "Provision insuffisante ou crédit dépassé.";
$Carte_absente = "Carte absente du fichier.";
$Transaction_non_permise = "Transaction non permise à ce porteur.";
$Transaction_interdite = "Transaction interdite au terminal.";
$Suspicion_de_fraude = "Suspicion de fraude.";
$L_accepteur_doit_contacter = "L’accepteur de carte doit contacter l’acquéreur.";
$Montant_de_retrait_hors_limite = "Montant de retrait hors limite.";
$Regles_de_securite_non_respectees = "Règles de sécurité non respectées.";
$Reponse_non_parvenue = "Réponse non parvenue ou reçue trop tard.";
$Arret_momentane = "Arrêt momentané du système.";
$Emetteur_inaccessible = "Emetteur de cartes inaccessible.";
$Mauvais_fonctionnement = "Mauvais fonctionnement du système.";
$Transaction_dupliquee = "Transaction dupliquée.";
$Echeance_de_la_tempo = "Echéance de la temporisation de surveillance globale.";
$Serveur_indisponible = "Serveur indisponible routage réseau demandé à nouveau.";
$Incident_domaine_initiateur = "Incident domaine initiateur.";

$GARANTIE_DE_PAIEMENT = "Garantie de paiement";
$Le_paiement_est_garanti = "Le paiement est garanti.";
$Le_paiement_n_est_pas_garanti = "Le paiement n’est pas garanti.";
$Suite_a_une_erreur = "Suite à une erreur technique, le paiement ne peut pas être garanti.";
$Garantie_non_applicable = "Garantie de paiement non applicable.";

$STATUT_3DS = "Statut 3DS";
$Authentifie_3DS = "Authentifié 3DS.";
$Erreur_Authentification = "Erreur Authentification.";
$Authentification_impossible = "Authentification impossible.";
$Essai_d_authentification = "Essai d’authentification.";
$Non_renseigne = "Non renseigné.";

$DELAI_AVANT_REMISE_EN_BANQUE = "Délai avant Remise en Banque";
$JOURS = "jours";

$MODE_DE_VALIDATION = "Mode de Validation";
$Validation_Manuelle = "Validation Manuelle";
$Validation_Automatique = "Validation Automatique";
$Configuration_par_defaut_du_back_office_marchand = "Configuration par défaut du back office marchand";

$Liste_des_parametres_receptionnes = "Liste des paramètres réceptionnés";


/******************************
		return.php
*******************************/
$ANALYSE_DU_PAIEMENT = "ANALYSE DU PAIEMENT";

$URL_SERVEUR = "URL de notification automatique";
$URL_SERVEUR_para = "Lorsque le paiement est terminé, la plateforme de paiement renvoie des paramètres en mode POST vers l'URL serveur qui doit analyser les résultats du paiement. Dans un premier temps il convient de vérifier la signature reçue. Si celle-ci est correcte alors vous pourrez prendre en considération les paramètres liés au paiement proprement dit.";

$Fichier_return_payment = "Fichier return_payment.php";
$Fichier_return_payment_para = "Dans ce pack, c'est le fichier return_payment.php qui controle la signature et analyse les résultats du paiement. Le code est donné à titre d'exemple. Dans un premier temps le script vérifie la signature puis analyse les principaux champs. A vous d'adapter le code à votre contexte.";

$URLs_de_retour = "URLs de retour";
$URLs_de_retour_para = "Lorsque l'internaute revient à la boutique via l'une des url de retour, les paramètres liés au paiement sont renvoyés en fonction de la variable vads_return_mode définie dans le fichier conf.txt. En fonction du vads_return_mode les paramètres sont renvoyés en mode POST / GET  ou pas du tout.";

$Le_support_vous_invite ="<b>Le support PAYZEN vous invite à lire la documentation liée à l'analyse des paramètres.</b> <a href=\"https://www.payzen.eu/support/integration-payzen\">Consulter la documentation</a>";
?>