<?php
 include('../../conexion.php');
 $query_tabla_donaciones=$pdo->prepare("SELECT * FROM donaciones");
 $query_tabla_donaciones->execute();
 $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
	
	tr{
		width:100%; 
		height:40px;
	}



table{
		width: 471px;
		margin-left: auto;
		margin-right: auto;
		display: block;
	}
</style>

<table class="egt">

  <tr style="background-color: #005cb9; color: white;">
     <th scope="col">Tipo de sangre:</th>
     <th scope="col">Donador:</th>
     <th scope="col">Fecha:</th>
     <th scope="col">Hora:</th>
  </tr>
<?php foreach ($lista_donaciones as $donaciones) {?>
  <tr>
      <td><?php echo $donaciones['tipo_sangre'];?></td>
      <td><?php echo $donaciones['nombre_donador'];?></td>
      <td><?php echo $donaciones['fecha_donacion'];?></td>
      <td><?php echo $donaciones['hora_donacion'];?></td>
  </tr>
<?php  } ?>
</table>
