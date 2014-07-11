<?php

	
	function debug( $array, $detailed = false ) {
		
		echo "<pre>";
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
    
        $dateiname = "log.txt"; // Name der Datei

        // Datei öffnen, wenn nicht vorhanden dann wird die Datei erstellt.
        $handler = fOpen($dateiname , "w+");
        fWrite($handler , $string); // Dateiinhalt in die Datei schreiben
        fClose($handler); // Datei schließen
    }
?>