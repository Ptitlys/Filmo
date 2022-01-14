
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Connexion</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="HTML, CSS, XML, JavaScript">
        <meta name="chloe fournier" content="IUT de Lannion">
    </head>

    <body>
    <h2>CONNEXION</h2> 
    <?php echo form_open('Controlleur_connexion/connexion')?> 
    <?php echo validation_errors();?> 

    <div id="connexion" >
        
<div class="row justify-content-center">
    <div class="col-1 pr-0">
    <label for="title">Identifiant</label> 
    <label for="title">Mot de passe</label>
    </div> 

    <div class="col-1 pl-0">
    <input type="text" name ="id" required/><br/>
    <input type="password" name ="mdp" required/><br/> 
    </div>
</div>

    <input class="mt-3" type="submit" name="submit" value ="Connexion"/>
</div> 
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

#connexion{
    margin-bottom: 20px;
}

input[type="password"]{
    background-color:#C4CBF2;
    color:black;
    border-radius: 10px;
}

input[type="text"]{
    font_size:1.5em;
    background-color:#C4CBF2;
    color: black;
    border-radius: 10px;
}

input[type="submit"]{
    background-color:#7180D9;
    color: white;
    border-radius: 10px;
}
</style>





</style>