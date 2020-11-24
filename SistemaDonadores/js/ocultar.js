function mostrar(){
	document.getElementById('lbl_ultima_donacion').style.display = 'block';
	document.getElementById('ultima_donacion').style.display = 'block';
	document.getElementById('btn_submit').disabled = false;
}

function habilitar(){
	document.getElementById('btn_submit').disabled = false;
	document.getElementById('lbl_ultima_donacion').style.display = 'none';
	document.getElementById('ultima_donacion').style.display = 'none';
}