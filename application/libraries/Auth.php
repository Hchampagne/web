<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

    private $table = "adherent";
    private $email_field = "email";
    private $password_field = "password";
    private $CI;
    private $invite ='invite';

    function __construct() {
        $this->CI =& get_instance();
    }

    // La fonction verifie que $email et présent dans la table ??? 
    // et correspond au mot de passe $password
    //
    // retourne TRUE en cas de succes, FALSE sinon
    // en cas de succés, une variable de session est créée 
    // qui contient l'email, l'id, le nom, le prenom, le role de la personne
    public function loginjeu($nom, $email)
    {
        $resultat = $this->CI->db->query("
            SELECT * 
            FROM invite
            JOIN session on session.id = invite.id_session
            WHERE nom=? or email=? 
        ", array($nom, $email))->row();


        if ($resultat) {
            
            $newdata = array(
                'username'   => $resultat->nom,
                'id'         => $resultat->id,
                'email'      => $resultat->email,
                'date_debut' => $resultat->date_session,
                'heure_debut'=> $resultat->heure_debut,
                'heure_fin'  => $resultat->heure_fin,
                'role'       => $invite,
                'log_in'    => TRUE
            );
    
            $this->CI->session->set_userdata($newdata);

            return TRUE;
        }

        else  {
            session_destroy ();
            return FALSE;

        }  
    }// session jeu

    public function login($email, $password)
    {
        $resultat = $this->CI->db->query("
            SELECT * 
            FROM adherent
            WHERE login=? or email=? 
        ", array($email, $email))->row();


        if ($resultat) {
            
            $newdata = array(
                'username'  => $resultat->login,
                'id'        => $resultat->id,
                'email'     => $resultat->email,
                'nom'       => $resultat->nom,
                'prenom'    => $resultat->prenom,
                'role'      => $resultat->role,
                'validation' => $resultat->validation,
                'log_in'    => TRUE
            );
    
            $this->CI->session->set_userdata($newdata);

            return TRUE;
        }

        else  {
            session_destroy ();
            return FALSE;

        }  
    }

    // deconnect
    public function deconnect()
    {
        unset($_SESSION["log_in"]);
        //session_destroy ();
    }

    // retourne true si la personne est connecté, donc si une variable de session a été créée.
    // FALSE sinon
    public function is_logged()
    {
        if (isset($_SESSION["log_in"]))
            {
            return TRUE;
            }

        else{
            return FALSE;
            }

    }

    // retourne true si la personne connectée appartient au role $role.
    // FALSE sinon
    public function as_role()
    {
        
        if ($_SESSION["role"] == "administrateur" or $_SESSION["role"] == "formateur") {
            return TRUE;
        }

        else  {
            return FALSE;
        }
    }

    // retourne true si la personne connectée appartient au role administrateur.
    // FALSE sinon
    public function is_admin()
    {
        
        if ($_SESSION["role"] == "administrateur") {
            return TRUE;
        }

        else  {
            return FALSE;
        }
    }

    public function is_connect()
    {
        
        if ($_SESSION["validation"] == 1) {
            return TRUE;
        }

        else  {
            return FALSE;
        }
    }
}

