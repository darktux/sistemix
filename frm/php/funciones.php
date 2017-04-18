<?php 
	function numeroATexto($numero){



		$unidades = array(
			//"0"=>"cero",
			"1"=>"uno", 
			"2"=>"dos", 
			"3"=>"tres", 
			"4"=>"cuatro", 
			"5"=>"cinco", 
			"6"=>"seis", 
			"7"=>"siete", 
			"8"=>"ocho", 
			"9"=>"nueve", 
			"10"=>"diez", 
			"11"=>"once", 
			"12"=>"doce", 
			"13"=>"trece", 
			"14"=>"catorce", 
			"15"=>"quince", 
			"16"=>"dieciséis", 
			"17"=>"diecisiete", 
			"18"=>"dieciocho", 
			"19"=>"diecinueve", 
			"20"=>"veinte", 
			"21"=>"veintiuno", 
			"22"=>"veintidós", 
			"23"=>"veintitrés", 
			"24"=>"veinticuatro", 
			"25"=>"veinticinco", 
			"26"=>"veintiséis", 
			"27"=>"veintisiete", 
			"28"=>"veintiocho", 
			"29"=>"veintinueve"
		);

		$decenas = array(
			"3"=>"treinta",
			"4"=>"cuarenta",
			"5"=>"cincuenta",
			"6"=>"sesenta",
			"7"=>"setenta",
			"8"=>"ochenta",
			"9"=>"noventa"
			);

		$centenas = array(
			"1"=>"ciento", 
			"2"=>"doscientos", 
			"3"=>"trescientos", 
			"4"=>"cuatrocientos", 
			"5"=>"quinientos", 
			"6"=>"seiscientos", 
			"7"=>"setecientos", 
			"8"=>"ochocientos", 
			"9"=>"novecientos"
			);

		$milenas = array(
			"1"=>"mil", 
			"2"=>"dos mil", 
			"3"=>"tres mil", 
			"4"=>"cuatro mil", 
			"5"=>"cinco mil", 
			"6"=>"seis mil", 
			"7"=>"siete mil", 
			"8"=>"ocho mil", 
			"9"=>"nueve mil"
			);


		if ($numero < 30) {
			$texto = $unidades[$numero];
		}

		elseif ($numero < 100) {
			$decena = substr($numero, 0, 1);
			$unidad = substr($numero, 1, 1);
			$texto = $decenas[$decena];
			if ($unidad != 0) {
				$texto .= " y " . $unidades[$unidad];
			}
		}

		elseif ($numero < 101) {
			$texto = "cien";
		}

		elseif ($numero < 1000) {
			$centena = substr($numero, 0, 1);
			$numero = substr($numero, 1, 2);
			$texto = $centenas[$centena];
			if ($numero < 30) {
				if ($numero < 10) {
					$unidad = substr($numero, 1, 1);
					$texto .= " " . $unidades[$unidad];
				}
				else{
					$texto .= " " . $unidades[$numero];
				}
			}
			else{
				$decena = substr($numero, 0, 1);
				$unidad = substr($numero, 1, 1);
				$texto .= " " . $decenas[$decena];
				if ($unidad != 0) {
					$texto .= " y " . $unidades[$unidad];
				}
			}
		}

		elseif ($numero < 10000) {
			$milena = substr($numero, 0, 1);
			$numero = substr($numero, 1, 3);
			$texto = $milenas[$milena] . " ";
			/**/
				if ($numero ==100) {
					$texto .= "cien";
				}
				else{
					$centena = substr($numero, 0, 1);
					$numero = substr($numero, 1, 2);
					$texto .= $centenas[$centena];
				}

				if ($numero < 30) {
					if ($numero < 10) {
						$unidad = substr($numero, 1, 1);
						$texto .= " " . $unidades[$unidad];
					}
					else{
						$texto .= " " . $unidades[$numero];
					}
				}
				else{
					$decena = substr($numero, 0, 1);
					$unidad = substr($numero, 1, 1);
					$texto .= " " . $decenas[$decena];
					if ($unidad != 0) {
						$texto .= " y " . $unidades[$unidad];
					}
				}
			/**/
		}


		return trim($texto);
	}

	function edad($fecha){
    	$fecha = str_replace("/","-",$fecha);
    	$fecha = date('Y/m/d',strtotime($fecha));
    	$hoy = date('Y/m/d');
    	$edad = $hoy - $fecha;
    	return $edad;
	}
?>