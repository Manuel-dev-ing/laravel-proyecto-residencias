

// resources/js/mis-scripts.js
    const selectAsignarUsuario = document.querySelector('#asignarUsuario')
    const btnModalAceptar = document.querySelector('#btnModalAceptar')
    const csrf_token = document.querySelector('#csrf-token')
    const input_id = document.querySelector('#id_incidencia')

    var id_incidencia = 0;

  
    events()
    function events() {
        selectAsignarUsuario.addEventListener('change', fnAsignarUsuario)
    }

    // MODAL
        const modal = document.getElementById('modal');
        const openBtn = document.getElementById('openModal');
        const closeBtn = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelModal');
        const btnOpenModal = document.querySelector('#openModal');

        const backdrop = document.querySelector('.backdrop')

        if (openBtn) {
            
            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });
        }

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            
            if (e.target === backdrop) {
                modal.classList.add('hidden');
            }
        });
    //FIN MODAL


    if (btnOpenModal) {
        btnOpenModal.addEventListener('click', obtenerUsuarios)
    }

    async function obtenerUsuarios(event) {
        console.log("obteneniendo usuarios...");
        console.log(event.target.parentElement.parentElement);
        let fila = event.target.parentElement.parentElement;
        let primerTd = fila.querySelector("td") 

        let numero = primerTd.textContent.trim();
        id_incidencia = Number(numero)
        input_id.value = id_incidencia

        const respuesta = await fetch('/users', {
            method: 'GET'
            
        })
        const data = await respuesta.json();
        // console.log(data);

        llenarSelectAsignarUsuario(data)
    }

    function llenarSelectAsignarUsuario(data) {
        selectAsignarUsuario.options.length = 0;

        

        data.forEach(element => {
            // console.log(element);
            const option = document.createElement('option');
            option.value = element.id
          
            option.textContent = element.name + " " + element.first_lastname

            selectAsignarUsuario.appendChild(option)

        });



    }

    function fnAsignarUsuario(event) {
        console.log(event.target.value);
      

        console.log(input_id);
        
    }
    // async function fnAceptar(event) {
    //     console.log("aceptando...");
    //     const token = csrf_token.value
    //     const id_usuario = selectAsignarUsuario.value
    //     console.log(token);
    //     console.log(id_usuario);
    //     console.log(id_incidencia);
        
    //     try {
            
    //         const respuesta = await fetch(`/users/${id_incidencia}`, {
    //             method: 'PUT',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': token
    //             },
    //             body: JSON.stringify({usuario: id_usuario})
            
    //         })
    //         const data = await respuesta.json();
    //         console.log(data);
    //         if (data) {
    //             modal.classList.add('hidden');
    //         }    

    //     } catch (error) {
    //         alert(error);
    //     }
        
        
        
        
    // }



console.log("Mi script desde resources/js/mis-scripts.js con Vite");




