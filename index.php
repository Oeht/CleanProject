<?php
    
	# Config
	require_once( "php/config.php" );

	# Session
	$controller->startSession();

	# Actions
	$controller->doAction();

    # Variables
    $controller->setTplVars();
    
	# View
	$controller->display();
    
?>