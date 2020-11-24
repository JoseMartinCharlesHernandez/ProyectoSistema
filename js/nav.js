$(document).ready(function() {
    $('#VistaPresentacion').on('click', function() {
        $("#content").load('php/Presentacion.php');
        return false;
    });


    $('#VistaQueHacemos').on('click', function() {
        $("#content").load('php/Quehacemos.php');
        return false;
    });

   $('#VistaOperacion').on('click', function() {
        $("#content").load('php/Operacion.php');
        return false;
    });

   $('#VistaRegulacionJuridica').on('click', function() {
        $("#content").load('php/RegulacionJuridica.php');
        return false;
    });


   $('#VistaVision').on('click', function() {
        $("#content").load('php/MisionVision.php');
        return false;
    });

   $('#VistaValores').on('click', function() {
        $("#content").load('php/Valores.php');
        return false;
    });

});