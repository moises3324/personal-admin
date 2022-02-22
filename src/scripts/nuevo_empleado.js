//----- ASSIGNMENTS -----
const urlEmpleadoContratacion = "../app/controllers/EmpleadoContratacionController.php"
const urlCentroCosto = "../app/controllers/CentroCostoController.php"
const urlTipoContrato = "../app/controllers/TipoContratoController.php"

const empleadoId = document.querySelector("#empleado-id")
const empleadoRut = document.querySelector("#empleado-rut")
const empleadoNames = document.querySelector("#empleado-nombres")
const empleadoApellidoPaterno = document.querySelector("#empleado-apellido-paterno")
const empleadoApellidoMaterno = document.querySelector("#empleado-apellido-materno")

const contratacionTipoContratoOpcion = document.querySelector("#contratacion-tipo-contrato-opcion")
const contratacionCentroCostoOpcion = document.querySelector("#contratacion-centro-costo-opcion")
const contratacionTerminoInput = document.querySelector("#contratacion-termino-input")


//----- ACTIONS -----
//When the page is loaded
window.addEventListener("load", () => {
    callGetAllCentrosCosto()
    callGetAllTipoContrato()
    formDefault()
})


//When the button "Agregar" or "Actualizar" is clicked in the record modal
btnSave.addEventListener("click", () => {
    addEmployee()
})


//----- FUNCTIONS -----
function addEmployee(){   
    let arrayErrores = new Array()
    if (empleadoRut.value.trim() === ""){
        arrayErrores.push("Debes ingresar un rut")
    } 
    if(empleadoNames.value.trim() === ""){
        arrayErrores.push("Debes ingresar al menos un nombre")
    }
    if(empleadoApellidoPaterno.value.trim() === ""){
        arrayErrores.push("Debes ingresar al menos el apellido paterno")
    }
    if(contratacionTipoContratoOpcion.selectedIndex === 0){
        arrayErrores.push("Debes seleccionar un tipo de contrato")
    }
    if(contratacionCentroCostoOpcion.selectedIndex === 0){
        arrayErrores.push("Debes seleccionar un centro de costo")
    }
    if(contratacionTerminoInput.value.trim() === ""){
        arrayErrores.push("Debes ingresar indicar una fecha de término del contrato")
    }

    //validar si hay errores en el arreglo
    if(arrayErrores.length > 0){
        let mensajeError = ""
        arrayErrores.forEach(error =>{
            mensajeError+= "-"+error+"\n"
        })
        alert(mensajeError)
        return false
    } 

    let formData = new FormData()
    formData.append("accion", "create")
    formData.append("empleado-id", empleadoId.value)
    formData.append("empleado-rut", empleadoRut.value.trim())
    formData.append("empleado-nombres", empleadoNames.value.trim())
    formData.append("empleado-apellido-paterno", empleadoApellidoPaterno.value.trim())
    formData.append("empleado-apellido-materno", empleadoApellidoMaterno.value.trim())
    formData.append("contratacion-tipo-contrato-id", contratacionTipoContratoOpcion.selectedIndex)
    formData.append("contratacion-centro-costo-id", contratacionCentroCostoOpcion.selectedIndex)
    formData.append("contratacion-fecha-termino", contratacionTerminoInput.value.trim())

    callAddEmpleado(formData)

    formDefault()
}

function fillCentroCostoOptions(records) {
    let template = '<option value="" disabled selected>Elija una opción</option>';
    records.forEach(record => {
        template += `
            <option value="${record.id}">${record.nombre}</option>
        `
    })
    contratacionCentroCostoOpcion.innerHTML = template
}

function fillTipoContratoOptions(records) {
    let template = '<option value="" disabled selected>Elija una opción</option>';
    records.forEach(record => {
        template += `
            <option value="${record.id}">${record.nombre}</option>
        `
    })
    contratacionTipoContratoOpcion.innerHTML = template
}

//clear up the inputs in the form
function formDefault() {
    empleadoId.value = ""
    empleadoRut.value = ""
    empleadoNames.value = ""
    empleadoApellidoPaterno.value = ""
    empleadoApellidoMaterno.value = ""
    contratacionTipoContratoOpcion.selectedIndex = 0
    contratacionCentroCostoOpcion.selectedIndex = 0
    contratacionTerminoInput.value = ""
}


//----- CALLS -----
const callDeleteEmpleado = (record) => {
    deleteRecord(record, urlEmpleadoContratacion).then(response => response.text()).then(data => {
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error)
    })
}

const callGetEmpleado = (record) => {
    getRecord(record, urlEmpleadoContratacion).then(response => response.json()).then(data => {
        showRecordInformation(data)
    }).catch(error => {
        console.log(error)
    })
}

const callAddEmpleado = (record) => {
    addRecord(record, urlEmpleadoContratacion).then(response => response.text()).then(data => {
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error)
    })
}

const callUpdateEmpleado = (record) => {
    updateRecord(record, urlEmpleadoContratacion).then(response => response.text()).then(data => {
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

const callGetAllTipoContrato = () => {
    getAllRecords(urlTipoContrato).then(response => response.json()).then(data => {
        fillTipoContratoOptions(data)
    }).catch(error => {
        console.log(error);
    });
}