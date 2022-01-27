//----- ASSIGNMENTS -----
const urlEmpleado = "../app/controllers/EmpleadoController.php"
const urlCentroCosto = "../app/controllers/CentroCostoController.php"
const urlTipoExamen = "../app/controllers/TipoExamenController.php"
const urlTipoCurso = "../app/controllers/TipoCursoController.php"
const urlTipoContrato = "../app/controllers/TipoContrato.php"

const empleadoSortItem = document.querySelector("#empleadoSortItem")
const empleadoId = document.querySelector("#empleado-id")
const empleadoName = document.querySelector("#empleado-names")
const empleadoFatherLastName = document.querySelector("#empleado-father-last-name")
const empleadoMotherLastName = document.querySelector("#empleado-mother-last-name")
const empleadoRut = document.querySelector("#empleado-rut")

const contratacionCentroCostoCpcion = document.querySelector("#contratacion-centro-costo-opcion")
const examenesTipoExamenOpcion = document.querySelector("#examenes-tipo-examen-opcion")
const cursosTipoCursoOpcion = document.querySelector("#cursos-tipo-curso-opcion")

const moreInfoModal = document.querySelector("#moreInfoModal")
const moreInfoModalTitle = document.querySelector("#moreInfoModalTitle")
const btnCloseMoreInfoModal = document.querySelector("#btnCloseMoreInfoModal")


//----- ACTIONS -----
//When the page is loaded
window.addEventListener("load", () => {
    callGetAllEmpleados()
    callGetAllCentrosCosto()
    callGetAllExamenes()
    callGetAllCursos()
})

//When is clicked inside the record table
dataTable.addEventListener("click", (e) => {
    let formData = new FormData()
    if (e.target.classList.contains("btnMoreInfo")) {
        const id = e.target.getAttribute("data-id")
        formData.set("action", "getOne")
        formData.set("empleado-id", id)
        callGetEmpleado(formData)
        showMoreInfoModal()
    }
})

//When the button "Agregar" or "Actualizar" is clicked in the record modal
btnSave.addEventListener("click", () => {
    let formData = new FormData()
    const formElements = document.forms['empleadoForm']
    let errorList = new Array()

    for (let element of formElements) {
        formData.append(element.name, element.value)
        if (element.required && element.value === "") {
            errorList.push(element)
        }
    }

    if (errorList.length > 0) {
        return false
    }

    if (btnSave.textContent === "Agregar") {
        formData.append("action", "create")
        callAddEmpleado(formData)
    } else {
        formData.append("action", "update")
        callUpdateEmpleado(formData)
    }
    hideRecordModal()
    cleanInputs(formElements)
})

//When the button "Cancelar" is clicked in the record modal
btnCancelRecordModal.addEventListener("click", () => {
    cleanInputs()
})

btnCloseMoreInfoModal.addEventListener("click", () => {
    hideMoreInfoModal()
    cleanInputs()
})

empleadoSortItem.addEventListener("change", () => {
    w3.sortHTML('#empleadoTable', '.item', 'td:nth-child(1)')
})


//----- FUNCTIONS -----
//Generate a table with the records required
function generateTable(records) {
    let template = '';
    records.forEach(record => {
        template += `
            <tr class="item">
                <td>${record.rut}</td>
                <td>${record.names}</td>
                <td>${record.fatherLastName}</td>
                <td>${record.motherLastName}</td>
                <td class="w3-center">
                    <span data-id="${record.id}" 
                        data-name="${record.names}"
                        class="btnMoreInfo w3-button w3-white w3-border-0 w3-ripple"
                    >
                        Más info
                    </span>   
                </td> 
            </tr>
        `
    })
    dataTable.innerHTML = template
}

function fillCentroCostoOptions(records) {
    let template = '<option value="" disabled selected>Elija una opción</option>';
    records.forEach(record => {
        template += `
            <option value="${record.id}">${record.name}</option>
        `
    })
    contratacionCentroCostoCpcion.innerHTML = template
}

function fillExamenOptions(records) {
    let template = '<option value="" disabled selected>Elija una opción</option>';
    records.forEach(record => {
        template += `
            <option value="${record.id}">${record.name}</option>
        `
    })
    examenesTipoExamenOpcion.innerHTML = template
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


//Show the selected record information in the record modal (edit mode)
function showRecordInformation(data) {
    empleadoId.value = data.id
    empleadoName.value = data.names
    empleadoFatherLastName.value = data.fatherLastName
    empleadoMotherLastName.value = data.motherLastName
    empleadoRut.value = data.rut

    moreInfoModalTitle.innerHTML = data.names + " " + data.fatherLastName + " " + data.motherLastName
}

//Clean up the inputs in the form
function cleanInputs() {
    const formElements = document.forms['empleadoForm']
    for (let element of formElements) {
        element.value = ''
    }
}


//Show the more info modal
function showMoreInfoModal() {
    moreInfoModal.style.display = 'block'
}

//Hide the show info modal
function hideMoreInfoModal() {
    moreInfoModal.style.display = 'none'
}


//----- CALLS -----
const callGetAllEmpleados = () => {
    getAllRecords(urlEmpleado).then(response => response.json()).then(data => {
        generateTable(data)
        setTotalRecords(data)
    }).catch(error => {
        console.log(error);
    });
}

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