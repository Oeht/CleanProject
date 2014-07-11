<?php
    
	# Debugging
	#--------------------------------------------------------------#
    error_reporting( E_ALL );
	ini_set( "display_errors", 			"1" );
    ini_set( "display_startup_errors", 	"1"	);
	#--------------------------------------------------------------#
    
	$latest_smarty_version = "3.1.19";

	# Libary-phps
	#--------------------------------------------------------------#
	require_once( "php/Smarty-" .$latest_smarty_version . "/libs/Smarty.class.php" 	);
	require_once( "php/_class/class.controller.php" 	);
	require_once( "php/_function/function.misc.php" 	);
	#--------------------------------------------------------------#
	
	
	# Constants
	#--------------------------------------------------------------#
	define( "TEMPLATE_DIR",	"tpl/templates/"	);
	define( "COMPILE_DIR",	"tpl/templates_c/"	);
	#--------------------------------------------------------------#
	
	# Pathes
	#--------------------------------------------------------------#
	define( "SUB_DIR",      "pages/"    );
	define( "ERROR_DIR",    "errors/"   );
	#--------------------------------------------------------------#
    
    # Pathes
	#--------------------------------------------------------------#
	define( "BAD_REQUEST",	    ERROR_DIR . "400.tpl"   );
	define( "UNAUTHORIZED",	    ERROR_DIR . "401.tpl"   );
	define( "FORBIDDEN",        ERROR_DIR . "403.tpl"   );
	define( "NOT_FOUND",        ERROR_DIR . "404.tpl"   );

	#--------------------------------------------------------------#
    
	# Initialization
	#--------------------------------------------------------------#
	$controller	=	new Controller();	
	#--------------------------------------------------------------#
    
  
?>