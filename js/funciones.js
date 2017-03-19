
function cargarDepartamentos(iddep){
	var dep = $("#" + iddep);

	dep.append("<option value='Ahuachapán'>Ahuachapán</option>");
	dep.append("<option value='Cabañas'>Cabañas</option>");
	dep.append("<option value='Chalatenango'>Chalatenango</option>");
	dep.append("<option value='Cuscatlán' selected>Cuscatlán</option>");
	dep.append("<option value='La Libertad'>La Libertad</option>");
	dep.append("<option value='La Paz'>La Paz</option>");
	dep.append("<option value='La Unión'>La Unión</option>");
	dep.append("<option value='Morazán'>Morazán</option>");
	dep.append("<option value='San Miguel'>San Miguel</option>");
	dep.append("<option value='San Salvador'>San Salvador</option>");
	dep.append("<option value='San Vicente'>San Vicente</option>");
	dep.append("<option value='Santa Ana'>Santa Ana</option>");
	dep.append("<option value='Sonsonate'>Sonsonate</option>");
	dep.append("<option value='Usulután'>Usulután</option>");
	$('select').material_select();
}

function cargarMunicipios(iddep, idmun){
	
	var dep = $("#" + iddep);
	var mun = $("#" + idmun);
	mun.children().remove();
	
	
	switch(dep.val()){
		case 'Ahuachapán':
			mun.append("<option value='Ahuachapán' selected>Ahuachapán</option>");
			mun.append("<option value='Jujutla'>Jujutla</option>");
			mun.append("<option value='Atiquizaya'>Atiquizaya</option>");
			mun.append("<option value='Concepción de Ataco'>Concepción de Ataco</option>");
			mun.append("<option value='El Refugio'>El Refugio</option>");
			mun.append("<option value='Guaymango'>Guaymango</option>");
			mun.append("<option value='Apaneca'>Apaneca</option>");
			mun.append("<option value='San Francisco Menéndez'>San Francisco Menéndez</option>");
			mun.append("<option value='San Lorenzo'>San Lorenzo</option>");
			mun.append("<option value='San Pedro Puxtla'>San Pedro Puxtla</option>");
			mun.append("<option value='Tacuba'>Tacuba</option>");
			mun.append("<option value='Turín'>Turín</option>");
			break;
		case 'Cabañas':
			mun.append("<option value='Cinquera'>Cinquera</option>");
			mun.append("<option value='Villa Dolores'>Villa Dolores</option>");
			mun.append("<option value='Guacotecti'>Guacotecti</option>");
			mun.append("<option value='Ilobasco' selected>Ilobasco</option>");
			mun.append("<option value='Jutiapa'>Jutiapa</option>");
			mun.append("<option value='San Isidro'>San Isidro</option>");
			mun.append("<option value='Sensuntepeque'>Sensuntepeque</option>");
			mun.append("<option value='Ciudad de Tejutepeque'>Ciudad de Tejutepeque</option>");
			mun.append("<option value='Victoria'>Victoria</option>");
			break;
		case 'Chalatenango':
			mun.append("<option value='Agua Caliente'>Agua Caliente</option>");
			mun.append("<option value='Arcatao'>Arcatao</option>");
			mun.append("<option value='Azacualpa'>Azacualpa</option>");
			mun.append("<option value='Chalatenango' selected>Chalatenango</option>");
			mun.append("<option value='Citalá'>Citalá</option>");
			mun.append("<option value='Comalapa'>Comalapa</option>");
			mun.append("<option value='Concepción Quezaltepeque'>Concepción Quezaltepeque</option>");
			mun.append("<option value='Dulce Nombre de María'>Dulce Nombre de María</option>");
			mun.append("<option value='El Carrizal'>El Carrizal</option>");
			mun.append("<option value='El Paraíso'>El Paraíso</option>");
			mun.append("<option value='La Laguna'>La Laguna</option>");
			mun.append("<option value='La Palma'>La Palma</option>");
			mun.append("<option value='La Reina'>La Reina</option>");
			mun.append("<option value='Las Vueltas'>Las Vueltas</option>");
			mun.append("<option value='Nombre de Jesús'>Nombre de Jesús</option>");
			mun.append("<option value='Nueva Concepción'>Nueva Concepción</option>");
			mun.append("<option value='Nueva Trinidad'>Nueva Trinidad</option>");
			mun.append("<option value='Ojos de Agua'>Ojos de Agua</option>");
			mun.append("<option value='Potonico'>Potonico</option>");
			mun.append("<option value='San Antonio de la Cruz'>San Antonio de la Cruz</option>");
			mun.append("<option value='San Antonio Los Ranchos'>San Antonio Los Ranchos</option>");
			mun.append("<option value='San Fernando'>San Fernando</option>");
			mun.append("<option value='San Francisco Lempa'>San Francisco Lempa</option>");
			mun.append("<option value='San Francisco Morazán'>San Francisco Morazán</option>");
			mun.append("<option value='San Ignacio'>San Ignacio</option>");
			mun.append("<option value='San Isidro Labrador'>San Isidro Labrador</option>");
			mun.append("<option value='San José Cancasque'>San José Cancasque</option>");
			mun.append("<option value='San José Las Flores'>San José Las Flores</option>");
			mun.append("<option value='San Luis del Carmen'>San Luis del Carmen</option>");
			mun.append("<option value='San Miguel de Mercedes'>San Miguel de Mercedes</option>");
			mun.append("<option value='San Rafael'>San Rafael</option>");
			mun.append("<option value='Santa Rita'>Santa Rita</option>");
			mun.append("<option value='Tejutla'>Tejutla</option>");
			break;
		case "Cuscatlán":
			mun.append("<option value='Candelaria'>Candelaria</option>");
			mun.append("<option value='Cojutepeque' selected>Cojutepeque</option>");
			mun.append("<option value='El Carmen'>El Carmen</option>");
			mun.append("<option value='El Rosario'>El Rosario</option>");
			mun.append("<option value='Monte San Juan'>Monte San Juan</option>");
			mun.append("<option value='Oratorio de Concepción'>Oratorio de Concepción</option>");
			mun.append("<option value='San Bartolomé Perulapía'>San Bartolomé Perulapía</option>");
			mun.append("<option value='San Cristóbal'>San Cristóbal</option>");
			mun.append("<option value='San José Guayabal'>San José Guayabal</option>");
			mun.append("<option value='San Pedro Perulapán'>San Pedro Perulapán</option>");
			mun.append("<option value='San Rafael Cedros'>San Rafael Cedros</option>");
			mun.append("<option value='San Ramón'>San Ramón</option>");
			mun.append("<option value='Santa Cruz Analquito'>Santa Cruz Analquito</option>");
			mun.append("<option value='Santa Cruz Michapa'>Santa Cruz Michapa</option>");
			mun.append("<option value='Suchitoto'>Suchitoto</option>");
			mun.append("<option value='Tenancingo'>Tenancingo</option>");
			break;
		case "La Libertad":
			mun.append("<option value='Antiguo Cuscatlán'>Antiguo Cuscatlán</option>");
			mun.append("<option value='Chiltiupán'>Chiltiupán</option>");
			mun.append("<option value='Ciudad Arce'>Ciudad Arce</option>");
			mun.append("<option value='Colón'>Colón</option>");
			mun.append("<option value='Comasagua'>Comasagua</option>");
			mun.append("<option value='Huizúcar'>Huizúcar</option>");
			mun.append("<option value='Jayaque'>Jayaque</option>");
			mun.append("<option value='Jicalapa'>Jicalapa</option>");
			mun.append("<option value='La Libertad' selected>La Libertad</option>");
			mun.append("<option value='Nueva San Salvador'>Nueva San Salvador</option>");
			mun.append("<option value='Nuevo Cuscatlán'>Nuevo Cuscatlán</option>");
			mun.append("<option value='Opico'>Opico</option>");
			mun.append("<option value='Quezaltepeque'>Quezaltepeque</option>");
			mun.append("<option value='Sacacoyo'>Sacacoyo</option>");
			mun.append("<option value='San José Villanueva'>San José Villanueva</option>");
			mun.append("<option value='San Matías'>San Matías</option>");
			mun.append("<option value='San Pablo Tacachico'>San Pablo Tacachico</option>");
			mun.append("<option value='Talnique'>Talnique</option>");
			mun.append("<option value='Tamanique'>Tamanique</option>");
			mun.append("<option value='Teotepeque'>Teotepeque</option>");
			mun.append("<option value='Tepecoyo'>Tepecoyo</option>");
			mun.append("<option value='Zaragoza'>Zaragoza</option>");
			break;
		case "La Paz":
			mun.append("<option value='Cuyultitán'>Cuyultitán</option>");
			mun.append("<option value='El Rosario'>El Rosario</option>");
			mun.append("<option value='Jerusalén'>Jerusalén</option>");
			mun.append("<option value='Mercedes La Ceiba'>Mercedes La Ceiba</option>");
			mun.append("<option value='Olocuilta'>Olocuilta</option>");
			mun.append("<option value='Paraíso de Osorio'>Paraíso de Osorio</option>");
			mun.append("<option value='San Antonio Masahuat'>San Antonio Masahuat</option>");
			mun.append("<option value='San Emigdio'>San Emigdio</option>");
			mun.append("<option value='San Francisco Chinameca'>San Francisco Chinameca</option>");
			mun.append("<option value='San Juan Nonualco'>San Juan Nonualco</option>");
			mun.append("<option value='San Juan Talpa'>San Juan Talpa</option>");
			mun.append("<option value='San Juan Tepezontes'>San Juan Tepezontes</option>");
			mun.append("<option value='San Luis La Herradura'>San Luis La Herradura</option>");
			mun.append("<option value='San Luis Talpa'>San Luis Talpa</option>");
			mun.append("<option value='San Miguel Tepezontes'>San Miguel Tepezontes</option>");
			mun.append("<option value='San Pedro Masahuat'>San Pedro Masahuat</option>");
			mun.append("<option value='San Pedro Nonualco'>San Pedro Nonualco</option>");
			mun.append("<option value='San Rafael Obrajuelo'>San Rafael Obrajuelo</option>");
			mun.append("<option value='Santa María Ostuma'>Santa María Ostuma</option>");
			mun.append("<option value='Santiago Nonualco'>Santiago Nonualco</option>");
			mun.append("<option value='Tapalhuaca'>Tapalhuaca</option>");
			mun.append("<option value='Zacatecoluca' selected>Zacatecoluca</option>");
			break;
		case "La Unión":
			mun.append("<option value='Anamorós'>Anamorós</option>");
			mun.append("<option value='Bolívar'>Bolívar</option>");
			mun.append("<option value='Concepción de Oriente'>Concepción de Oriente</option>");
			mun.append("<option value='Conchagua'>Conchagua</option>");
			mun.append("<option value='El Carmen'>El Carmen</option>");
			mun.append("<option value='El Sauce'>El Sauce</option>");
			mun.append("<option value='Intipucá'>Intipucá</option>");
			mun.append("<option value='La Unión' selected>La Unión</option>");
			mun.append("<option value='Lislique'>Lislique</option>");
			mun.append("<option value='Meanguera del Golfo'>Meanguera del Golfo</option>");
			mun.append("<option value='Nueva Esparta'>Nueva Esparta</option>");
			mun.append("<option value='Pasaquina'>Pasaquina</option>");
			mun.append("<option value='Polorós'>Polorós</option>");
			mun.append("<option value='San Alejo'>San Alejo</option>");
			mun.append("<option value='San José'>San José</option>");
			mun.append("<option value='Santa Rosa de Lima'>Santa Rosa de Lima</option>");
			mun.append("<option value='Yayantique'>Yayantique</option>");
			mun.append("<option value='Yucuayquín'>Yucuayquín</option>");
			break;
		case "Morazán":
			mun.append("<option value='Arambala'>Arambala</option>");
			mun.append("<option value='Cacaopera'>Cacaopera</option>");
			mun.append("<option value='Chilanga'>Chilanga</option>");
			mun.append("<option value='Corinto'>Corinto</option>");
			mun.append("<option value='Delicias de Concepción'>Delicias de Concepción</option>");
			mun.append("<option value='El Divisadero'>El Divisadero</option>");
			mun.append("<option value='El Rosario'>El Rosario</option>");
			mun.append("<option value='Gualococti'>Gualococti</option>");
			mun.append("<option value='Guatajiagua'>Guatajiagua</option>");
			mun.append("<option value='Joateca'>Joateca</option>");
			mun.append("<option value='Jocoaitique'>Jocoaitique</option>");
			mun.append("<option value='Jocoro'>Jocoro</option>");
			mun.append("<option value='Lolotiquillo'>Lolotiquillo</option>");
			mun.append("<option value='Meanguera'>Meanguera</option>");
			mun.append("<option value='Osicala'>Osicala</option>");
			mun.append("<option value='Perquín'>Perquín</option>");
			mun.append("<option value='San Carlos'>San Carlos</option>");
			mun.append("<option value='San Fernando'>San Fernando</option>");
			mun.append("<option value='San Francisco Gotera' selected>San Francisco Gotera</option>");
			mun.append("<option value='San Isidro'>San Isidro</option>");
			mun.append("<option value='San Simón'>San Simón</option>");
			mun.append("<option value='Sensembra'>Sensembra</option>");
			mun.append("<option value='Sociedad'>Sociedad</option>");
			mun.append("<option value='Torola'>Torola</option>");
			mun.append("<option value='Yamabal'>Yamabal</option>");
			mun.append("<option value='Yoloaiquín'>Yoloaiquín</option>");
			break;
		case "San Miguel":
			mun.append("<option value='Carolina'>Carolina</option>");
			mun.append("<option value='Chapeltique'>Chapeltique</option>");
			mun.append("<option value='Chinameca'>Chinameca</option>");
			mun.append("<option value='Chirilagua'>Chirilagua</option>");
			mun.append("<option value='Ciudad Barrios'>Ciudad Barrios</option>");
			mun.append("<option value='Comacarán'>Comacarán</option>");
			mun.append("<option value='El Tránsito'>El Tránsito</option>");
			mun.append("<option value='Lolotique'>Lolotique</option>");
			mun.append("<option value='Moncagua'>Moncagua</option>");
			mun.append("<option value='Nueva Guadalupe'>Nueva Guadalupe</option>");
			mun.append("<option value='Nuevo Edén de San Juan'>Nuevo Edén de San Juan</option>");
			mun.append("<option value='Quelepa'>Quelepa</option>");
			mun.append("<option value='San Antonio'>San Antonio</option>");
			mun.append("<option value='San Gerardo'>San Gerardo</option>");
			mun.append("<option value='San Jorge'>San Jorge</option>");
			mun.append("<option value='San Luis de la Reina'>San Luis de la Reina</option>");
			mun.append("<option value='San Miguel' selected>San Miguel</option>");
			mun.append("<option value='San Rafael'>San Rafael</option>");
			mun.append("<option value='Sesori'>Sesori</option>");
			mun.append("<option value='Uluazapa'>Uluazapa</option>");
			break;
		case "San Salvador":
			mun.append("<option value='Aguilares'>Aguilares</option>");
			mun.append("<option value='Apopa'>Apopa</option>");
			mun.append("<option value='Ayutuxtepeque'>Ayutuxtepeque</option>");
			mun.append("<option value='Cuscatancingo'>Cuscatancingo</option>");
			mun.append("<option value='Delgado'>Delgado</option>");
			mun.append("<option value='El Paisnal'>El Paisnal</option>");
			mun.append("<option value='Guazapa'>Guazapa</option>");
			mun.append("<option value='Ilopango'>Ilopango</option>");
			mun.append("<option value='Mejicanos'>Mejicanos</option>");
			mun.append("<option value='Nejapa'>Nejapa</option>");
			mun.append("<option value='Panchimalco'>Panchimalco</option>");
			mun.append("<option value='Rosario de Mora'>Rosario de Mora</option>");
			mun.append("<option value='San Marcos'>San Marcos</option>");
			mun.append("<option value='San Martín'>San Martín</option>");
			mun.append("<option value='San Salvador' selected>San Salvador</option>");
			mun.append("<option value='Santiago Texacuangos'>Santiago Texacuangos</option>");
			mun.append("<option value='Santo Tomás'>Santo Tomás</option>");
			mun.append("<option value='Soyapango'>Soyapango</option>");
			mun.append("<option value='Tonacatepeque'>Tonacatepeque</option>");
			break;
		case "San Vicente":
			mun.append("<option value='Apastepeque'>Apastepeque</option>");
			mun.append("<option value='Guadalupe'>Guadalupe</option>");
			mun.append("<option value='San Cayetano Istepeque'>San Cayetano Istepeque</option>");
			mun.append("<option value='San Esteban Catarina'>San Esteban Catarina</option>");
			mun.append("<option value='San Ildefonso'>San Ildefonso</option>");
			mun.append("<option value='San Lorenzo'>San Lorenzo</option>");
			mun.append("<option value='San Sebastián'>San Sebastián</option>");
			mun.append("<option value='Santa Clara'>Santa Clara</option>");
			mun.append("<option value='Santo Domingo'>Santo Domingo</option>");
			mun.append("<option value='San Vicente' selected>San Vicente</option>");
			mun.append("<option value='Tecoluca'>Tecoluca</option>");
			mun.append("<option value='Tepetitán'>Tepetitán</option>");
			mun.append("<option value='Verapaz'>Verapaz</option>");
			break;
		case "Santa Ana":
			mun.append("<option value='Candelaria de la Frontera'>Candelaria de la Frontera</option>");
			mun.append("<option value='Chalchuapa'>Chalchuapa</option>");
			mun.append("<option value='Coatepeque'>Coatepeque</option>");
			mun.append("<option value='El Congo'>El Congo</option>");
			mun.append("<option value='El Porvenir'>El Porvenir</option>");
			mun.append("<option value='Masahuat'>Masahuat</option>");
			mun.append("<option value='Metapán'>Metapán</option>");
			mun.append("<option value='San Antonio Pajonal'>San Antonio Pajonal</option>");
			mun.append("<option value='San Sebastián Salitrillo'>San Sebastián Salitrillo</option>");
			mun.append("<option value='Santa Ana' selected>Santa Ana</option>");
			mun.append("<option value='Santa Rosa Guachipilín'>Santa Rosa Guachipilín</option>");
			mun.append("<option value='Santiago de la Frontera'>Santiago de la Frontera</option>");
			mun.append("<option value='Texistepeque'>Texistepeque</option>");
			break;
		case "Sonsonate":
			mun.append("<option value='Acajutla'>Acajutla</option>");
			mun.append("<option value='Armenia'>Armenia</option>");
			mun.append("<option value='Caluco'>Caluco</option>");
			mun.append("<option value='Cuisnahuat'>Cuisnahuat</option>");
			mun.append("<option value='Izalco'>Izalco</option>");
			mun.append("<option value='Juayúa'>Juayúa</option>");
			mun.append("<option value='Nahuizalco'>Nahuizalco</option>");
			mun.append("<option value='Nahulingo'>Nahulingo</option>");
			mun.append("<option value='Salcoatitán'>Salcoatitán</option>");
			mun.append("<option value='San Antonio del Monte'>San Antonio del Monte</option>");
			mun.append("<option value='San Julián'>San Julián</option>");
			mun.append("<option value='Santa Catarina Masahuat'>Santa Catarina Masahuat</option>");
			mun.append("<option value='Santa Isabel Ishuatán'>Santa Isabel Ishuatán</option>");
			mun.append("<option value='Santo Domingo'>Santo Domingo</option>");
			mun.append("<option value='Sonsonate' selected>Sonsonate</option>");
			mun.append("<option value='Sonzacate'>Sonzacate</option>");
			break;
		case "Usulután":
			mun.append("<option value='Alegría'>Alegría</option>");
			mun.append("<option value='Berlín'>Berlín</option>");
			mun.append("<option value='California'>California</option>");
			mun.append("<option value='Concepción Batres'>Concepción Batres</option>");
			mun.append("<option value='El Triunfo'>El Triunfo</option>");
			mun.append("<option value='Ereguayquín'>Ereguayquín</option>");
			mun.append("<option value='Estanzuelas'>Estanzuelas</option>");
			mun.append("<option value='Jiquilisco'>Jiquilisco</option>");
			mun.append("<option value='Jucuapa'>Jucuapa</option>");
			mun.append("<option value='Jucuarán'>Jucuarán</option>");
			mun.append("<option value='Mercedes Umaña'>Mercedes Umaña</option>");
			mun.append("<option value='Nueva Granada'>Nueva Granada</option>");
			mun.append("<option value='Ozatlán'>Ozatlán</option>");
			mun.append("<option value='Puerto El Triunfo'>Puerto El Triunfo</option>");
			mun.append("<option value='San Agustín'>San Agustín</option>");
			mun.append("<option value='San Buenaventura'>San Buenaventura</option>");
			mun.append("<option value='San Dionisio'>San Dionisio</option>");
			mun.append("<option value='San Francisco Javier'>San Francisco Javier</option>");
			mun.append("<option value='Santa Elena'>Santa Elena</option>");
			mun.append("<option value='Santa María'>Santa María</option>");
			mun.append("<option value='Santiago'>Santiago</option>");
			mun.append("<option value='Tecapán'>Tecapán</option>");
			mun.append("<option value='Usulután' selected>Usulután</option>");
			break;
	}
	$('select').material_select();
}

