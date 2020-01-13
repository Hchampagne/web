<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller{

    public function _contruct() {
        parent::__contruct();
    }

    public function inscription()
    {
        $log=   $this->input->post("login");
        $email= $this->input->post("email");
        
        $requete= $this->Corif_model->login($log, $email);
        $uniques= $this->Corif_model->is_unique($log, $email);

        $this->output->enable_profiler(false);
        
            
        if ($this->input->post()){
            
                if($requete->num_rows() == 0)
                {
                    $this->load->model('corif_model');
                    $this->corif_model->select_adherents();
                    date_default_timezone_set('Europe/Paris');
                    $today= date("Y-m-d");
                    $data = $this->input->post();
                    $password_hash = password_hash($data["mdp"],PASSWORD_DEFAULT);
                    $data["mdp"] = $password_hash;
                    $data += array("date_inscription" => $today);
                    $this->corif_model->insert_adherents($data);
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
            }
            
            // $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
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
        
            // redirect('form', 'refresh');


        }

        else{
        $this->load->view('head');
		$this->load->view('header');
		$this->load->view('connexion/inscription');
		$this->load->view('footer');
        }
    }




    public function login(){
        date_default_timezone_set('Europe/Paris');
        $today =date("Y-m-d H:i:s");

        if ($this->input->post())
        {
            $log = $this->input->post("login");
            $email= $this->input->post("email");
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
                        $this->auth->login($log, $password);
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