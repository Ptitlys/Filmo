        
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlleur_connexion extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('form'); 
        $this->load->library('form_validation');
        $this->load->model('Model_films');
        
    }

    public function connexion(){
        $_SESSION['erreur'] = null;
        $header_status = 'View_'.$_SESSION['status'];
        $data['header']=$header_status;
        $data['content']='connexionView';
 
        $this->load->vars($data);
        $this->load->view('template');
        
        

        $this->form_validation->set_rules('id','identifiant','required'); 
        $this->form_validation->set_rules('mdp','mot de passe','required');

        if($this->form_validation->run()!==FALSE){
             
            $mdp=$this->input->post('mdp'); 
            $id=$this->input->post('id'); 
           
            $this->Model_films->connexion($id,$mdp);
        }
    }

    public function inscription(){
        $_SESSION['erreur'] = null;
        $header_status = 'View_'.$_SESSION['status'];
        $data['header']=$header_status;
        $data['content']='inscriptionView';
        $this->load->vars($data);
        $this->load->view('template');

        $this->form_validation->set_rules('id','identifiant','required'); 
        $this->form_validation->set_rules('mdp','mot de passe','required');
        $this->form_validation->set_rules('mdpVerif','verification de mot de passe');
        $this->form_validation->set_rules('prenom','prenom','required'); 
        $this->form_validation->set_rules('nom','nom','required');
        
        if($this->form_validation->run()!==FALSE){

            $mdp=$this->input->post('mdp'); 
            $mdpverif=$this->input->post('mdpverif');
            $id=$this->input->post('id'); 
            $prenom=$this->input->post('prenom'); 
            $nom=$this->input->post('nom'); 

            $this->Model_films->inscription($id,$mdp,$prenom,$nom,$mdpverif);
        }
        
    }

    public function deconnexion(){
        //appel function deconnexion du modele
        $this->load->model('Model_films');
        $this->Model_films->deconnexion();
    }


}
    
        
?>