<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Liste des collectionneurs</title>
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
        echo '<table>';
        echo '<tr> <th>Supprimer</th> <th>Nom</th> <th>Prénom</th> <th>ID</th> </tr>';
        foreach($collectionneurs as $collec){
            echo '<tr>';
            echo '<td> <a href="';
            echo base_url('index.php/Controlleur_films/supprimer_collectionneur/'.$collec['id']);
            echo '">Supprimer cet utilisateur</a></td>';
            echo '<td>'.$collec['nom'].'</td>';
            echo '<td>'.$collec['prenom'].'</td>';
            echo '<td>'.$collec['id'].'</td>';
        }       
        echo '</table>';
    
    ?>

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
    color:white;
}
table a:link{
    text-decoration:underline;
    font-size:1em;
}
table a:visited{
    text-decoration:underline;
    font-size:1em;
    color:white;
}
table{
    width:100%;
}

</style>