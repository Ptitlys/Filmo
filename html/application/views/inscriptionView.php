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
    <h2>INSCRIPTION</h2>  
    <?php echo validation_errors();?> 
    <?php echo form_open('Controlleur_connexion/inscription')?> 
    
    <div class="row justify-content-center">

    <div class="col-1 pr-0 ">
    <label class="row justify-content-center" for="title">Identifiant</label>
    <label class="row justify-content-center" for="title">Mot de passe</label>
    <label class="row justify-content-center" for="title">Verif mdp</label>
    <label class="row justify-content-center" for="title">Prenom</label> 
    <label class="row justify-content-center" for="title">Nom</label>
    </div>

    <div id='A' class="col-1 pl-0">
    <input type="text" name ="id" required /><br/> 
    <input type="password" name ="mdp" required/><br/>
    <input type="password" name ="mdpVerif" required/><br/>
    <input type="text" name ="prenom" required/><br/>
    <input type="text" name ="nom" required/><br/>
    </div>

    </div>

    <input type="submit" name="submit" value ="Inscription"/> 

    
    

</form>
        
    </body>
</html>

<style>
* {
    text-align: center;
    
}

label{
    font-size: 1.1em;
}

input[type="text"],
input[type="password"]
{
    font_size:1.5em;
    background-color:#C4CBF2;
    color: black;
    border-radius: 10px;
}

input[type="submit"]{
    margin-top:30px;
    background-color:#7180D9;
    color: white;
    border-radius: 10px;
}
</style>