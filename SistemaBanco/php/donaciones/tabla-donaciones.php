  <?php

        $query_tabla_donaciones=$pdo->prepare("SELECT * FROM donaciones");
        $query_tabla_donaciones->execute();
        $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
  ?>

<table class="table">
  <thead style="color: white;" class="bg-primary">
    <tr>
      <th scope="col">Tipo de sangre:</th>
      <th scope="col">Donador:</th>
      <th scope="col">Fecha:</th>
      <th scope="col">Hora:</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista_donaciones as $donaciones) {?>
    <tr>
      <td><?php echo $donaciones['tipo_sangre'];?></td>
      <td><?php echo $donaciones['nombre_donador'];?></td>
      <td><?php echo $donaciones['fecha_donacion'];?></td>
      <td><?php echo $donaciones['hora_donacion'];?></td>
      <td>
        
        <form style="display: inline-block;">
          <input type="hidden" name="id_donacion" value="<?php echo $donaciones['id']; ?>">
          <button type="submit" class="btn btn-primary">Editar </button>
        </form>

    
          <button onclick="mostrarDatos('<?php echo $donaciones['id'] ?>')"  type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar</button>


      </td>
    </tr>
    <?php
     } 
     ?>
  </tbody>
</table>




<!-- DAL DE DONACION -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡ALERTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de eliminar este registro?
      </div>
      <div class="modal-footer">
      <form style="display:inline-block;" method="POST" action="eliminar/delete.php">
          <input type="hidden" name="id_donacion" id="id_donacion">
          <button type="submit" class="btn btn-primary">Aceptar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!--script que le da el valor al input dentro del form desde el boton eliminar en la tabla-donadores-->
<script type="text/javascript">
  function mostrarDatos(datos){

    $("#id_donacion").val(datos);
  }
</script>