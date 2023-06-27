//Constantes para el contenedor y el identificador de agregar
const contenedor = document.querySelector('#sedeDynamic');
const agregar = document.querySelector('#agregarSede');

//función listener para agregar elementos
agregar.addEventListener('click', e => {
    let td1 = document.createElement('div');
    td1.classList.add('row')
    td1.innerHTML ='<div class="col"> <input class="form-control text-container mt-2 addInput" type="text" name="sede" placeholder="Ingresa el nombre de la sede" required> </div><div class="col"><input class="form-control text-container mt-2 addInput" type="text" name="siglas" placeholder="Ingresa las siglas de la sede" required></div><div class="col"><select class="form-select form-select-lg mt-2" name="sedeEstado" aria-label="" required><option selected disabled value="">Selecciona estado</option><option value="1">Activo</option><option value="0">Inhabilitado</option></select></div><button name="addSede" id="crearSede" type="submit" class="btn btn-primary btn-tablaAdd">Crear Sede</button><button id="deleteSede" type="button" class="btn btn-danger btn-tablaAdd" onclick = "eliminar(this)"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></button>'

    contenedor.appendChild(td1);
    agregar.setAttribute("disabled", "")
});

/**
* Método para eliminar el elemento de input
* @param {this} e
*/

const eliminar = (e) => {
    const elementoTd = e.parentNode;
    contenedor.removeChild(elementoTd);
    agregar.removeAttribute("disabled")
}