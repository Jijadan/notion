<?php
# Version 1.2 by davidmartindel  (http://es.wikiquote.org/wiki/Usuario_Discusión:Davidmartindel) under GPL license
$semana = date("D");
$semanaArray = array( "Mon" => "lunes", "Tue" => "martes", "Wed" => "miércoles", "Thu" => "jueves", "Fri" => "viernes", "Sat" => "sábado", "Sun" => "domingo", ); 
$title=urlencode(sprintf('{{Plantilla:Frase-%s}}', $semanaArray[$semana]));
$sock = fopen("http://es.wikiquote.org/w/api.php?action=parse&format=php&text=$title","r");
if (!$sock) {
  echo "$errstr ($errno)<br/>\n"; ##Error si no ha sido posible
} else
	{
    
	# Hacemos la peticion al servidor
	$array__ = unserialize(stream_get_contents($sock));
	$texto_final=$array__["parse"]["text"]["*"];
    
	$texto_final=utf8_decode( $texto_final);
	$texto_final=str_replace ('/wiki/', 'http://es.wikiquote.org/wiki/' ,$texto_final );
	$texto_final=str_replace ('a href=', 'a target="_blank" href=' ,$texto_final );
	$texto_final=str_replace ('/w/index.php?title=', 'http://es.wikiquote.org/w/index.php?title=' ,$texto_final );
    
	#mostramos en pantalla la frase
    echo $texto_final;
                
}
?>
