//----- ASSIGNMENTS -----
const urlEmpleado = "../app/controllers/EmpleadoController.php"
const urlCentroCosto = "../app/controllers/CentroCostoController.php"
const urlTipoExamen = "../app/controllers/TipoExamenController.php"
const urlTipoCurso = "../app/controllers/TipoCursoController.php"
const urlTipoContrato = "../app/controllers/TipoContrato.php"

const empleadoId = document.querySelector("#empleado-id")
const empleadoName = document.querySelector("#empleado-names")
const empleadoFatherLastName = document.querySelector("#empleado-father-last-name")
const empleadoMotherLastName = document.querySelector("#empleado-mother-last-name")
const empleadoRut = document.querySelector("#empleado-rut")

const contratacionCentroCostoOpcion = document.querySelector("#contratacion-centro-costo-opcion")
const contratacionInicioInput = document.querySelector("#contratacion-inicio-input")

const examenTipoExamenOpcion = document.querySelector("#examen-tipo-examen-opcion")
const examenFechaExpiracionInput = document.querySelector("#examen-fecha-expiracion-input")
const agregarExamenBoton = document.querySelector("#agregar-examen-boton")

const cursosTipoCursoOpcion = document.querySelector("#cursos-tipo-curso-opcion")
const cursoFechaExpiracionInput = document.querySelector("#cursos-fecha-expiracion-input")
const agregarCursoBoton = document.querySelector("#agregar-curso-boton")

let listaCursosSeleccionados = document.querySelector("#cursos-data-list-items")
let listaExamenesSeleccionados = document.querySelector("#examenes-data-list-items")

let cursosSeleccionados = new Array();
let examenesSeleccinados = new Array();


//----- ACTIONS -----
//When the page is loaded
window.addEventListener("load", () => {
    callGetAllCentrosCosto()
    callGetAllExamenes()
    callGetAllCursos()
    formDefault()
})


//When the button "Agregar" or "Actualizar" is clicked in the record modal
btnSave.addEventListener("click", () => {
    let formData = new FormData()
    console.log(empleadoId.value)
    console.log(empleadoRut.value)
    console.log(empleadoName.value)
    console.log(empleadoFatherLastName.value)
    console.log(empleadoMotherLastName.value)
    console.log(contratacionCentroCostoOpcion.selectedIndex)
    console.log(contratacionInicioInput.value)
    cursosSeleccionados.forEach(curso => {
        console.log(curso.valor + " " + curso.fechaExpiracion)
    });
    examenesSeleccinados.forEach(examen => {
        console.log(examen.valor + " " + examen.fechaExpiracion)
    });

    // if (btnSave.textContent === "Agregar") {
    //     formData.append("action", "create")
    //     callAddEmpleado(formData)
    // } else {
    //     formData.append("action", "update")
    //     callUpdateEmpleado(formData)
    // }
})

agregarCursoBoton.addEventListener("click", () => {
    let obj = {
        "curso": cursosTipoCursoOpcion.options[cursosTipoCursoOpcion.selectedIndex].text,
        "valor": cursosTipoCursoOpcion.selectedIndex,
        "fechaExpiracion": cursoFechaExpiracionInput.value
    }
    agregarCurso(obj)
})

agregarExamenBoton.addEventListener("click", () => {
    let obj = {
        "examen": examenTipoExamenOpcion.options[examenTipoExamenOpcion.selectedIndex].text,
        "valor": examenTipoExamenOpcion.selectedIndex,
        "fechaExpiracion": examenFechaExpiracionInput.value
    }
    agregarExamen(obj)
})

listaCursosSeleccionados.addEventListener("click", (e) => {
    if (e.target.classList.contains("deleteCursoButton")) {
        const itemId = e.target.getAttribute("data-id")
        cursosSeleccionados.splice(itemId, 1)
    }
    cursosList(cursosSeleccionados)
})

listaExamenesSeleccionados.addEventListener("click", (e) => {
    if (e.target.classList.contains("deleteExamenButton")) {
        const itemId = e.target.getAttribute("data-id")
        examenesSeleccinados.splice(itemId, 1)
    }
    examenesList(examenesSeleccinados)
})

contratacionCentroCostoOpcion.addEventListener("change", () => {
    if (contratacionInicioInput.hasAttribute("disabled")) {
        contratacionInicioInput.attributes.removeNamedItem("disabled")
    }
})

cursosTipoCursoOpcion.addEventListener("change", () => {
    if (cursoFechaExpiracionInput.hasAttribute("disabled")) {
        cursoFechaExpiracionInput.attributes.removeNamedItem("disabled")
    }
})

cursoFechaExpiracionInput.addEventListener("change", () => {
    if (agregarCursoBoton.hasAttribute("disabled")) {
        agregarCursoBoton.attributes.removeNamedItem("disabled")
    }
})

examenTipoExamenOpcion.addEventListener("change", () => {
    if (examenFechaExpiracionInput.hasAttribute("disabled")) {
        examenFechaExpiracionInput.attributes.removeNamedItem("disabled")
    }
})

