<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Corif_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

// Partie connexion / Inscription
function login($log, $email)
{
            $this->db->from('adherent');
            $this->db->where('login', $log);
            $this->db->or_where('email', $email);
$requete =  $this->db->get();

    return $requete;
} // selection des adherents avec email

function is_unique($log, $email)
{
            $this->db->from('adherent');
            $this->db->where('login', $log);
            $this->db->or_where('email', $email);
$requete =  $this->db->get();

return  $requete->result();

}

    function admin()
    {
                $this->db->select('email');
                $this->db->from('adherent');
                $this->db->where('role','administrateur');
    $requete =  $this->db->get();

        return $requete->result();
    } // selection des adherents avec le role admin
    
    function formateur()
    {
        $this->db->from('adherent');
        $this->db->where('role', 'formateur');
        $requete =  $this->db->get();
        return $requete->result();
    }

    function latest_id()
    {
        $this->db->select('email', 'id');
        $this->db->from('adherent');
        $this->db->order_by('id', 'desc');
        $requete= $this->db->get();
        return $requete->row();
    }
     // Dernier ID de la liste

    

    public function create_key($mail) 
    {
        $key = generate_number(10) . microtime(true)*10000 .generate_number(10);
        $requete = $this->db->query("update adherent set key=? where email=?", array($key, $mail));
        return $key;
    }

    // ajoute d'une key reinitialisation mdp
 

// Partie adherent

    function select_adherents()
    {
        $this->db->from('adherent');
        $requete =  $this->db->get();
        return $requete->result();
    }
    // selection des adherents

    function insert_adherents($data)
    {
       $this->db->insert('adherent', $data);
    }

    //Ajout d'adherent
   
    function update_adherents($id, $data)
    {    
        $this->db->where('id', $id);
        return $this->db->update('adherent',$data);
    }

    //Mise à jour de l'adherents


    function modif_adherents($id)
    {
                $this->db->from('adherent');
                $this->db->where('id', $id);
    $requete =  $this->db->get();
                   
        return $requete->row();
    }

    // Select adherent par ID


    function delete_adherents($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('adherent');
    }

    // Suppression d'un adherent


    function select_carte()
    {
        $requete = $this->db->query("
            select carte.*, metier.metier as nom_metier
            from carte
            join metier on  carte.id_metier = metier.id
            order by description asc
        ");
        return  $requete->result();
    }
    // Selection carte avec metier

    function insert_carte($data)
    {   
       $this->db->insert('carte', $data);
       $this->db->join('metier','carte.id_metier = metier.id' );
    }

    //insertion d'une carte

    function insert_metier($data)
    {   
       $this->db->insert('metier', $data);
    }

    //insertion d'un métier

    function liste_prenom()
    {
        $data= $this->db->query("SELECT * FROM metier");
        return $data->result();
    }

    // Liste des metiers
   

    function update_carte($id, $data)
    {   
        $this->db->from('carte');
        $this->db->where('id', $id);
        return $this->db->update('carte',$data);
    }

    //Mise à jour d'une carte


    function modif_carte($id)
    {
        $this->db->from('carte');
        $this->db->join('metier', 'carte.id_metier = metier.id');
        $this->db->where('carte.id', $id);
        $requete =  $this->db->get();
                   
        return $requete->row();
    }

    //select carte par id


    function delete_carte($id)
    {
        $this->db->from('carte');
        $this->db->where('id', $id);
        $this->db->delete('carte');
    }
//suppression de la carte

    function search($data)
        {
            $this->db->select('prenom, metier, numero, description, type');
            $this->db->from('carte');
            $this->db->join('metier', 'carte.id_metier = metier.id' );
            $this->db->or_like('metier', $data);
            $this->db->or_like('prenom', $data);
            $this->db->or_like('numero', $data);
            $this->db->or_like('description', $data);
            $this->db->or_like('type', $data);
            $this->db->group_by("numero");
            $requete= $this->db->get();
            return  $requete->result();
        }

    //Recherche

// Partie métier


// Partie Jeu
    function loginjeu($nom)
        {
                    $this->db->from('invite');
                    $this->db->where('nom', $nom);
                    $requete =  $this->db->get();

            return $requete;
        } // selection participant

    function select_metier($id1)
    {
            $requete = $this->db->query("
                select *
                from carte
                join metier on carte.id_metiers = metier.id
                join contient on contient.id_metier = metier.id
                where type = 'Métier' and metier.id = $id1
                group by numero
            "); 
            return  $requete->result();
     }

     function formateurs()
    {
            $this->db->select('*');
            $this->db->from('adherent');
            $this->db->where('role','formateur');
            $requete =  $this->db->get();

            return $requete->result();
    }

     function session()
     {
        $this->db->select('*');
        $this->db->from('session');
        $requete =  $this->db->get();

        return $requete->result();
     }

     function create_session($data)
    {
        $this->db->insert('session', $data);
    }

    function update_session($data, $id)
    {
        $this->db->from('session');
        $this->db->where('id', $id);
        return $this->db->update('session',$data);
    }

    function delete_session($id)
    {
        $this->db->from('session');
        $this->db->where('id', $id);
        $this->db->delete('session');
    }

    //Creation de session
    function delete_participant($id)
    {
        $this->db->from('invite');
        $this->db->where('id', $id);
        $this->db->delete('invite');
    }

    function create_participant($data)
    {
        $this->db->insert('invite', $data);
    }


    //creation de participant

    function choix_metiers($data)
    {
        return $this->db->insert('contient',$data);
    }

    //Choix des metiers

    function participant()
        {
            $this->db->select('*, invite.id as idi');
            $this->db->from('invite');
            $this->db->join('session', 'session.id = invite.id_session');
            $requete= $this->db->get();
            return $requete->result();
        }

    function participantb($nom)
    {
        $this->db->select('*');
        $this->db->from('invite');
        $this->db->join('session', 'session.id = invite.id_session');
        $this->db->where('nom', $nom);
        $requete= $this->db->get();
        return  $requete->row();
    }    

    function latest_id_part()
    {
        $this->db->select('email', 'id');
        $this->db->from('invite');
        $this->db->order_by('id', 'desc');
        $requete= $this->db->get();
        return $requete->row();
    } // Dernier ID de la liste


    function nbr_participant()
    {
        $requete = $this->db->query("SELECT session.id, date_session, heure_debut, heure_fin, 
        count(id_session) AS Nombre_de_participant
        FROM invite
        JOIN session on invite.id_session = session.id");
        return  $requete->result();
    }//nbr de participant

    function part_sess($id)
    {
        $this->db->select('*');
        $this->db->from('invite');
        $this->db->where('id_session', $id);
        $requete= $this->db->get();
        return $requete->result();
    }// participant part session

    function etat($id)
    {
        $this->db->select('etat');
        $this->db->from('session');
        $this->db->where('id', $id);
        $requete = $this->db->get()->row();
        return $requete->etat;
    }

    function ins_etat($id, $data)
    {
        $this->db->set('etat', $data);
        $this->db->where('id', $id);
        return $this->db->update('session'); 
    }

}