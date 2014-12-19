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
        private $mail;
		
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
            $this->mail                 =   new PHPMailer();
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
            $this->smarty->assign( "phpmailer_version", $this->mail->Version    );

            $this->smarty->assign( "page",      $this->getPage());
        }
		
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
        
        public function startSession() {
            session_start();
        }
        
        #--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		public function setPage() {
            
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
		
		private function getPage() {
            if(!$this->smarty->templateExists($this->page))
                $this->page = NOT_FOUND;
                
            return $this->page;
		}
        
		
		#--------------------------------------------------------------#
		#--------------------------------------------------------------#
		
		public function display() {
            $this->smarty->display( $this->mainpage . ".tpl" );
		}

	}
    
    
?>