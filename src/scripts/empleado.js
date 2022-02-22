//----- ASSIGNMENTS -----
const urlEmpleado = "../app/controllers/EmpleadoController.php"
const urlContratacion = "../app/controllers/ContratacionController.php"
const urlCentroCosto = "../app/controllers/CentroCostoController.php"
const urlTipoContrato = "../app/controllers/TipoContratoController.php"

const empleadosDatatableRows = document.querySelector("#empleados-datatable-rows")
const empleadoModal = document.querySelector("#empleado-modal")

let centroCostoObject = { id: "", nombre: "", descripcion: "" }
let tipoContratoObject = { id: "", nombre: "", descripcion: "" }

//----- ACTIONS -----
//When the page is loaded
window.addEventListener("load", () => {
    callGetAllEmpleados()
})

empleadosDatatableRows.addEventListener("click", (e) => {
    if (e.target.classList.contains("btnMasInfo")) {
        const id = e.target.getAttribute("data-id")
        let formDataEmpleado = new FormData()
        let formDataContratacion = new FormData()
        formDataEmpleado.set("accion", "getOne")
        formDataEmpleado.set("empleado-id", id)
        callGetEmpleado(formDataEmpleado)
        formDataContratacion.set("accion", "getOneByEmpleadoId")
        formDataContratacion.set("contratacion-empleado-id", id)
        callGetContratacion(formDataContratacion)
        mostrarModalEmpleado()
    }
})


//----- FUNCTIONS -----
//Generate a table with the records required
function generarDataTable(records) {
    let template = '';
    records.forEach(record => {
        template += `
            <tr class="item">
                <td class="w3-center">${record.rut}</td>
                <td>${record.nombres}</td>
                <td>${record.apellido_paterno}</td>
                <td>${record.apellido_materno}</td>
                <td class="w3-center">
                    <span data-id="${record.id}" 
                        data-name="${record.nombres}"
                        class="btnMasInfo w3-button w3-white w3-border-0 w3-ripple w3-center"
                    >
                        Más info
                    </span>   
                </td> 
            </tr>
        `
    })
    empleadosDatatableRows.innerHTML = template
}

function empleadoModalTemplate() {
    let template = `
        <div class="w3-modal-content-M w3-card-4">
            <div class="w3-container">
                <div class="w3-section">
                    <div id="empleado-modal-header">
                        <h2 id="empleado-modal-title">
                            Datos empleado
                        </h2>
                    </div>
                    <div id="empleado-modal-body"> 
                        <div id="empleado-info"></div>
                        <div id="contratacion-info"></div>
                    </div>
                    <div class="w3-row w3-padding-top-24">
                        <div class="w3-col l12">
                            <button type="button" class="w3-button w3-white w3-border w3-left"
                                id="empleado-modal-cancel-button">
                                Cancelar
                            </button>
                            <button type="button" class="w3-button w3-green w3-border w3-right"
                                id="empleado-modal-edit-button">Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `
    empleadoModal.innerHTML = template

    const empleadoModalCancelButton = document.querySelector("#empleado-modal-cancel-button")
    const empleadoModalEditButton = document.querySelector("#empleado-modal-edit-button")

    empleadoModalCancelButton.addEventListener("click", () => {
        ocultarModalEmpleado()
    })

    empleadoModalEditButton.addEventListener("click", () => {
        console.log("edit clicked")
    })
}

function mostrarModalEmpleado() {
    empleadoModalTemplate()
    empleadoModal.style.display = 'block'
}

function ocultarModalEmpleado() {
    empleadoModal.style.display = 'none'
}

function mostrarInfoEmpleado(data) {
    let empleadoInfo = document.querySelector("#empleado-info")
    let template = ''
    template += `
        <p>
            <div class="w3-small">
                RUT:
            </div>  
            <div>
                ${data.rut}
            </div>
        </p>
        <P>
            <div class="w3-small">
                Nombre completo: 
            </div>
            <div>
                ${data.nombres} ${data.apellido_paterno} ${data.apellido_materno}
            </div>
        </p>
    `
    empleadoInfo.innerHTML = template
}

function mostrarInfoContratacion() {
    let contratacionInfo = document.querySelector("#contratacion-info")
    let template = ''
    template += `
        <div class="w3-row">
            <div class="w3-col l4">
                <div class="w3-small">
                    Centro de costo: 
                </div>
                <div>
                    ${centroCostoObject.nombre}
                </span>
            </div>
            <div class="w3-col l4">
                <div class="w3-small">
                    Tipo contrato: 
                </div>
                <div>
                    ${tipoContratoObject.nombre}
                </span>
            </div>
            <div class="w3-col l4">
                <div class="w3-small">
                    Fecha término: 
                </div>
                <div>
                    ${tipoContratoObject.nombre}
                </span>
            </div>
        </div>
        `
    contratacionInfo.innerHTML = template
}


//----- CALLS -----
const callGetAllEmpleados = () => {
    getAllRecords(urlEmpleado).then(response => response.json()).then(data => {
        generarDataTable(data)
        setTotalRecords(data)
    }).catch(error => {
        console.log(error.text);
    });
}

const callGetEmpleado = (record) => {
    getRecord(record, urlEmpleado).then(response => response.json()).then(data => {
        mostrarInfoEmpleado(data)
    }).catch(error => {
        console.log(error.text)
    })
}

const callGetContratacion = (record) => {
    getRecord(record, urlContratacion).then(response => response.json()).then(data => {
        let formDataCentroCosto = new FormData()
        formDataCentroCosto.set("accion", "getOne")
        formDataCentroCosto.set("centro-costo-id", data.centro_costo_id)
        callGetCentroCosto(formDataCentroCosto)
        let formDataTipoContrato = new FormData()
        formDataTipoContrato.set("accion", "getOne")
        formDataTipoContrato.set("tipo-contrato-id", data.tipo_contrato_id)
        callGetTipoContrato(formDataTipoContrato)
    }).catch(error => {
        console.log(error.text)
    })
}

const callGetCentroCosto = (record) => {
    getRecord(record, urlCentroCosto).then(response => response.json()).then(data => {
        centroCostoObject.id = data.id
        centroCostoObject.nombre = data.nombre
        centroCostoObject.descripcion = data.descripcion
    }).catch(error => {
        console.log(error.text)
    })
}

const callGetTipoContrato = (record) => {
    getRecord(record, urlTipoContrato).then(response => response.json()).then(data => {
        tipoContratoObject.id = data.id
        tipoContratoObject.nombre = data.nombre
        tipoContratoObject.descripcion = data.descripcion
    }).catch(error => {
        console.log(error.text)
    })
}