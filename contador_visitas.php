<?php
   function contadorvisitas($incrementar)
    {    
        $archivo = "contadorvisitas.txt";
        $f = fopen($archivo, "r"); 
        if($f)
        {
            $contadorvisitas = fread($f, filesize($archivo)); 
            if($incrementar === true)
             {
            $contadorvisitas = $contadorvisitas + 1;
              }
            fclose($f);
        }

        $f = fopen($archivo, "w+");
        
        if($f)
        {
            fwrite($f, $contadorvisitas);
            fclose($f);
        }
        return $contadorvisitas;      
    }
?>

    