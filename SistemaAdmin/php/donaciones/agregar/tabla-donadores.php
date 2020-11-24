
<table class="table">
  <thead style="color: white;" class="bg-primary">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Tipo de sangre</th>
      <th scope="col">Correo</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Última donación</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista_donadores as $donadores) {
       $nombre=$donadores['nombre'];
       $a_paterno=$donadores['a_paterno'];
       $a_materno=$donadores['a_materno'];
       $sangre=$donadores['tipo_de_sangre'];
       
        $format_fecha = new DateTime($donadores['ultima_donacion']);
        $fecha = $format_fecha->format('d/m/Y');

      ?>
    <tr>
      <td><?php echo $donadores['nombre'];?></td>
      <td><?php echo $donadores['a_paterno']; ?>  <?php echo $donadores['a_materno'];?></td>
      <td><?php echo $donadores['tipo_de_sangre'];?></td>
      <td><?php echo $donadores['correo'];?></td>
      <td><?php echo $donadores['telefono'];?></td>
      <td><?php if($donadores['ultima_donacion']==NULL){echo " ";}else{echo $fecha;}?></td>

      <td>

<?php 
    if($donadores['ultima_donacion']=="" || $donadores['ultima_donacion']==" " || $donadores['ultima_donacion']==NULL){?>
          <button style="display: inline-block;" onclick="mostrarDatos('<?php echo $sangre ?>','<?php echo $nombre ?>','<?php echo $a_paterno ?>','<?php echo $a_materno ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Seleccionar</button>  
<?php
    }else{
            //convierto las dos fechas como un tipo de dato DateTime:

      $hoy= date('d-m-Y');
      $donacion = new DateTime($donadores['ultima_donacion']);
      $fechainicial = new DateTime($hoy);

            //calculo la diferencia entre la fecha de la
      $diferencia = $donacion->diff($fechainicial);

      $meses = ( $diferencia->y * 12 ) + $diferencia->m;

      if($meses>=4){?>
                <button style="display: inline-block;" onclick="mostrarDatos('<?php echo $sangre ?>','<?php echo $nombre ?>','<?php echo $a_paterno ?>','<?php echo $a_materno ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Seleccionar</button> 
<?php 
  }else if($meses<4){?>
      <button style="display: inline-block;" disabled onclick="mostrarDatos('<?php echo $sangre ?>','<?php echo $nombre ?>','<?php echo $a_paterno ?>','<?php echo $a_materno ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Seleccionar</button>  
<?php
  }


}
?>
      </td>
    </tr>


<script type="text/javascript">
  function mostrarDatos(sangre,nombre,a_paterno,a_materno){
    $("#input_nombre").val(nombre);
    $("#input_nombre2").val(nombre);

    $("#input_a_paterno").val(a_paterno);
    $("#input_a_paterno2").val(a_paterno);

    $("#input_a_materno").val(a_materno);
    $("#input_a_materno2").val(a_materno);

    $("#input_sangre").val(sangre);
    $("#input_sangre2").val(sangre);
  }
</script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Crear registro de donación</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <style type="text/css">
          #input_nombre,#input_sangre,#fecha_donacion,#hora_donacion,#select_donacion,#input_a_paterno,#input_a_materno{
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            height: 46px;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
          }
        </style>
        <form action="add.php" method="POST">
            <label>Nombre del donador:</label>
            <input type="text" id="input_nombre" disabled>
            <input disabled type="text" name="a_paterno" id="input_a_paterno">
            <input disabled type="text" name="a_materno" id="input_a_materno">

            <input type="hidden" name="nombre" id="input_nombre2">
            <input type="hidden" name="a_paterno" id="input_a_paterno2">
            <input type="hidden" name="a_materno" id="input_a_materno2">

            <label>Tipo de sangre del donador:</label>
            <input type="text"  id="input_sangre" disabled>
            <input type="hidden" name="sangre" id="input_sangre2">

            <label>Tipo de donación:</label>
            <select required name="select_donacion" id="select_donacion">
                <option>Ver más...</option>
                <?php foreach ($tip_donacion as $d) {?>
                  <option><?php echo $d['tipo_donacion']; ?></option>
                <?php } ?>
            </select>

            <label id="lbl_inicio">Fecha de de la donación:</label><br>
            <input required type="date" name="fecha_donacion" id="fecha_donacion">

            <label id="lbl_fin">Hora de la donación:</label><br>
            <input required type="time" name="hora_donacion" id="hora_donacion">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>



    <?php } ?>
  </tbody>
</table>
