<?php

	class Controller {
		
        private $GET;
        private $POST;
        private $FILE;
        
        private $page;
        private $display;
		private $smarty;
        
        private $subDir;
        private $errorDir;
        
        private $pdo;
		
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		function Controller() {
			
            $this->GET                  =   $_GET;
            $this->POST                 =   $_POST;
            $this->FILES                =   $_FILES;
            
            $this->mainpage             =   "main";
            
			$this->smarty				=	new Smarty();
			$this->smarty->template_dir	=	TEMPLATE_DIR;
			$this->smarty->compile_dir	=	COMPILE_DIR;
            
            $this->subDir               =   SUB_DIR;
            
            $this->pdo                  =   new myPDO();
		}
		
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		function doAction() {
            
            // Seitensteuerung
            $this->setPage();
            
            // Gibt es eine PHP-Datei zum Template?
            if( file_exists( "php/_includes/inc." . $this->getPage() . ".php" ) )
                require_once( "php/_includes/inc." . $this->getPage() . ".php" );
		}
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		function setTplVars() {
			
            
            $this->smarty->assign( "smarty_version",    SMARTY_VERSION   );
            $this->smarty->assign( "jquery_version",    JQUERY_VERSION   );
            $this->smarty->assign( "jqueryUI_version",  JQUERYUI_VERSION );
            $this->smarty->assign( "bootstrap_version", BOOTSTRAP_VERSION);
            $this->smarty->assign( "tinyMCE_version",   TINYMCE_VERSION  );

            $this->smarty->assign( "page",      $this->getPage());
        }
		
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
        
        function startSession() {
            session_start();
        }
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		function setPage() {
            
            if( isset( $this->GET["page"] ))
                $this->page = $this->subDir . $this->GET["page"] . ".tpl";
			else{
            
                $main = "tpl/templates/" . $this->subDir . "main.tpl";
                
                //Zeigt Info wenn Main leer ist
                if(filesize($main) < 1)
                    $this->page = $this->subDir . "projectInfo.tpl";
                else
                    $this->page = $this->subDir . "main.tpl";
            }
		}
        
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		function getPage() {
            if(!$this->smarty->templateExists($this->page))
                $this->page = NOT_FOUND;
                
            return $this->page;
		}
        
		
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		function display() {
            $this->smarty->display( $this->mainpage . ".tpl" );
		}

	}
    
    
?>