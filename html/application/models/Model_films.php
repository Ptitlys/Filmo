<?php
class Model_films extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_films(){
        $query = $this->db->get('movie');
        return $query->result_array();
    }

    public function deconnexion(){
        $_SESSION['id'] = null;
        $_SESSION['idcollec'] = null;
        $_SESSION['status'] = 'visiteur';
        redirect('Controlleur_films/index');
    }

    public function get_collection(){
    
        //retourne les id de film de la collection
        $this->db->select('idfilm');
        $this->db->from('collection');
        $this->db->where('id',$_SESSION['id']);
        $this->db->get();

        $sql = $this->db->last_query();
        $queryidfilms = $this->db->query($sql);
        $tab_id_films = $queryidfilms->result_array();

        if(!empty($tab_id_films)) {
        foreach($tab_id_films as $tab_id){
            foreach($tab_id as $idimdb){
            $liste_id[]=$idimdb;
            }
        }
        
        //cherche les films avec ces id
        $this->db->select('*');
        $this->db->from('movie');
        foreach($liste_id as $id){
            $this->db->or_where('idimdb',$id);
        
        }
        $this->db->order_by('release', 'desc');
        $this->db->get();
        

        $sql = $this->db->last_query();
        $queryfilms = $this->db->query($sql);
        
        return $queryfilms->result_array();
    }
    
        
    }

    public function get_collectionneurs(){
        $this->db->select('id, nom, prenom');
        $this->db->from('collectionneur');
        $this->db->get();
        $sql = $this->db->last_query();
        $queryCollectionneur = $this->db->query($sql);
        $tab_collectionneur = $queryCollectionneur->result_array();

        return $tab_collectionneur;
    }
    
    public function supprimer_collectionneur($id){
        $tables= array('collection', 'collectionneur');
        $this->db->where('id', $id);
        $this->db->delete($tables); 
        redirect('Controlleur_films/collectionneur');  
    }
    

    public function connexion($id_utilisateur,$mdp_utilisateur){

        //verif nom d'utilisateur
        //recuperation des nom d'utilisateurs
        $this->db->select('id');
        $this->db->from('collectionneur');
        $this->db->get();
        $sql = $this->db->last_query();
		$query = $this->db->query($sql);
        
        $tabID = $query->result_array();

        $X = 0;
        //parcours des identifiant pour trouvé une correspondance ou non
        foreach($tabID as $tabidentifiant){
            foreach($tabidentifiant as $identifiant){
                if($id_utilisateur == $identifiant){
                    $X = 1;
                }
            }
        }
        //si l'identifiant n'a pas été trouvé
        if($X < 1){
            //proposition d'une inscription
            $_SESSION['erreur']='identifiant inexistant peut être souhaitez vous vous créer un compte';
                $this->load->view('error');
            $this->load->view('inscriptionView');
        }

        //Si identifiant existe test du mot de passe
        else{
        //verif mot de passe
        $this->db->select('motdepasse');
        $this->db->from('collectionneur');
        $this->db->where('id', $id_utilisateur);
        $this->db->get();
        $sql = $this->db->last_query();
		$query = $this->db->query($sql);
        
        $tab = $query->result_array();

        if($tab['0']['motdepasse'] != $mdp_utilisateur){
            $_SESSION['erreur']='mot de passe entré incorrect';
            $this->load->view('error');
        }
        else{

            $_SESSION['id'] = $id_utilisateur;

            if($id_utilisateur == "admin"){
                $_SESSION['status'] = 'admin';
            }
            else{
                $_SESSION['status'] = 'collectionneur';
            }
            redirect('Controlleur_films/collection');
        }
        }

        
    }


    public function inscription($id_utilisateur,$mdp_utilisateur,$nom,$prenom,$mdpverif){
        //recuperer tout les id utilisateur
        $this->db->select('id');
        $this->db->from('collectionneur');
        $this->db->get();
		$sql = $this->db->last_query();
		$query = $this->db->query($sql);
        $tab = $query->result_array();


        //verifier nom d'utilisateur pas utilisé ou message
        $condition = 0;
        foreach($tab as $identifiant){
            foreach($identifiant as $id){
            if($id_utilisateur == $id){
                $_SESSION['erreur']='identifiant indisponible';
                $this->load->view('error');
                $condition = -1;
            }
        }
        }

        if($mdp_utilisateur == $mdpverif && $condition != -1){
            $_SESSION['erreur']='les deux mots de passe sont différents';
            $this->load->view('error');
            $condition = -1;
        }
        
         //sinon enregistrer l'inscription et afficher un message
        //creation collectionneur
        if($condition >=0){
            $data_user = array(
                'id' => $id_utilisateur,
                'nom' => $nom,
                'prenom' => $prenom,
                'motdepasse' => $mdp_utilisateur
            );
            $this->db->insert('collectionneur',$data_user);
            $_SESSION['id'] = $id_utilisateur;

            $_SESSION['status'] = 'collectionneur';

            redirect('Controlleur_films/collection');
        }
        
    }

    public function ajouter_collection($titre_films){
        $_SESSION['recent']=$titre_films;
        $this->db->select('idimdb');
        $this->db->from('movie');
        $this->db->where('idimdb',$titre_films);
        $this->db->get();
		$sql = $this->db->last_query();
		$query = $this->db->query($sql);


        $tab = $query->result_array();

        foreach($tab as $idfilm){
            foreach($idfilm as $id){
                $data_user = array(
                    'id' => $_SESSION['id'],
                    'idfilm' => $id
                );
                $this->db->insert('collection',$data_user);
            }
        }

    }

    public function test_ajouter_collection($idfilm){
        //retourne nb de film collection et ceux deja present
        $this->db->select('idfilm');
        $this->db->from('collection');
        $this->db->where('id',$_SESSION['id']);
        $this->db->get();
		$sql = $this->db->last_query();
        $query = $this->db->query($sql);
        $nb=$query->num_rows();
 
        $sql = $this->db->last_query();
        $queryidfilms = $this->db->query($sql);
        $tab_id_films = $query->result_array();

        $condition = 0;

        if(!empty($tab_id_films)) {
        foreach($tab_id_films as $tab_id){
            foreach($tab_id as $idimdb){
            if($idfilm==$idimdb){
                $condition = -1;
            }
            }
        }
        }

        if($nb >= 5){
            $result = 1;
            return $result;
        }

        elseif($condition == -1){
            $result = -1;
            return $result;
        }

        else{
            $result = 0;
            return $result;
        }

    }

    public function supprimer_collection(){
        $this->db->select('idfilm');
        $this->db->from('collection');
        $this->db->where('idfilm',$_SESSION['recent']);
        $this->db->where('id',$_SESSION['id']);
        
        $this->db->get();
		$sql = $this->db->last_query();
        $query = $this->db->query($sql);

        $film=$query->first_row();

        foreach($film as $idfilm){
            $this->db->where('idfilm',$idfilm);
            $this->db->delete('collection');
        }
        

    
    }

    public function supprimer_film($id_films){
        $this->db->where('idfilm',$id_films);
        $this->db->where('id',$_SESSION['id']);
        $this->db->delete('collection');
        

    
    }


        
       
}

?>