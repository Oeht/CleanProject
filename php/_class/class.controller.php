<?php

	class Controller {
		
        private $GET;
        private $POST;
        private $FILE;
        
        private $page;
        private $display;
		private $smarty;
        
        private $section;
        private $subDir;
        private $errorDir;
        
        private $pdo;
        private $mail;
		
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		function __construct() {
			
            $this->GET                  =   $_GET;
            $this->POST                 =   $_POST;
            $this->FILES                =   $_FILES;
            
			$this->smarty				=	new Smarty();
			$this->smarty->template_dir	=	TEMPLATE_DIR;
			$this->smarty->compile_dir	=	COMPILE_DIR;
            
            $this->subDir               =   SUB_DIR;
            
            $this->section              =   false;
            
            $this->pdo                  =   new myPDO();
            $this->mail                 =   new PHPMailer();
            
            #fix for same tpl names in different folders
            $this->smarty->force_compile = true;
		}
        
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
        
        private function debug( $data, $headline = "", $file = false, $detailed = false, $die = false )
        {
            if(is_array($data))
            {
                echo "<pre>";
                
                if(!empty($headline))
                    echo "<h2>{$headline}</h2>";
                    
                if( !$detailed ) {
                    print_r( $data );
                }
                else {
                    var_dump( $data );
                }
                echo "</pre>";
                
                if($die)
                {
                    die();
                }
                
            }else{
            
                if($data == "") $data = "Die &Uuml;bergabe ist leer oder nicht gesetzt!";
              
                $div  = "<div style='background:red;position:absolute;top:0px;left:0px;padding:10px;'>";
                
                if($file) 
                    $div .= "<h6 style='color:yellow;'>FILE: " . $file . "</h6>";
                    
                $div .= "<h4>Debug-Value:</h4>";
                $div .= $data;
                $div .= "</div>";
                
                echo $div;

            }
        }
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
        
        public function startSession() {
            session_start();
        }
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		public function setPage() {
            
            if( isset( $this->GET["page"] ) )
            {
                $this->page = $this->GET["page"];
                
                if( isset( $this->GET["section"] ) )
                {
                    $this->section = $this->GET["section"];
                }
			}
            else
            {
                $this->page = "main";
            }
		}
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		private function getPage() {
            
            $page = $this->getFullPagePath();
            
            if(!$this->smarty->templateExists($page))
                $this->page = NOT_FOUND;
                
            return $this->page;
		}
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
        
        private function getFullPagePath(){
            
            return $this->subDir.($this->section?$this->section."/".$this->page:$this->page).".tpl";
        }
        
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		public function doAction() {
            
            // Seitensteuerung
            $this->setPage();
            
            // Gibt es eine PHP-Datei zum Template?
            if( file_exists( "php/_includes/inc." . $this->getPage() . ".php" ) )
                require_once( "php/_includes/inc." . $this->getPage() . ".php" );
		}
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		public function setTplVars() {
			
            
            $this->smarty->assign( "smarty_version",    SMARTY_VERSION          );
            $this->smarty->assign( "jquery_version",    JQUERY_VERSION          );
            $this->smarty->assign( "jqueryUI_version",  JQUERYUI_VERSION        );
            $this->smarty->assign( "bootstrap_version", BOOTSTRAP_VERSION       );
            $this->smarty->assign( "tinyMCE_version",   TINYMCE_VERSION         );
            $this->smarty->assign( "PNotify_version",   PNOTIFY_VERSION         );
            $this->smarty->assign( "phpmailer_version", $this->mail->Version    );

        }
		
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
        
        public function display() {
            
            $this->smarty->display( 'extends:layout.tpl|resources.tpl|menu.tpl|projectInfo.tpl|' . $this->getFullPagePath() );
		}

	}
    
    
?>