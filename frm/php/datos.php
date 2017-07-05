<?php 
	session_start();
	//Abre conexion
	$con=mysql_connect("localhost","root","rootroot");
	mysql_select_db("coagesaludv3",$con);


	//Convierte las entradas get en post
	if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}


	//Casos por cada formulario
	switch ($_POST['acc']) {
		//Acciones de credenciales
		case 'login':
			$sql = "SELECT usuario_pass FROM tab_usuario WHERE usuario_usu='".$_POST['username']."'";
			$con = mysql_query($sql);
			
			while ($obj=mysql_fetch_object($con)) {
				if($obj->usuario_pass==sha1(md5($_POST['password']))){
					echo "match";
					$_SESSION["01us01"]="1";
				}else{
					echo "no_match";
				}
			}
		break;

		case 'logout':
			if(session_destroy()){
				echo "done";
			}

		break;

		case 'setUsu':
			$sql="INSERT INTO tab_usuario(usuario_nombre,usuario_usu,usuario_pass) VALUES('".$_POST['nom']."','".$_POST['usu']."','".sha1(md5($_POST['con']))."')";
			$con=mysql_query($sql);
			if($con){
				echo "Guardado exitosamente";
			}
		break;

		case 'getUsu':
			$sql="SELECT * FROM tab_usuario";
			$con=mysql_query($sql);
			$datos=array();
			//Obtengo las etiquetas en un array
			//Luego guardo las variables en datos[]
			while($obj=mysql_fetch_object($con)){
				if($obj->usuario_usu!="admin"){
					$datos[]=array(
						'usuario_id'=>$obj->usuario_id,
						'usuario_nombre'=>$obj->usuario_nombre,
						'usuario_usu'=>$obj->usuario_usu,
						'usuario_pass'=>$obj->usuario_pass
					);
				}
			}
			echo ''.json_encode($datos).'';
		break;

		case 'delUsu':
			$sql="DELETE FROM tab_usuario WHERE usuario_id='".$_POST['id']."'";
			$con=mysql_query($sql);
			if($con){
				echo "Guardado exitosamente";
			}
		break;

	}

?>