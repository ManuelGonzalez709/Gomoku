let c1;
let c2;
if(filename() != "partida.php"){
        c1 = new Audio("./estilos/fondo.mp3");
        c1.play();
}
if(document.getElementById("BotonPonerFicha")!= undefined){
    if(document.getElementById("BotonPonerFicha").onclick){
        c2 = new Audio("./estilos/PonerFicha.mp3")
        c2.play();
    }
}
function filename(){
    var rutaAbsoluta = self.location.href;   
    var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
    var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
    return rutaRelativa;  
}