examenFechaExpiracionInput.addEventListener("change", () => {
    if (agregarExamenBoton.hasAttribute("disabled")) {
        agregarExamenBoton.attributes.removeNamedItem("disabled")
    }
})


//----- FUNCTIONS -----
//Generate a table with the records required
function fillCentroCostoOptions(records) {
    let template = '<option value="" disabled selected>Elija una opción</option>';
    records.forEach(record => {
        template += `
            <option value="${record.id}">${record.name}</option>
        `
    })
    contratacionCentroCostoOpcion.innerHTML = template
}

function fillExamenOptions(records) {
    let template = '<option value="" disabled selected>Elija una opción</option>';
    records.forEach(record => {
        template += `
            <option value="${record.id}">${record.name}</option>
        `
    })
    examenTipoExamenOpcion.innerHTML = template
}

function fillCursosOptions(records) {
    let template = '<option value="" disabled selected>Elija una opción</option>';
    records.forEach(record => {
        template += `
            <option value="${record.id}">${record.name}</option>
        `
    })
    cursosTipoCursoOpcion.innerHTML = template
}

function agregarCurso(item) {
    cursosSeleccionados.push(item)
    cursosList(cursosSeleccionados)
}

function agregarExamen(item) {
    examenesSeleccinados.push(item)
    examenesList(examenesSeleccinados)
}

function cursosList(records) {
    let template = ''

    if (records.length > 0) {
        listaCursosSeleccionados.classList.add("w3-border")

        records.forEach(record => {
            template += `
                <li class="w3-display-container">
                    <span>Nombre: ${record.curso}</span><br>
                    <span>Fecha expiración: ${record.fechaExpiracion}</span>
                    <span class="w3-button w3-display-right deleteCursoButton" 
                        data-id="${records.indexOf(record)}">
                        &times;
                    </span>
                </li>
            `
        })
    } else {
        listaCursosSeleccionados.classList.remove("w3-border")

        template += `Sin cursos aún`
    }

    listaCursosSeleccionados.innerHTML = template
}

function examenesList(records) {
    if (records.length > 0) {
        listaExamenesSeleccionados.classList.add("w3-border")
    } else {
        listaExamenesSeleccionados.classList.remove("w3-border")
    }

    let template = ''
    records.forEach(record => {
        template += `
            <li class="w3-display-container">
                <span>Nombre: ${record.examen}</span><br>
                <span>Fecha expiración: ${record.fechaExpiracion}</span>
                <span class="w3-button w3-display-right deleteExamenButton" 
                    data-id="${records.indexOf(record)}">
                    &times;
                </span>
            </li>
        `
    })
    listaExamenesSeleccionados.innerHTML = template
}


//Show the selected record information in the record modal (edit mode)
function showRecordInformation(data) {
    empleadoId.value = data.id
    empleadoName.value = data.names
    empleadoFatherLastName.value = data.fatherLastName
    empleadoMotherLastName.value = data.motherLastName
    empleadoRut.value = data.rut

    moreInfoModalTitle.innerHTML = data.names + " " + data.fatherLastName + " " + data.motherLastName
}

//clear up the inputs in the form
function clearInputs() {
    const formElements = document.forms['empleadoForm']
    for (let element of formElements) {
        element.value = ''
    }
}

function formDefault() {
    clearInputs()
    agregarCursoBoton.setAttribute("disabled", true)
    agregarExamenBoton.setAttribute("disabled", true)
    contratacionInicioInput.setAttribute("disabled", true)
    cursoFechaExpiracionInput.setAttribute("disabled", true)
    examenFechaExpiracionInput.setAttribute("disabled", true)
}


//----- CALLS -----
const callDeleteEmpleado = (record) => {
    deleteRecord(record, urlEmpleado).then(response => response.text()).then(data => {
        callGetAllEmpleados(urlEmpleado)
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error)
    })
}

const callGetEmpleado = (record) => {
    getRecord(record, urlEmpleado).then(response => response.json()).then(data => {
        showRecordInformation(data)
    }).catch(error => {
        console.log(error)
    })
}

const callAddEmpleado = (record) => {
    addRecord(record, urlEmpleado).then(response => response.text()).then(data => {
        callGetAllEmpleados(urlEmpleado)
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error)
    })
}

const callUpdateEmpleado = (record) => {
    updateRecord(record, urlEmpleado).then(response => response.text()).then(data => {
        callGetAllEmpleados()
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error)
    })
}

const callGetAllCentrosCosto = () => {
    getAllRecords(urlCentroCosto).then(response => response.json()).then(data => {
        fillCentroCostoOptions(data)
    }).catch(error => {
        console.log(error);
    });
}

const callGetAllExamenes = () => {
    getAllRecords(urlTipoExamen).then(response => response.json()).then(data => {
        fillExamenOptions(data)
    }).catch(error => {
        console.log(error);
    });
}

const callGetAllCursos = () => {
    getAllRecords(urlTipoCurso).then(response => response.json()).then(data => {
        fillCursosOptions(data)
    }).catch(error => {
        console.log(error);
    });
}