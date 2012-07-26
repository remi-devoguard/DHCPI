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

		<div class="row">
			<div class="eight columns">
                            <br/><br/>
				<h2>DHCPI</h2>
			</div>
                    <div class="two columns end">
                        <br/><br/>
                        <img src="<?php echo base_url("images/Octopus.png"); ?>"/>
                    </div> 
                    <div class="row">
                        <div class="four columns centered">
                    <?php
                            echo validation_errors();
                            echo form_open('login/login');
                            echo form_label('Login<br/>');
                            echo form_input(array('name' => 'Login', 'size' => '25', 'value' => value_field('Login'))), "<br/>";
                            echo form_label('Password<br/>');
                            echo form_input(array('name' => 'Password', 'id' => 'Password', 'type'=>'password',  'size' => '25', 'value' => value_field('Password'))), "<br/>";
                            echo form_submit('submit', 'Go !');
                            echo form_close();

                            function value_field($field, $default='') {
                                return (isset($_POST[$field])) ? $_POST[$field] : $default;
                            }
                      ?>
                        </div>
                    </div>
		</div>
	</div>
	<!-- container -->




	<!-- Included JS Files -->
	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>

</body>
</html>
