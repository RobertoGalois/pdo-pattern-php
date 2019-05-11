<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=pataprout;charset=utf8', 'root', 'password');
} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM log1 ORDER BY id DESC');
$req->execute();
$text = "";
while ($data = $req->fetch()) {
	foreach($data as $key => $value) {
		if (!(is_numeric($key))) {
			$text .= $key.': '.$value.'<br />';
		}
	}

	$text .= '<br />';
}

echo($text);
$req->closeCursor();	//termine le traitement de la requete, c'est pour eviter d'avoir des emmerdes a la requete suivante.

if ($bdd) {
	$bdd = null;
}
