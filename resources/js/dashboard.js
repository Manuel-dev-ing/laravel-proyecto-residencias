var dashboard = document.querySelector('#dashboard');
const btn_buscar = document.querySelector('#search')


var incidencias = []

if (dashboard) {
    app()
    console.log('dashboard...');
}

function app() {
    obtenerIncidencias()
    btn_buscar.addEventListener('input', fnBuscar)
}

async function obtenerIncidencias() {
    console.log("obteniendo incidencias...");
    
    const response = await fetch('/incidences', {
        method: 'GET'
    });
    
    const resultado = await response.json();
    console.log(resultado);
    
    resultado.forEach(element => {
        incidencias.push(element)
    });

}

function fnBuscar(event) {
    let valor = event.target.value
    console.log(event.target.value);
    if (valor) {
        console.log("buscando...");
        let resultado = incidencias.filter(x => x.title.includes(valor))
        console.log(resultado);

    }else{
        console.log("no byscar");
        
    }
    


}



