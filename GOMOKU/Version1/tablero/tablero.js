let fichas = new Array;let contadorFichas = 0;
FILAS = 16
//Tablero 
function tablero(colorFondo , tamaño ,colorCuadricula){
    this.Color = colorFondo;
    this.tamaño = tamaño;
    this.colorCuadricula = colorCuadricula;
}
tablero.prototype.DibujarTablero = function DibujarTablero(){

    canvas = document.getElementById("TableroDibuja")
    ctx = canvas.getContext("2d");
    canvas.innerHeight = this.tamaño
    canvas.innerWidth = this.tamaño
    anchura = canvas.innerWidth
    altura = canvas.innerHeight 


    ctx.beginPath()
        ctx.fillStyle = this.Color
        ctx.fillRect(0,0,anchura,altura)
    ctx.stroke()
    ctx.closePath()

}  
tablero.prototype.DibujarCuadricula = function DibujarCuadricula(){

    canvas = document.getElementById("TableroDibuja")
    ctx = canvas.getContext("2d");
    anchura = canvas.innerWidth
    altura = canvas.innerHeight 
    ctx.strokeStyle = this.colorCuadricula
    ctx.lineWidth = 3
    cp = anchura/FILAS;


    for(i = 0; i <= FILAS ; i++){
        ctx.beginPath()
        ctx.moveTo(0,i*cp)
            ctx.lineTo(anchura,i*cp)
        ctx.moveTo(i*cp,0)
            ctx.lineTo(i*cp,altura)
        ctx.fill();
        ctx.stroke()
        ctx.closePath()
    }
}
function DibujarLetras(){
    for(a = 1; a<=FILAS ; a++){
        ctx.fillStyle = "rgb(87, 12, 6 )"
        ctx.fillRect(0,0,cp*1,cp*a);
        ctx.fillRect(0,0,cp*a,cp*1)
    }
    for(i = 1; i <= FILAS; i++){
        ctx.beginPath()
            ctx.fillStyle = "rgb(255, 195, 0 )"
            ctx.font = "20px Arial"
            ctx.moveTo(0,0)
            if(i == FILAS-1) ctx.fillText('Ñ',(i*cp)+cp/6,cp-5);
            else ctx.fillText(String.fromCharCode(65+(i-1)),(i*cp)+cp/6,cp-5);
            ctx.fillText(i,cp-cp/1.2,(i*cp)+cp/1.3);
            ctx.fill();
        ctx.closePath();
    }
}

//Fichas
function Ficha(Fila,Columna,TipoFicha){
    // Si añadimos una fila mas lo que hay que hacer es añadirle a la columna y a la fila
    this.Fila = Fila+1; this.Columna = Columna; this.TipoFicha = TipoFicha;
}
Ficha.prototype.DibujarFicha = function DibujarFicha(){
    
    canvas = document.getElementById("TableroDibuja")
    ctx = canvas.getContext("2d");
    anchura = canvas.innerWidth
    altura = canvas.innerHeight 
    cp = anchura/FILAS;

    if(this.TipoFicha == 'O'){
        ctx.beginPath()
        ctx.fillStyle = "Black"
        ctx.font = "30px Arial"
            ctx.fillText("O",(this.Columna*cp)+cp/6,(this.Fila*cp)-cp/6);
            ctx.fill();
        ctx.closePath();
    }
    else {
        ctx.beginPath()
        ctx.fillStyle = "Black"
        ctx.font = "30px Arial"
        ctx.fillText("X",(this.Columna*cp)+cp/6,(this.Fila*cp)-cp/6);
            ctx.fill();
        ctx.closePath();
    }

}

// Comienzo del juego
if(document.getElementById("TableroDibuja")!= undefined){
    tablero1 = new tablero("rgb(255, 219, 95)",500,"rgb(255, 97, 0 )");
    tablero1.DibujarTablero();
    tablero1.DibujarCuadricula();
    BuscarFichas();DibujarTodasLasFichas(); 
    DibujarLetras();
}

//Funciones de Fichas

function BuscarFichas(){
    for(i = 0; i <= 255;i++)
        if(document.getElementsByTagName("p")[i] != undefined){ 
            id = document.getElementsByTagName("p")[i].getAttribute("id");
            cortes = id.split("_");
                                                      //Filas  //Columnas  //Ficha
            fichas[contadorFichas] = new Ficha(Number(cortes[2]),cortes[1],cortes[0]);
            contadorFichas++;
        }else break;
}
function DibujarTodasLasFichas(){
    for(i = 0 ; i < contadorFichas;i++)
        fichas[i].DibujarFicha()
}
