<table class="table">
  <thead style="color: white;" class="bg-primary">
    <tr>
      <th scope="col">Tipo de peticion</th>
      <th scope="col">Tipo de sangre</th>
      <th scope="col">Cantidad de transfuciones</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de fin</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista_peticiones as $p) {
        if($p['finalizada']==0){
          $inicio = new DateTime($p['fecha_inicio']);
          $fin = new DateTime($p['fecha_fin']);

          $f_i = $inicio->format('d/m/Y');
          $f_f = $fin->format('d/m/Y');

      ?>
    <tr>
      <td><?php echo $p['tipo_donacion'];?></td>
      <td><?php echo $p['tipo_de_sangre'];?></td>
      <td><?php echo $p['cantidad_transfusiones'];?></td>
      <td><?php echo $f_i;?></td>
      <td><?php echo $f_f;?></td>
      <td>
        <form style="display:inline-block;" method="POST" action="editar/editPeticion.php">
          <input type="hidden" name="id_peticion" value="<?php echo $p['id'];?>">
          <button style="display: inline-block;" type="submit" class="btn btn-primary" >Editar</button>
        </form>

        <form style="display:inline-block;" method="POST" action="finalizar/finalizarPeticion.php">
          <input type="hidden" name="id_peticion" value="<?php echo $p['id'];?>">
          <button  type="submit" class="btn btn-danger" >Finalizar</button>
        </form>
      </td>
    </tr>
    <?php
      }
     } 
     ?>
  </tbody>
</table>
