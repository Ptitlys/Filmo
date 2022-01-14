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
            echo $title ?>
        </h2>
        <?php 
            echo '<table>';
            echo '<tr>  <th>Ajouter</th><th>Titre</th> <th>Durée</th> <th>Résumé</th> <th style="width:80px">Date de sortie</th> <th>Note</th> <th>Poster</th></tr>';

            foreach($movielist as $movie):
                echo ' <tr> <td> <a id="film" href="';
                echo base_url('index.php/Controlleur_films/ajout_film/'.$movie['idimdb']);
                echo '" ><p>Ajouter '.$movie['title'].'  à votre collection</p> </a></td>
                <td>'.$movie['title'].'</td>
                <td>'.$movie['runtime'].'</td> 
                <td>'.$movie['overview'].'</td> 
                <td>'.$movie['release'].'</td> 
                <td>'.$movie['rating'].'</td> 
                <td> <img src='.$movie['poster'].' height=250>  </td></tr>';
            endforeach;
            echo '</table>';
        ?>

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
