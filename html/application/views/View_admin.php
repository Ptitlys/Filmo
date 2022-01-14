<nav>
    <div class ="row ">
    <div class="pl-5">
        <!--logo retour accueil-->
        <a href="<?php echo base_url('index.php/Controlleur_films/index') ?>"><img src='<?php echo base_url('images/logoPHP.png') ?>' height=150></a>
    </div>
    
    <div class="row align-items-center pl-5">
    
        <!--Liste des collectionneur-->
        <div>
        <a href="<?php echo base_url('index.php/Controlleur_films/collectionneur') ?>">LISTE DES COLLECTIONNEURS</a>
        </div>

        <!--Votre collection-->
        <div class= "pl-5">
        <a href="<?php echo base_url('index.php/Controlleur_films/collection') ?>">VOTRE COLLECTION</a>
        </div>

        <!--déconnexion-->
        <div class= "pl-5">
        <a href="<?php echo base_url('index.php/Controlleur_connexion/deconnexion') ?>">DECONNEXION</a>
        </div>

    </div>
</nav>