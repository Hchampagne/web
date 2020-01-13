<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Key { }



function generate_number($l) {
    $resultat = "";
    $digits = "0123456789";
    for ($i=0; $i < $l; $i++) { 
        $r = mt_rand(0, 9);
        $resultat .= $digits[$r];
    }
    return $resultat;
}