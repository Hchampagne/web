<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller{

    //public function _contruct() {
    //    parent::__contruct();
    //}

    public function inscription()
    {
             
        if ($this->input->post()){

            // controle formulaire post()
            // tests si vide  (riquired) / filtre balises html (html_escape) / test regex (regex_match)
            // test si déjà present dans Database (is_unique) / si champs identiques (matches[])
            // test validité eamil (validd_email)
            // messages d'erreurs en fonction des tests

            $this->form_validation->set_rules('nom','Nom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]',     
                array('required'=>'Le champs est vide' , 'regex_match'=>'La saisie est incorrecte')); 

            $this->form_validation->set_rules('prenom', 'Prenom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]', 
                array('required'=>'Le champs est vide', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('organisme', 'Organisme',
                'required|html_escape|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*/]', 
                array('required'=>'Le champ est vide', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[adherent.email]|valid_email',   
                array('required'=>'Le champs est vide', 'is_unique'=>'Déjà utilisé','valid_email'=>'Votre email est incorrecte'));

            $this->form_validation->set_rules('login', 'Login',
                'required|is_unique[adherent.login]|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]', 
                array('required'=>'Le champs est vide', 'is_unique'=>'Déjà utilisé', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('mdp', 'MDP',
                'required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]', 
                array('required'=>'Le champs est vide', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('verifmdp','Verifmdp','required|matches[mdp]',             
                array('required'=>'Le champs est vide', 'matches'=>'Les mots de passes ne sont pas identiques' ));

                if($this->form_validation->run() == false ){ 

                    // formulaire non conforme aux controles
                    // rechargement de la page
                    $this->load->view('head');
                    $this->load->view('header');
                    $this->load->view('connexion/inscription');
                    $this->load->view('footer');
                   
                }else{  
                    //pas d'erreurs dans les formulaires
                    // nous pouvons faire l'indsertion en base De donnée                 

                    //recup le post du formulaire inscription
                    $data = $this->input->post(null,true);  // filtre html balise 

                    //supprime le champ verifmdp du post => "controle champs identiques"
                    //ATTENTION supprime la 6ème position (5)
                    array_splice($data,6,1);

                    //le hash du mot de passe
                    $password_hash = password_hash($data["mdp"], PASSWORD_DEFAULT);
                    $data["mdp"] = $password_hash;                

                    // insertion dans base de donnée appel model corif_model->insert_adherents
                    $insert = $this->Corif_model->insert_adherents($data);

                    if($insert == 1){
                    // insert en base réussi
                    
                       
                        // redirection pour envoi des email confirmation inscrption et attente validation
                        // plus mail admin pour validation
                        redirect('administration/email_conf');

                    }else{
                        // insert en base a échoué

                        //pop_up avec retour a l'accueil

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer');
                        }                   
                    }
        } else {

        // pas de post() rechargement de la page premier affichage
        $this->load->view('head');
        $this->load->view('header');
         $this->load->view('connexion/inscription');
        $this->load->view('footer');
        }





            /*
                if($requete->num_rows() == 0)
                {
                    $this->load->model('corif_model');
                    //recup la table adherent
                    $this->corif_model->select_adherents();
                    // forrmat une date en fonction du fuseau horaire et heure été/hiver
                    date_default_timezone_set('Europe/Paris');
                    $today= date("Y-m-d");
                    //recup le post du formulaire inscription
                    $data = $this->input->post();
                    //le hash du mot de passe
                    $password_hash = password_hash($data["mdp"],PASSWORD_DEFAULT);
                    $data["mdp"] = $password_hash;
                    //insert la date du jour dans le post
                    $data += array("date_inscription" => $today);
                    // insertion dans base de donnée appel model corif_model->insert_adherents
                    $this->corif_model->insert_adherents($data);
                    // redirection pour envoi des email confirmation inscrption et attente validation
                    // plus mail admin pour validation
                    redirect('administration/email_conf');
                }

                foreach($uniques as $unique){
                if($unique->email == $email && $unique->login == $log){
                    message("L'email " .$email. " et le login " .$log. " sont déjà présents dans la base de donnée, veuillez renouveller votre mots de passe si vous avez oublier");
                    redirect('connexion/reset');
                }

                elseif($unique->email == $email){
                    message("L'email " .$email. " est déjà présent dans la base de donnée merci de modifier les informations");
                    redirect('connexion/inscription');
                }

                else{
                    message("Le login " .$log. " est déjà présent dans la base de donnée merci de le modifier");
                    redirect('connexion/inscription');
                }
            }*/
            
            /* $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
            // $userIp=$this->input->ip_address();
         
            // $secret = $this->config->item('google_secret');
        
            // $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
        
            // $ch = curl_init(); 
            // curl_setopt($ch, CURLOPT_URL, $url); 
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            // $output = curl_exec($ch); 
            // curl_close($ch);      
             
            // $status= json_decode($output, true);
        
            // if ($status['success']) {
            //     print_r('Google Recaptcha Successful');
            //     exit;
            // }else{
            //     $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
            // }
        
             redirect('form', 'refresh');
            

        }*/

       
    }




    public function login(){

        // 
        date_default_timezone_set('Europe/Paris');
        $today =date("Y-m-d H:i:s");

        if ($this->input->post())
        {
            $log = $email = $this->input->post("login");           
            $data= $this->Corif_model->login($log, $email);
            $detail = $data->row();
            

            if ($data->num_rows() == 0){
               message("Vous n'êtes pas enregistré !!");
               Redirect(site_url('accueil'));
            }

                
            elseif (password_verify($this->input->post("password"), $detail->mdp))
                {
                        
                        $data = array("date_connexion" => $today);
                        $this->db->where('login', $log);
                        $this->db->update('adherent', $data);
                        $this->auth->login($log, $email);
                    if ($this->auth->is_connect() == TRUE) {
                        Redirect(site_url('accueil'));
                    } else {
                        $this->auth->deconnect();
                        message('Votre demande est en cours de validation par votre administrateur');
                        Redirect(site_url('accueil'));
                    }
                    
                    
                }

            else{
                // echo password_verify($this->input->post("password"), $detail->mdp);
                message('Votre mot de passe est erroné !!');
                redirect(site_url("connexion/login"));
                }
        }
    
        else{
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('connexion/login');
            $this->load->view('footer');
        }
    }

    

    public function deconnexion()
        {
            $this->auth->deconnect();
            redirect('connexion/login');
        }




        public function reset()
        
        {
            
            if($this->input->post())
            
            {
                
               $mail= $this->input->post();
               

               $data= $this->Corif_model->create_key($mail);
                

                $this->email->from('noreply@jerem1formatic.fr', 'Corif');
                $this->email->to($mail);
                
                $this->email->subject('Réinitialisation de mots de passe');
                $this->email->message('<a href="https://dev.amorce.org/corif/index.php/administration/newpassword/'.$data.'"><strong>Réinitialisation de mot de passe</strong></a>');

                $this->email->send();
                
                
                redirect('accueil');
                message('Un Email avec un lien valable 24H vous a été envoyé !');
            }
        
            else
            {
                $this->load->view('head');
                $this->load->view('header');
                $this->load->view('connexion/reset');
                $this->load->view('footer');   
            }
        }

}