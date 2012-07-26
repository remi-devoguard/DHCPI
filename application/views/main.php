<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width" />
        <link rel="shortcut icon" href=<?php echo base_url("images/favicon.ico"); ?> type="image/x-icon" />
        <title>DHCPI</title>

        <!-- Included CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url("stylesheets/foundation.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("stylesheets/app.css"); ?>">

        <!--[if lt IE 9]>
                <link rel="stylesheet" href="stylesheets/ie.css">
        <![endif]-->

        <script src="<?php echo base_url("javascripts/modernizr.foundation.js"); ?>"></script>

        <!-- IE Fix for HTML5 Tags -->
        <!--[if lt IE 9]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->



        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <style type='text/css'>
            body
            {
                font-family: Arial;
                font-size: 14px;
            }
            a {
                color: blue;
                text-decoration: none;
                font-size: 14px;
            }
            a:hover
            {
                text-decoration: underline;
            }
        </style>



    </head>
    <body>

        <!-- container -->
        <div class="container">
            <br>
            <div class="row">
                <div class="six columns">
                    <h2>DHCPI</h2>
                    <p>Gestionnaire DHCP</p>

                </div>
                <div class="two columns">
                    <img src="<?php echo base_url("images/Octopus.png"); ?>"/>

                </div>   
            </div>
            <br/>
            <div class="row">


                <div class="twelve columns">
                    
                    <dl class="nice contained tabs">
                        <dd><a href="<?php echo site_url('machines') ?>" <?php if ($this->uri->segment(1) == "machines") echo 'class="active"'; ?>>Machines</a></dd>
                        <dd><a href="<?php echo site_url('vlans') ?>"<?php if ($this->uri->segment(1) == "vlans") echo 'class="active"'; ?>>Vlans</a></dd>
                        <dd><a href="<?php echo site_url('partages') ?>"<?php if ($this->uri->segment(1) == "partages") echo 'class="active"'; ?>>Réseaux Partagés</a></dd>
                        <dd><a href="<?php echo site_url('utilisateurs') ?>"<?php if ($this->uri->segment(1) == "utilisateurs") echo 'class="active"'; ?>>Utilisateurs</a></dd>
                        <dd><a href="<?php echo site_url('configuration') ?>"<?php if ($this->uri->segment(1) == "configuration") echo 'class="active"'; ?>>Options Globales</a></dd>
                        <dd><a href="<?php echo site_url('login/logout') ?>">Logout</a></dd>
                    </dl>

                    <br/>
                    <?php
                    if ($this->session->flashdata('erreur') == 'ok') {
                        echo '<div class="alert-box success">Fichier de configuration généré !</div>';
                    } else if ($this->session->flashdata('erreur') == 'nok') {
                        echo '<div class="alert-box error">Erreur lors de la génération du fichier de configuration !</div>';
                    }
                    ?>

                    <!--<h3><?php echo ucwords($this->uri->segment(1)); ?></h3>-->

                    <?php echo $output; ?>

                    <div class="row">
                        <div class="three columns end"><a href="<?php echo site_url('configuration/make') ?>" class="small blue button">Appliquer modifications</a></div>
                    </div>


                </div>


            </div>
            <!-- container -->
            <div class="row">
                <div class="three columns centered red">
                    DHCPI v0.2 par Rémi
                </div>
            </div>


            <!-- Included JS Files -->
            <script src="javascripts/jquery.min.js"></script>
            <script src="javascripts/foundation.js"></script>
            <script src="javascripts/app.js"></script>

    </body>
</html>
