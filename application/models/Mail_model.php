<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // envoi mail retourne true si envoi réussi
    //paramètre

    public function mail($from, $to, $subject, $message){

        $this->email->print_debugger();  // vide les paramètres email

        $this->email->from($from , "CORIF des métiers, des vies");  // mail emetteur
        $this->email->to($to);           // mail destinataire
        $this->email->subject($subject);      // mail sujet
        $this->email->message($message);      // mail message

        $response = $this->email->send();    // envoie le mail 
        return $response;                    // et true si reussi   
    }  
}
