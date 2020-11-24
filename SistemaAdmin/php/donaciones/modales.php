<!-- Modal del boton de reporte por tipo de donacion-->
<div class="modal fade" id="reporteDonacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REPORTE POR TIPO DE DONACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <select style="margin-left: 16%;" required name="select_donacion" id="select_donacion">
            <option>Ver más...</option>
         <?php foreach ($tip_donacion as $d) {?>
            <option><?php echo $d['tipo_donacion']; ?></option>
         <?php } ?>
         </select>
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








<!-- Modal del boton de reporte por tipo de donacion-->
<div class="modal fade" id="reporteSangre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">REPORTE DE DONACIONES POR TIPO DE SANGRE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="pdf/reporteSangre.php">
         <select style="margin-left: 16%;" required name="sangre" id="select_donacion">
            <option>Tipo de sangre...</option>
         <?php foreach ($resul_Tsangre as $d) {?>
            <option><?php echo $d['tipo_de_sangre']; ?></option>
         <?php } ?>
            <option>Todos</option>
         </select><br><br>
         <button type="submit" class="btn btn-primary">Aceptar</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>








<!-- Modal del boton de reporte por rango de fechas-->
<div class="modal fade" id="reporteFecha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REPORTE DE DONACIONES POR RANGO DE FECHA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="pdf/reporteFecha.php">
          <label>Fecha de Inicio:</label>
          <input name="fechaInicio" type="date" 
          style="  font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border-radius: 8px;
          height: 49px; border: 0; margin: 0 0 15px; padding: 15px; margin-top: -2%; box-sizing: border-box; font-size: 14px;" required><br>
          
          <label>Fecha de Fin:</label>
          <input name="fechaFin" type="date"  
          style="  font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border-radius: 8px;
          height: 49px; border: 0; margin: 0 0 15px; padding: 15px; margin-top: -2%; box-sizing: border-box; font-size: 14px;" required>

         <br><br>
         <button type="submit" class="btn btn-primary">Aceptar</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>

