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
          <?php foreach ($lista_personal as $personal) {?>
          <tr>
            <td><?php echo $personal['nombre'];?></td>
            <td><?php echo $personal['a_paterno']; ?>  <?php echo $personal['a_materno'];?></td>
            <td><?php echo $personal['correo'];?></td>
            <td><?php echo $personal['telefono'];?></td>

            <td><form style="display:inline-block;" method="POST" action="editPersonal.php">
                <input type="hidden" name="id_personal" value="<?php echo $personal['id'];?>">
                <button style="display: inline-block;" type="submit" class="btn btn-primary" >Editar</button>
                </form>
    
                <button onclick="mostrarDatos('<?php echo $personal['id'] ?>')"  type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar</button>

            </td>
          </tr>
                                                  <?php } ?>

        </tbody>
</table>
