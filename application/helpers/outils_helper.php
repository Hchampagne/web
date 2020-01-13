<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('message'))
{
    function message($m = '')
    {
        $_SESSION["message"] = $m;
    }   
}



function age($ds) {
	if (!$ds) return "";
	//return intval((time()-$ts)/31557600) . " ans";
	$date1 = new DateTime("now");
	$date2 = DateTime::createFromFormat("Y-m-d", $ds);
	$di = $date1->diff($date2);
	return $di->y . " ans"; // . $di->m . " mois";
}

function age2($ds) {
	$res = "";
	if (!$ds) return "";
	//return intval((time()-$ts)/31557600) . " ans";
	$date1 = new DateTime("now");
	$date2 = DateTime::createFromFormat("Y-m-d", $ds);
	$di = $date1->diff($date2);
	if ($di->y>0) {
		$res .= $di->y . " ans ";
	}
	if ($di->m>0) {
		$res .= $di->m . " mois ";
	}
	if ($di->d>0) {
		$res .= $di->d . " jours";
	}
	return $res;
}

function depuis($ds) {
	if (!$ds) return 0;
	//return intval((time()-$ts)/31557600) . " ans";
	$date1 = new DateTime("now");
	$date2 = DateTime::createFromFormat("Y-m-d", $ds);
	$di = $date1->diff($date2);
	return $di->days;
}

function french_date($ds) {
	if (!$ds) return "";
	if (preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})$/", $ds)) {
		return $ds;
	}
	if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $ds)) {
		$d = DateTime::createFromFormat("Y-m-d", $ds);
		if ($d) {
			return $d->format('d/m/Y');
		}
	}
	return "";
}


function console($message) {
	if (!isset($_SESSION["log"]) || !is_array($_SESSION["log"])) {
		$_SESSION["log"] = array();
	}
	array_push($_SESSION["log"], $message);
}


function generate($l) {
	$resultat = "";
	$letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for ($i=0; $i < $l; $i++) { 
		$r = mt_rand(0, 61);
		$resultat .= $letters[$r];
	}
	return $resultat;
}


function send_mail($to, $sujet, $message) {

	$CI =& get_instance();

	$CI->email->set_newline("\r\n");
	$CI->email->from('ne.pas.repondre@pec-hdf.fr', 'PEC HDF AFPA');
	//$CI->email->from('ne_pas_repondre@bienvu.net');
	$CI->email->to($to);
	$CI->email->subject($sujet);
	$CI->email->message($message);
		
	$CI->email->send();

	return $CI->email->print_debugger();
}

