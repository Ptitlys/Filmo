<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Inscription</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="HTML, CSS, XML, JavaScript">
        <meta name="chloe fournier" content="IUT de Lannion">
    </head>

    <body>
    <h2>
        <?php 
        echo $title
        ?>
    </h2>
        <?php 
                if(is_array($collection)){
                echo '<table>';
                echo '<tr> <th>Supprimer</th> <th>Titre</th> <th>Durée</th> <th>Résumé</th> <th>Date de sortie</th> <th>Note</th> <th>Poster</th></tr>';
                foreach($collection as $filmcollec):
                    echo ' <tr> <td> <a id="film" href="';
                    echo base_url('index.php/Controlleur_films/supprimer_film/'.$filmcollec['idimdb']);
                    echo '" ><p>Supprimer '.$filmcollec['title'].' de votre collection</p> </a></td>
                    <td>'.$filmcollec['title'].'</td>
                    <td>'.$filmcollec['runtime'].'</td> 
                    <td>'.$filmcollec['overview'].'</td> 
                    <td>'.$filmcollec['release'].'</td> 
                    <td>'.$filmcollec['rating'].'</td> 
                    <td> <img src='.$filmcollec['poster'].' height=250>  </td></tr>';
                endforeach;
                echo '</table>';
            }
            else{
                echo 'votre collection est vide pourquoi ne pas ajouter des films?';
                echo "<br>";
                
                echo 'lien bouton ajouter qui pointe vers collection tout films :)';

            }
            
        ?> 
        <a href="<?php echo base_url('index.php/Controlleur_films/index') ?>">Ajouter</a>
</form>
        
    </body>
</html>

<style>
* {
    text-align: center;
    
}

table td,
table tr,
table th{
    padding-right:5px;
    padding-left:5px;
    border: 2px solid #C4CBF2;
}

table tr:nth-child(odd){
    background-color: #7180D9;
}
a:link{
    font-size: 1.5em;
}

#film{
    color: white;
    text-decoration: underline;
    font-size: 1em;
}

</style>