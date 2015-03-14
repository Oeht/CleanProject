<?php
    
	# Debugging
	#--------------------------------------------------------------#
    error_reporting( E_ALL );
	ini_set( "display_errors", 			"1" );
    ini_set( "display_startup_errors", 	"1"	);
	#--------------------------------------------------------------#
    
    #Function and Info
    require_once( "php/_function/function.misc.php" 	);
    
    define( "SMARTY_LATEST",     getLatestVersion("Smarty")          );
    define( "SMARTY_VERSION",    getLatestVersion("Smarty", true)    );
    define( "JQUERY_VERSION",    getLatestVersion("jQuery", true)    );
    define( "JQUERYUI_VERSION",  getLatestVersion("jQueryUI", true)  );
    define( "BOOTSTRAP_VERSION", getLatestVersion("Bootstrap", true) );
    define( "TINYMCE_VERSION",   getLatestVersion("TinyMCE", true)   );
    define( "PNOTIFY_VERSION",   getLatestVersion("PNotify", true)   );

	# Library-phps
	#--------------------------------------------------------------#
	require_once( SMARTY_LATEST . "/libs/Smarty.class.php" 	);
	require_once( "php/_class/class.myPDO.php" 	            );
	require_once( "php/_class/class.controller.php" 	    );
	require_once( "php/_class/class.phpmailer.php" 	        );
	
	#--------------------------------------------------------------#
	
    # Database
	#------------------------------------------------------------------------#
    define( "PDO_DSN",      "mysql:host=127.0.0.1;dbname=putDBNameHere" );
    define( "PDO_USER",     "putUsernameHere"                           );
    define( "PDO_PASS",     "putPasswordHere"                           );
	
	# Constants
	#--------------------------------------------------------------#
	define( "TEMPLATE_DIR",	"tpl/templates/"	);
	define( "COMPILE_DIR",	"tpl/templates_c/"	);
	#--------------------------------------------------------------#
	
	# Pathes
	#--------------------------------------------------------------#
	define( "SUB_DIR",          "pages/"                );
	define( "ERROR_DIR",        "errors/"               );
	define( "BAD_REQUEST",	    ERROR_DIR . "400"       );
	define( "UNAUTHORIZED",	    ERROR_DIR . "401"       );
	define( "FORBIDDEN",        ERROR_DIR . "403"       );
	define( "NOT_FOUND",        ERROR_DIR . "404"       );

	#--------------------------------------------------------------#
    
	# Initialization
	#--------------------------------------------------------------#
	$controller	=	new Controller();	
	#--------------------------------------------------------------#
    
  
?>