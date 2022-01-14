<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Controlleur_films extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Model_films');
        
    }

    //affiche la page d'accueil/liste des films
   public function index(){
       if (empty($_SESSION['status'])){
        $_SESSION['status'] = 'visiteur';
       }
        $header_status = 'View_'.$_SESSION['status'];
        $data['header']=$header_status;
        $data['movielist']=$this->Model_films->get_films();
        $data['title']='FILMS DISPONIBLES'; 
        $data['content']='Liste_films'; 


        $this->load->vars($data);
        $this->load->view('template');
        

    }

    //affiche collection du collectionneur connecté
    public function collection(){
        $header_status = 'View_'.$_SESSION['status'];
        $data['header']=$header_status;
        $data['collection']=$this->Model_films->get_collection();
        $data['title']='VOTRE COLLECTION'; 
        $data['content']='view_collection';
        $this->load->vars($data);
        $this->load->view('template');
    }

    //affiche liste des collectionneur
    public function collectionneur(){
        $header_status = 'View_'.$_SESSION['status'];
        $data['header'] = $header_status;
        $data['collectionneurs'] = $this->Model_films->get_collectionneurs();
        $data['title']='LISTE DES COLLECTIONNEURS';
        $data['content']='view_des_collectionneurs';
        $this->load->vars($data);
        $this->load->view('template');
    }

    //supprime un collectionneur
    public function supprimer_collectionneur($id){
        $this->Model_films->supprimer_collectionneur($id);
    }

    public function ajout_film($idfilm){
        //si non connecté propose la connexion
        if($_SESSION['status']=='visiteur'){

            $header_status = 'View_'.$_SESSION['status'];
            $data['header']=$header_status;
            $data['content']='connexionView';
            $this->load->vars($data);
            $this->load->view('template');

        }
        //si connecter
        else if($_SESSION['status']=='collectionneur' || $_SESSION['status']=='admin'){
            
            //si moins de 5 films dans collection
            $result_test = $this->Model_films->test_ajouter_collection($idfilm);

            if($result_test == 0){
                $this->Model_films->ajouter_collection($idfilm);
            }
            //si le film est deja dans la collection
            elseif($result_test == -1){
                
            }
            //sinon
            else{
                $this->Model_films->supprimer_collection();
                $this->Model_films->ajouter_collection();
                
            }

            redirect('controlleur_films/collection');
        }
        
    }

    public function supprimer_film($idfilm){
        $this->Model_films->supprimer_film($idfilm);
        redirect('controlleur_films/collection');

    }
}
?>