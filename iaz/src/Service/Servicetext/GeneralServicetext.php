<?php
//(c) Noel Kenfack   Novembre 2016
namespace App\Service\Servicetext;

class GeneralServicetext
{
public function normaliseText($text)
{
	$text = trim($text); //retire les caractères vide en début et en fin du text.
	$text = $this->retireAccent($text);
	$text =  strtolower($text);
	$text = str_replace("'", "-", $text);
	$text = str_replace(" ", "-", $text); 
	$text = str_replace("_", "-", $text);
	return $text; 
}

public function codepays($text)
{
	$regex = '#^[+-]([0-9]){1,10}$#';
	if (preg_match($regex, $text) || $text == null)
	{
		return true;
	}else{
		return false; 
	}
}
// cette fonction recherche les éléments de tab1 dans la variable texte et remplace par les éléments de tab2 de la même position.
public function retireAccent($text)
{
	$tab1 = array('é','è','à','ù','ç','_','ô','ê','î');
	$tab2 = array('e','e','a','u','c','-','o','e','i');
	$text = str_ireplace($tab1, $tab2, $text);
	return $text;
}

public function email($text)
{
	$regex ='#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}#i';
	if (preg_match($regex, $text) || $text == null)
	{
		return true;
	}else{
		return false; 
	}
}

public function siteweb($text)
{
$regex ='#(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?\/?#i';
if (preg_match($regex, $text) || $text == null)
{
return true;
}else{
return false; 
}
}

public function password($text)
{
	$regex = '#^[a-z0-9]([a-z0-9][-_\.]?){6,150}$#i';
	if (preg_match($regex, $text))
	{
		return true;
	}else{
		return false; 
	}
}

public function telephone($text)
{
	$regex = '#^[2-9][0-9]{8}$#';
	if (preg_match($regex, $text))
	{
		return true;
	}else{
		return false; 
	}
}

/**
cette fonction prend une liste d'élément et choisi d'une manière aléatoire nbre_max d'élement d'ans la liste
*/
public function selectEntities($liste_entity, $nbre_max)
{
	$nb_entity = count($liste_entity);
	if ($nb_entity <= $nbre_max)
	{
	 $tail = $nb_entity;
	}else{
	 $tail = $nbre_max;
	}
	if($nb_entity > 0){
	$tab = range(0,$nb_entity - 1);
	$cle = array_rand($tab,$tail);
	}
	$etab_aleatoires = new \Doctrine\Common\Collections\ArrayCollection();
	$collection = 0;
	$compt = 0;
	foreach($liste_entity as $entity)
	{
	   if (is_int($cle) || in_array($compt, $cle))
	   {
	   $etab_aleatoires[] = $entity;
	   $collection++;
	   }
	   $compt++;
	   if($collection == $tail)
	   {
	   break;
	   }
	}
	return $etab_aleatoires;
}
/**
cette fonction prend une liste d'élément et choisi d'une manière aléatoire 1 élement d'ans la liste
*/
public function selectEntity($entites)
{
    $nbreetab = count($entites);
	if ($nbreetab == 0){
	$nbreetab = 1;
	$etabaleatoire = null;
	}
	$numero = mt_rand(0, ($nbreetab - 1));
	$compteur = 0;
	foreach($entites as $entite)
	{
	if ( $compteur == $numero )
	{ 
	$etabaleatoire = $entite;
	break;
	}
	$compteur = $compteur + 1;
	}
	return $etabaleatoire;
}

public function chaineValide($text,$valmin,$valmax)
{
	$text = trim($text);
	$tail = strlen($text);
	if ($valmin <= $tail and $valmax >= $tail)
	{
		return true;
	}else{
		return false; 
	}
}

public function strToHex($string){
	$hex='';
	for ($i=0; $i < strlen($string); $i++){
		$hex .= dechex(ord($string[$i]));
	}
	return $hex;
}

public function hexToStr($hex){
	$string='';
	for ($i=0; $i < strlen($hex)-1; $i+=2){
		$string .= chr(hexdec($hex[$i].$hex[$i+1]));
	}
	return $string;
}

public function decrypt($message, $key)
{
	$message = str_replace(" ", "+", $message);//Quelques caractères supprimés par le navigateur
	$decrypted = Cryptor::Decrypt($message, $key);
	$decrypted = substr($decrypted, 0, -16);//Soustraitre les caractaires ajoutés
	$hex_to_text = $this->hexToStr($decrypted);//Transformer les caractères exadécimal en text simple

	return $hex_to_text;
}

public function encrypt($message, $key)
{
	$text_to_hex = $this->strToHex($message).'AbcDefGhiJKlmNoP';//Transformer le text en hexadécimal pour échaper les carractères spéciaux.
	$encrypted = Cryptor::Encrypt($text_to_hex, $key);//Nous avons injecté ces caractères pour faire en sorte que tout mot à cripter ai plus de 16 caractère.
	return $encrypted;
}

public function telemail($text)
{
	if($this->allTelephone($text) or $this->email($text))
	{
		return true;
	}else{
		return false;
	}
}

public function allTelephone($text)
{
	$regex = '#^[0-9_-]{6,150}$#';
	if (preg_match($regex, $text) || $text == null)
	{
		return true;
	}else{
		return false; 
	}
}
}