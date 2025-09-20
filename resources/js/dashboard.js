var dashboard = document.querySelector('#dashboard');
const btn_buscar = document.querySelector('#search')
const constenedor_lista = document.querySelector('#contenedor-lista')

var incidencias = []

if (dashboard) {
    app()
    console.log('dashboard...');
}

function app() {
    obtenerIncidencias()
    grafica()
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
    if (valor != "") {
        const resultado = incidencias.filter(x => x.title.includes(valor))
        console.log(resultado);
        mostrarLista(resultado)

    }else{
        valor = ""
        mostrarLista(valor)
        // constenedor_lista.remove()

    }
}


function mostrarLista(arr) {
    constenedor_lista.innerHTML = ''
    
    if (arr != "") {
        arr.forEach(element => {
            const li = document.createElement('a')
            li.classList.add('w-full', 'px-4', 'py-2', 'border-b', 'border-gray-200')
            li.textContent = element.title
            li.href = `/incidencias/${element.id}`

            constenedor_lista.appendChild(li)
    
        });
        
    }


    // let template = `
    //       <ul class="text-xs text-gray-900 bg-gray-50 border-t-0 border-x-1 border-b-1 border-gray-300 rounded">
    //                 <li class="w-full px-4 py-2 border-b border-gray-200">Profile</li>
    //                 <li class="w-full px-4 py-2 border-b border-gray-200 ">Settings</li>
    //                 <li class="w-full px-4 py-2 border-b border-gray-200 ">Messages</li>
    //                 <li class="w-full px-4 py-2 rounded-b-lg">Download</li>
    //             </ul>
    
    // `;


    //   <ul class="text-xs text-gray-900 bg-gray-50 border-t-0 border-x-1 border-b-1 border-gray-300 rounded">
    //                 <li class="w-full px-4 py-2 border-b border-gray-200">Profile</li>
    //                 <li class="w-full px-4 py-2 border-b border-gray-200 ">Settings</li>
    //                 <li class="w-full px-4 py-2 border-b border-gray-200 ">Messages</li>
    //                 <li class="w-full px-4 py-2 rounded-b-lg">Download</li>
    //             </ul>

}

function grafica() {
    


}
