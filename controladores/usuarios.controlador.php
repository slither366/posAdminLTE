<?php

class ControladorUsuarios{

	/*==========================================
	=            INGRESO DE USUARIO            =
	==========================================*/
	
	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			){

				$tabla = "usuarios";
				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["usuario"]==$_POST["ingUsuario"] && $respuesta["password"]==$_POST["ingPassword"]){

					//echo '<br><div class="alert alert-success">Bienvenido al sistema</div>';
					$_SESSION["iniciarSesion"] = "ok";

					echo '<script>
					
						window.location = "inicio";

					</script>';

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo.</div>';

				}
				//var_dump($respuesta["perfil"]);

			}

		}

	}
	
	/*===========================================
	=            REGISTRO DE USUARIO            =
	===========================================*/
	
	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

				echo '<script>alert("Letras correctas!")</script>';

			}else{
				//echo '<script>alert("Caracteres raros!")</script>';
				echo '<script>

					swal({
						
						type: "error",
						title: "!El usuario no puede ir vacio o llevar caracteres especiales",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{
	
						if(result.value){
							window.location = "usuarios";
						}

					});
			
				</script>';

			}

		}

	}

}

