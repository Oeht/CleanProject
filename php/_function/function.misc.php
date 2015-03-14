<?php

	
	function debug( $array, $description="", $detailed = false ) {
		
        
		echo "<h1>{$description}</h1><pre>";
		if( !$detailed ) {
			print_r( $array );
        }
		else {
			var_dump( $array );
		}
		echo "</pre>";
	}
	
	#--------------------------------------------------------------#
	#--------------------------------------------------------------#
	
    function create_log( $string ) {
    
        $dateiname = "log.txt";                 // Name der Datei
                                                // Datei öffnen, wenn nicht vorhanden dann wird die Datei erstellt.
        $handler = fOpen($dateiname , "w+");
        fWrite($handler , $string);             // Dateiinhalt in die Datei schreiben
        fClose($handler);                       // Datei schließen
    }
    
    function getLatestVersion($type, $versionOnly = false){
    
        $searchString['Smarty']     = "php/Smarty-*";
        $searchString['jQuery']     = "js/jQuery-*";
        $searchString['jQueryUI']   = "js/jQueryUI-*";
        $searchString['Bootstrap']  = "js/bootstrap-*";
        $searchString['TinyMCE']    = "js/tinyMCE-*";
        $searchString['PNotify']    = "js/PNotify-*";
       
        $versions = glob($searchString[$type]);

        $latest = array_reduce($versions, function ($latest, $folder) use ($searchString, $type, $versionOnly){
            if (!$latest) {
                #return $folder;
            }
            
            $sub = substr($searchString[$type],0,-1);

            $latestNum = preg_replace('!^' . $sub . '!', '', $latest);
            $folderNum = preg_replace('!^' . $sub . '!', '', $folder);

            if($versionOnly)
                return version_compare($latestNum, $folderNum, '>') ? $latestNum : $folderNum;
            else
                return version_compare($latestNum, $folderNum, '>') ? $latest : $folder;
        });
        return $latest;
    }
?>