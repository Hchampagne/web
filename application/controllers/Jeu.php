<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Jeu extends CI_Controller {
   
    public function index($idsession)
	{
        
            
        
            $jeu=mktime($minute=15);

        if($this->auth->is_logged() == TRUE){ 

            // charge les head et header
            $this->load->view('head');
            $this->load->view('header');

            // requete select les cartes pour un metier dans une session 
            $cartes = $this->db->query("
                select * from carte where type = 'metier' and id_metier in (
                    select id_metier from contient where id_session=?
                )
                order by description asc
                ", $idsession)->result();
            
            $data['cartes'] = $cartes;

            $metiers = $this->db->query("
                select * from metier where id in (
                    select id_metier from contient where id_session=?
                )
                ", $idsession)->result();
            
                $data['metiers'] = $metiers;
                $data['id_session'] = $idsession;
            
        
            $this->load->view('jeu/index', $data);
            $this->load->view('footer');        
        }
        else{
            redirect(site_url("jeu/login"));
    
        }      
}

// CREATION DES SESSIONS
    public function create_session()
    {       
        if($this->input->post()){  //si exist un post

            if($this->auth->is_logged() == TRUE){ // si une personne logged
                // attribut les variables du post dans $data
                $data = $this->input->post();
                // attribut id de la session a $formateur
                $formateur = $_SESSION['id'];
                // ajout a $data  id_formateur => $formateur = $_SESSION['id']
                $data += array("id_formateur" => $formateur);
                //insert du post dans la base table session
                $this->Corif_model->create_session($data);
                //requete recup le dernier id en fait non l'id max
                //defaut en cas de requete simultanée
                $id = $this->db->query('select max(id) as id from session')->row()->id;
                // redirect vers choix metier
                redirect(site_url("jeu/choix_metier/") . $id );
            }else{
                // pas de connexion redirection
                redirect(site_url("jeu/login"));
            }
        }else{
            //premier chargement
            $this->output->enable_profiler(FALSE);
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('jeu/createsession');
            $this->load->view('footer');
        }       
    }


/*******************************************************************************************************************/
    public function delete_session($id)
    {
        $this->Corif_model->delete_session($id);
        redirect(site_url("jeu/dashboad")) ;
    }

    public function delete_participant($id)
    {
        $this->Corif_model->delete_participant($id);
        redirect(site_url("jeu/dashboad")) ;
    }

/***************************************************************************************************************** */
    public function modif_session($id)
    {
        
        if($this->input->post()){
            if($this->auth->is_logged() == TRUE){ 
                $this->output->enable_profiler(TRUE);
                $data = $this->input->post();
                $formateur =$_SESSION['id'];
                $data += array("id_formateur" => $formateur);
                $data += array("id" => $id);
                $this->Corif_model->update_session($data, $id);
                redirect(site_url("jeu/choix_metier/") . $id );
            }
            
            else{
                redirect(site_url("jeu/login"));
            }
            

        }
        else{
            $data['sessions']=$this->db->query('Select * From session where id=?', $id)->result();
            $this->output->enable_profiler(False);
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('jeu/modifsession', $data);
            $this->load->view('footer');
        }
        

    }

    //***************************************************************************************************************************** */

    public function choix_metier($id)
    {
        $this->output->enable_profiler(true);
        $session = $this->db->query("select * from session where id=?", $id)->row();
        //Slect la session selon id
        $metiers = $this->db->query("
            select * from metier where id not in (
                select id_metier from contient where id_session=?  
            )
        ", $id)->result();
        
        $metiers_session = $this->db->query("
            select * from metier where id in (
                select id_metier from contient where id_session=?  
            )
        ", $id)->result();
    
        if($this->input->post()){
            if($this->auth->is_logged() == TRUE){
                if ($this->input->post("add")) {
                    $data = array(
                        "id_metier" => $this->input->post("id_metier1"),
                        "id_session" => $id
                    );
                    $this->db->insert("contient", $data);
                    redirect(site_url("jeu/choix_metier/") . $id);
                } 
                elseif ($this->input->post("del")) {
                    $data = array(
                        "id_metier" => $this->input->post("id_metier1"),
                        "id_session" => $id
                    );
                    $this->db->query("delete from contient where id_session=? and id_metier=?", array($id,$this->input->post("id_metier2") ));
                    redirect(site_url("jeu/choix_metier/") . $id);
                } 
                else {
                    redirect(site_url("jeu/create_participant/") . $id);
                }
            }
        else{
            redirect(site_url("jeu/login"));
            }

        }

        else{
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('jeu/choixmetiers', compact("session", "metiers", "metiers_session"));
            $this->load->view('footer');
        }
    }

//***************************************************************************************************************************************** */
    public function create_participant($id)
    {
        $session = $this->db->query("select * from session where id=?", $id)->row();
        $participants_session = $this->db->query("select * from invite where id in (select id from invite where id_session=?)", $id)->result();
        $choix= $this->db->query("select * from metier where id in (select id_metier from contient where id_session=?)", $id)->result();

        if($this->input->post()){
            if($this->auth->is_logged() == TRUE){
                if ($this->input->post("add")) {
                    $data = array(
                        "nom" => $this->input->post("nom"),
                        "id_session" => $id,
                        "email" => $this->input->post("email"),
                    );
                    $this->db->insert("invite", $data);
                    redirect(site_url("jeu/create_participant/") . $id);
                } 
                elseif ($this->input->post("del")) {
                    $data = array(
                        "id" => $this->input->post("id_metier1"),
                        "id_session" => $id
                    );
                    $this->db->query("delete from invite where id_session=? and id=?", array($id, $this->input->post("id_metier2") ));
                    redirect(site_url("jeu/create_participant/") . $id);
                }

                else{
                    redirect(site_url("jeu/dashboad"));
                    }
            }
            else{
                redirect(site_url("jeu/login"));
            }
        }
    

        else{
        $this->output->enable_profiler(FALSE);
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('jeu/createparticipant', compact('session', 'participants_session', 'choix'));
		$this->load->view('footer');
        }
        
    }


// Tableau bord sessions/adhérents
    public function dashboad()
    {
                      
            if($this->auth->as_role() == true){  // test si role exist
                //charge views head et header
                $this->load->view('head');
                $this->load->view('header');
                // jeu resultats table invite et session
                $data['participant'] = $this->Corif_model->participant();
                //attribut a $id <- valeur id en session
                $id=$_SESSION["id"];
                // requete select table session ou date session est la date du jour et ou id formateur est id de la session 
                $sessions = $this->db->query("select * from session where date_session>=?", mdate() ," and id_formateur=?", $id)->result();
                // ajoute dans $session le nombre de participant et les métier
                // nb praticipant requete invite / id _session
                // les métier selectionnés jointure sur metier avec contient ou id session
                foreach ($sessions as $session) {
                    $session->nb_participant = $this->db->query("select count(*) as compteur from invite where id_session=?", $session->id)->row()->compteur;
                    $session->metiers = $this->db->query("select * from metier join contient on metier.id=contient.id_metier where contient.id_session=?", $session->id)->result();
                }
                // prepare transmittion a la vue dashboard
                $data["sessions"] = $sessions;
                // charge les vues dashboard et footer
                $this->load->view('jeu/newdashboad', $data);
                $this->load->view('footer');
            }

            else{
                // redirection a login il n'y a pas de role existant
                redirect(site_url("connexion/login"));
            } 
    }


    public function email_part(){

        $this->output->enable_profiler(FALSE);
        $liste['email']= $this->Corif_model->latest_id_part();
        $data['participant'] = $this->Corif_model->participant();
        $mess=$this->load->view('email/email_part',$data,true);
        $this->email->from('noreply@jerem1formatic.fr', 'Corif');
        $mail=array();
        foreach($liste as $email){
                array_push($mail, $email->email);
        }
        $maile = join(",",$mail);       
        
        $this->email->to($maile);        
        $this->email->subject('Inscription sur Corif "Des métiers, des vies?"');
        $this->email->message( $mess  );

        if ( ! $this->email->send(false))
        {
               echo "envoie ko";
        }
        else {
                message('Votre inscription est en cours de validation.');
                redirect('administration/email_val');
        }
        $this->email->print_debugger();


}


    function session($id)
    {
        if($this->auth->is_logged() == TRUE){
            $this->load->view('head');
            $this->load->view('header');
            $data['partsessions'] = $this->Corif_model->part_sess($id);
            $data['etat'] = $this->Corif_model->etat($id);
            $this->load->view('jeu/session', $data);
            $this->load->view('footer');
        }
        else{
            redirect(site_url("connexion/login"));
        }
    }


    function login() {

        if ($this->input->post()){  //si post

            // date du jour
            $today = date("Y-m-d");

            //recup valeur du post
            $nom = $this->input->post("nom");
            $email = $this->input->post("email");

            // interroge la base de donnée table invité pour le nom
            $data= $this->Corif_model->participantb($nom);

            // recup id de la session, date de session, email
            $idsession = $data->id_session;
            $datesession = $data->date_session;
            $mail= $data->email;

            // interroge la base de donnée
            $model= $this->Corif_model->loginjeu($email);
            $detail = $model->row();
                        

            if ($model->num_rows() == 0){

                var_dump($nom,$email);
                message("Vous n'êtes pas enregistré !!");
                redirect(site_url("accueil"));
                
            }else{
                if ($data->email == $email && $today == $datesession){    

                    $id=$data->id;
                    $this->auth->loginjeu($nom, $email);
                    message("Bienvenue !!");
                    Redirect(site_url('jeu/index/').$idsession);
                }else{
                             
                    message('Merci de vérifier les identifiants de connexion reçu par Email ou la date et heure de connexion');
                    redirect(site_url("accueil"));
                    }
                }
        }else{
       
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('jeu/login');
        $this->load->view('footer');
    }
}

public function update_etat()
{
    $id= $this->input->post("id");
    $data["etat"] = $this->input->post("etat");
    //$this->Corif_model->ins_etat($id, $data);
    $this->db->update("session", $data, "id=".$id);
    redirect(site_url("jeu/session/".$id));
}


public function etat($id_session){
        //$this->out/put->enable_profiler(true);
        $etat=$this->Corif_model->etat($id_session);
        echo $etat;           
}


}