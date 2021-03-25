<?php

$servername = "localhost";
$database = "Nasa";
$username = "Ricardo";
$password = "root";
// Creamos conexión a la base de datos
$conexion = mysqli_connect($servername, $username, $password, $database);
// Comprobamos la conexión
if (!$conexion) {
      die("La conexión ha fallado: " . mysqli_connect_error());
}
 
echo "Conexion exitosa!!";


// Enlazamos la dirección del json
$html = file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=zBZGonJXa3FXfa5Zpn9w9xOEyGVR9cjYrhvDBEbX");
// Decodificamos el JSON
$json = json_decode($html);

$array = $json->photos;


// Pasamos los valores obtenidos por el array JSON a variables PHP
foreach ($array as $obj) {
	$id = $obj->id;
	$sol = $obj->sol;
	$camera_id = $obj->camera->id;
	$camera_name = $obj->camera->name;
	$camera_rover_id = $obj->camera->rover_id;
	$camera_full_name = $obj->camera->full_name;
	$img = $obj->img_src;
	$earth = $obj->earth_date;
	$rover_id = $obj->rover->id;
	$rover_name = $obj->rover->name;
	$rover_land = $obj->rover->landing_date;
	$rover_launch = $obj->rover->launch_date;
	$rover_status = $obj->rover->status;

	//PRUEBA PARA VER SI GUARDA LOS VALORES EN LAS VARIABLES PHP
    /*print($id . "<br/> " .$sol . "<br/> " .$camera_id . "<br/> " . $camera_name . "<br/> " .$camera_rover_id . "<br/> " . $camera_full_name . "<br/> " . $img . "<br/> " . $earth . "<br/>" . $rover_id . "<br/>" . $rover_name . "<br/>" . $rover_land . "<br/>" . $rover_launch . "<br/>" . $rover_status . "<br/>" . "<br/>");*/


    // Insertamos por cada posición de array los valores correspondientes a la tabla
    $sql = "INSERT INTO photos (id, sol, camera_id, camera_name, camera_roverID, camera_fullName, img, earth_date, rover_id, rover_name, landing_date, launch_date, status) VALUES ('$id', '$sol', '$camera_id', '$camera_name', '$camera_rover_id', '$camera_full_name', '$img', '$earth', '$rover_id', '$rover_name', '$rover_land', '$rover_launch', '$rover_status');";
	if (mysqli_query($conexion, $sql)) {
      echo "Se han insertado los datos correctamente!" . "<br/>" . "<br/>";
	} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
}
?>