function estadoCivil(idEstCiv,sex){
	var est = $("#"+idEstCiv);
	est.children().remove();
	if (sex=="M") {
		est.append("<option value='Casado'>Casado</option>");
		est.append("<option value='Separado'>Separado</option>");
		est.append("<option value='Divorciado'>Divorciado</option>");
		est.append("<option value='Soltero'>Soltero</option>");
		est.append("<option value='Viudo'>Viudo</option>");
		est.append("<option value='Otros'>Otros</option>");
	}else{
		est.append("<option value='Casada'>Casada</option>");
		est.append("<option value='Separada'>Separada</option>");
		est.append("<option value='Divorciada'>Divorciada</option>");
		est.append("<option value='Soltera'>Soltera</option>");
		est.append("<option value='Viuda'>Viuda</option>");
		est.append("<option value='Otros'>Otros</option>");
	}
}

function calcularEdad(fecha) {
			
			//Obtener la fecha actual del sistema
			var fechaActual = new Date();
			
			//Descomponer la fecha actual en dia, mes y año
			var diaActual = fechaActual.getDate();
			var mesActual = fechaActual.getMonth() + 1;
			var anoActual = fechaActual.getFullYear();
			
			//Descomponer la fecha de nacimiento en dia, mes y año
			var fechaNacimiento = fecha.split("-");
			var diaNacimiento = fechaNacimiento[2];
			var mesNacimiento = fechaNacimiento[1];
			var anoNacimiento = fechaNacimiento[0];
			
			//retiramos el primer cero de la izquierda
			if (mesNacimiento.substr(0,1) == 0) {
				mesNacimiento = mesNacimiento.substring(1, 2);
			}
			
			//retiramos el primer cero de la izquierda
			if (diaNacimiento.substr(0, 1) == 0) {
			diaNacimiento = diaNacimiento.substring(1, 2);
			}
			
			var edad = anoActual - anoNacimiento;
		
			//validamos si el mes de cumpleaños es menor al actual
			//o si el mes de cumpleaños es igual al actual
			//y el dia actual es menor al del nacimiento
			//De ser asi, se resta un año
			if ((mesActual < mesNacimiento) || (mesActual == mesNacimiento && diaActual < diaNacimiento)) {
				edad--;
			}
			
			return edad;
		}
