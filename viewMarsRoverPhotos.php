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
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Informacion sobre Mars Rover Photos</title>
	<style type="text/css">
		table, th, td{
			border: 1px solid black;
			border-collapse: collapse;
		}
		.campos{
			background-color: #00CED1;
			font-weight: bold;
			font-size: 25px;
			text-align: center;
			padding: 10px;
		}
		h1{
			text-align: center;
		}
	</style>
</head>
<body>
<h1>Tabla de informacion sobre la API de Mars Rover Photos</h1>

<br>
	<table>
		<tr>
			<td class="campos">id</td>
			<td class="campos">sol</td>
			<td class="campos">camera_id</td>
			<td class="campos">camera_name</td>
			<td class="campos">camera_roverID</td>
			<td class="campos">camera_fullName</td>
			<td class="campos">img</td>
			<td class="campos">earth_date</td>
			<td class="campos">rover_id</td>
			<td class="campos">rover_name</td>
			<td class="campos">landing_date</td>
			<td class="campos">launch_date</td>
			<td class="campos">status</td>
		</tr>

		<?php
			$sql = "SELECT * from photos";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar=mysqli_fetch_array($result)) {
		?>

		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['sol'] ?></td>
			<td><?php echo $mostrar['camera_id'] ?></td>
			<td><?php echo $mostrar['camera_name'] ?></td>
			<td><?php echo $mostrar['camera_roverID'] ?></td>
			<td><?php echo $mostrar['camera_fullName'] ?></td>
			<td><?php echo $mostrar['img'] ?></td>
			<td><?php echo $mostrar['earth_date'] ?></td>
			<td><?php echo $mostrar['rover_id'] ?></td>
			<td><?php echo $mostrar['rover_name'] ?></td>
			<td><?php echo $mostrar['landing_date'] ?></td>
			<td><?php echo $mostrar['launch_date'] ?></td>
			<td><?php echo $mostrar['status'] ?></td>
		</tr>
		<?php 
			}
		?>
	</table>
</body>
</html>