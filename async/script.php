<?php
// echo json_encode($_POST);
 
$success = 0;
$msg = "Une erreur est survenue (script.php)";
$contact = [];
 
if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message'])) {
	$name = htmlspecialchars(strip_tags($_POST['name']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$message = htmlspecialchars(strip_tags($_POST['message']));
 
 
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
 
			// Ajout de l'utilisateur en base de données devrait se faire à cet endroit (exemple)          
            $success = 1;
			$msg = "Votre message a bien été enregistré";
			$contact['email'] = $email;

 
		} else {
			$msg = "Adresse email invalide";
		}

} else {
	$msg = "Veuillez renseigner tous les champs";
}
 
 
$res = ["success" => $success, "msg" => $msg, "contact" => $contact];

echo json_encode($res);
?>