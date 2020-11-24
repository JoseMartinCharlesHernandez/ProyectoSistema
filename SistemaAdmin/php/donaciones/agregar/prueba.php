     <?php 
            //convierto las dos fechas como un tipo de dato DateTime:

            $hoy= date('d-m-Y');
            $donacion = new DateTime("2020-06-01");
            $fechainicial = new DateTime($hoy);

            //calculo la diferencia entre la fecha de la
            $diferencia = $donacion->diff($fechainicial);

            $meses = ( $diferencia->y * 12 ) + $diferencia->m;

            if($meses>=6){
           
            }

    
           ?>
