function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    var c;
    for(var i = 0; i <ca.length; i++) {
        c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return ca;
}
function deleteCookie(cname){
    document.cookie=cname+"=;expires=-1";
}
function borrarTodo(){
    deleteCookie("idUsuario");
    deleteCookie("nombre");
    deleteCookie("correo");
    deleteCookie("usuario");
    redireccionar();
}
function redireccionar(){
    location.href="login.html";
}