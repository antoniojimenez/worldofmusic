//POPUP LOGIN
function div_show_login() {
    document.getElementById('login').style.display = "block";
}
function div_hide_login(){
    document.getElementById('login').style.display = "none";
}

//POPUP REGISTRAR
function div_show_registro() {
    document.getElementById('registro').style.display = "block";
}
function div_hide_registro(){
    document.getElementById('registro').style.display = "none";
}

//POPUP MODIFICAR DISCO
function div_show_modificarDisco() {
    document.getElementById('modificarDisco').style.display = "block";
}
function div_hide_modificarDisco(){
    document.getElementById('modificarDisco').style.display = "none";
}

//POPUP AÑADIR CD
function div_show_anadircd() {
    document.getElementById('anadircd').style.display = "block";
}
function div_hide_anadircd(){
    document.getElementById('anadircd').style.display = "none";
}

//POPUP INTERPRETE
function div_show_interprete() {
    document.getElementById('interprete').style.display = "block";
}
function div_hide_interprete(){
    document.getElementById('interprete').style.display = "none";
}

//POPUP CONCIERTO
function div_show_concierto() {
    document.getElementById('concierto').style.display = "block";
}
function div_hide_concierto(){
    document.getElementById('concierto').style.display = "none";
}

//POPUP DISCOGRÁFICA
function div_show_discograf() {
    document.getElementById('discografica').style.display = "block";
}
function div_hide_discograf(){
    document.getElementById('discografica').style.display = "none";
}

//POPUP MODIFICAR USUARIO
function div_show_modusu() {
    document.getElementById('modificarUsu').style.display = "block";
}
function div_hide_modusu(){
    document.getElementById('modificarUsu').style.display = "none";
}

//POPUP DE CONFIRMACIÓN
function confirmacion() {
    rc = confirm("¿Seguro que desea Eliminar este registro?");
    return rc;
}