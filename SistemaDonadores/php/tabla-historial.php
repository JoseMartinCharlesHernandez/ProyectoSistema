  <?php

        $email_user=$_SESSION['correo'];
        
        $historial=$pdo->prepare("SELECT tipo_donacion.tipo_donacion,tipos_sangre.tipo_de_sangre,donadores.nombre,donadores.a_paterno,donadores.a_materno,donaciones.fecha_donacion,donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_donador INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.id = (SELECT id FROM donadores WHERE correo LIKE ? AND aceptado=1)");
        $historial->bindValue(1,"%{$email_user}%", PDO::PARAM_STR);
        $historial->execute();
        $lista_donaciones=$historial->fetchAll(PDO::FETCH_ASSOC);
  ?>

<table class="table">
  <thead style="color: white;" class="bg-primary">
    <tr>
      <th scope="col">Tipo de donación:</th>
      <th scope="col">Tipo de sangre:</th>
      <th scope="col">Donador:</th>
      <th scope="col">Fecha:</th>
      <th scope="col">Hora:</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista_donaciones as $donaciones) {?>
    <tr>
      <td><?php echo $donaciones['tipo_donacion'];?></td>
      <td><?php echo $donaciones['tipo_de_sangre'];?></td>
      <td><?php echo $donaciones['nombre'].' '.$donaciones['a_paterno'].' '.$donaciones['a_materno'];?></td>
      <td><?php echo $donaciones['fecha_donacion'];?></td>
      <td><?php echo $donaciones['hora_donacion'];?></td>
    </tr>
    <?php
     } 
     ?>
  </tbody>
</table>