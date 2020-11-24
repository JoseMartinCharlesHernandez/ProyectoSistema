<br>
<br>

<table class="table">
  <thead style="color: white;" class="bg-primary">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista_donadores as $donadores) {?>
    <tr>
      <td><?php echo $donadores['nombre'];?></td>
      <td><?php echo $donadores['a_paterno']; ?>  <?php echo $donadores['a_materno'];?></td>
      <td><?php echo $donadores['correo'];?></td>
      <td><?php echo $donadores['telefono'];?></td>

      <td>
        <form style="display:inline-block;" method="POST" action="editDonadores.php">
          <input type="hidden" name="id_donador" value="<?php echo $donadores['id'];?>">
          <button style="display: inline-block;" type="submit" class="btn btn-primary" >Editar</button>
        </form>

    
          <button onclick="mostrarDatos('<?php echo $donadores['id'] ?>')"  type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar</button>

      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
