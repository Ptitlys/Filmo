<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $content;?> Site films</title>

        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("css/style.css"); ?> " />
    </head>
    <body>
        <header>
            <?php $this->load->view($header);?>
        </header>

        <article>
            <?php $this->load->view($content);?>
        </article>
            
        <footer>
            <strong>&copy;2021, Justin MAINTENAY, Chloé FOURNIER</strong>
            <script type="text/javascript" src="<?php echo base_url("bootstrap/js/jquery-3.1.1.js"); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.js"); ?>"></script>
        </footer>
    </body>

</html>
<style>
    *{
    margin-top:10px;
}
    footer {
        position:fixed;
        left: 0;
        bottom: 0;
        width: 100%;
}

a{
    font-size: 1.5em;
    
}
</style>